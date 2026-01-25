import $ from 'jquery';

/**
 * API Module
 * Manages API endpoint URLs and provides utility functions for cache management and notifications.
 */
export const DEFAULT_SUBDIRECTORIES = ['shipping', 'qc', 'audit', 'admin', 'reports', 'test'];

export const api = {
    init: function (subDirectories = DEFAULT_SUBDIRECTORIES) {
        this.subDirectories = subDirectories;
        this.apiBase = this.isSubdirectory()
            ? '../api/v1/'
            : './api/v1/';
        this.printer = this.apiBase + 'printer.php/';
        this.shipping = this.apiBase + 'shipping/';
        this.shippingCreate = this.apiBase + 'shippingcreate/';
        this.shippingPick = this.apiBase + 'shippingpick/';
        this.shippingBuild = this.apiBase + 'shippingbuild/';
        this.shippingWhole = this.apiBase + 'shippingwhole/';
        this.receive = this.apiBase + 'receiving/';
        this.final = this.apiBase + 'final/';
        this.finalInventory = this.apiBase + 'finalInventory/';
        this.finalGrade = this.apiBase + 'finalgrade/';
        this.finalShip = this.apiBase + 'finalshipment/';
        this.finalUpdate = this.apiBase + 'finalupdate/';
        this.report = this.apiBase + 'report/';
        this.bol = this.apiBase + 'bolreport/';
        this.skus = this.apiBase + 'skus/';
        this.admin = this.apiBase + 'admin/';
        this.email = this.apiBase + 'email/';
        this.createfile = this.apiBase + 'create-file.php';
        this.savefile = this.apiBase + 'save-to-file.php';
        this.getfile = this.apiBase + 'get-file.php';
        this.archive = this.apiBase + 'list_historical_data.php';
        this.orders = this.apiBase + 'save-orders.php';
        this.createtable = this.apiBase + 'order_table_create.php';
        this.parsetable = this.apiBase + 'order_table_parse.php';
        this.quality = this.apiBase + 'quality.php';

        // Initialize loginPage based on current location
        this.loginPage = this.isSubdirectory() ? '../login' : './login';

        // Initialize linkMap based on current location
        const inSubDir = this.isSubdirectory();
        this.linkMap = {
            'adminDashboard': inSubDir ? '../admin/dashboard.html' : './admin/dashboard.html',
            'userManagement': inSubDir ? '../admin/user_management.html' : './admin/user_management.html',
            'inventoryManagement': inSubDir ? '../admin/inventory_management.html' : './admin/inventory_management.html',
            'orderManagement': inSubDir ? '../admin/order_management.html' : './admin/order_management.html',
            'phpLiteAdminLink': inSubDir ? '../admin/' : './admin/',
            'sqliteAdminLink': inSubDir ? '../admin/phpliteadmin.php' : './admin/phpliteadmin.php',
            'mysqlAdminLink': inSubDir ? '../admin/adminer.php' : './admin/adminer.php'
        };
    },
    isSubdirectory: function () {
        return this.subDirectories.some(dir => window.location.pathname.toLowerCase().includes(`/${dir}/`));
    },
    linkMap: {},
    loginPage: '',
    // Cache management for modules
    cache: {
        get: function (key) {
            try {
                const cached = localStorage.getItem(key);
                if (!cached) return null;
                const data = JSON.parse(cached);
                // Check if cache is expired (default 5 minutes)
                if (data.timestamp && Date.now() - data.timestamp > 5 * 60 * 1000) {
                    localStorage.removeItem(key);
                    return null;
                }
                return data.value;
            } catch (e) {
                console.error(`Error loading cache for ${key}:`, e);
                return null;
            }
        },
        set: function (key, value, ttl = 5 * 60 * 1000) {
            // if item already exists, ignore
            if (localStorage.getItem(key)) return;
            try {
                const data = {
                    value: value,
                    timestamp: Date.now(),
                    ttl: ttl
                };
                localStorage.setItem(key, JSON.stringify(data));
            } catch (e) {
                console.error(`Error saving cache for ${key}:`, e);
            }
        },
        remove: function (key) {
            try {
                localStorage.removeItem(key);
            } catch (e) {
                console.error(`Error removing cache for ${key}:`, e);
            }
        },
        clear: function () {
            try {
                // Clear all app-related cache
                const keysToRemove = [];
                for (let i = 0; i < localStorage.length; i++) {
                    const key = localStorage.key(i);
                    // Remove user data but preserve theme preference
                    if (key && (key.startsWith('userData') || key.startsWith('module_') || key === 'user')) {
                        keysToRemove.push(key);
                    }
                }
                keysToRemove.forEach(key => localStorage.removeItem(key));
            } catch (e) {
                console.error('Error clearing cache:', e);
            }
        }
    },
    logout: function () {
        // Clear all cached data
        this.cache.clear();

        fetch(api.apiBase + 'auth/logout', {
            method: 'POST',
            credentials: 'include'
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === 0) {
                    window.location.href = this.loginPage;
                } else {
                    Swal.fire('Logout failed: ' + data.message);
                }
            })
            .catch(err => console.error('Logout error:', err));
    },
    adjustTableHeight: function () {
        const windowHeight = $(window).height();
        const adjustedHeight = windowHeight * 0.7;
        $('.table-container').css('max-height', adjustedHeight + 'px');
    },
    getCurrentTheme: function () {
        return localStorage.getItem('currentTheme') || 'style';
    }
};


/**
 * Handles the user settings modal display and fetching user info and notifications
 */
$(document).on('click', '#userSettingsModal', function () {
    // Swal is not a module, so we can use it directly here
    Swal.close(); // Close any existing Swal modals

    Swal.fire({
        title: 'Loading...',
        allowOutsideClick: false,
        //onBeforeOpen is deprecated
        didOpen: () => {
            Swal.showLoading();
        }
    });
    // Notification box
    let html = `<div class="text-center" id="notificationsCenter">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`;
    $.ajax({
        url: api.apiBase + 'auth/userinfo',
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ username: user.username })
    }).done(function (data) {
        if (data.status === undefined || data.status != '0') {
            html = `<p class="text-danger">Failed to load user settings: ${data.message}</p>`;
            Swal.fire({
                title: `${user.username}'s Settings`,
                html: html,
                showCancelButton: true,
                confirmButtonText: 'Close',
                width: '600px'
            });
            return;
        }
        const userInfo = data.result.user;
        const notifications = data.result.notifications;
        const preferences = data.result.preferences;
        if (preferences.length > 0) {
            const themePref = preferences.find(pref => pref.preference_key === 'theme');
            if (themePref) {
                const savedTheme = themePref.preference_value;
                loadTheme(savedTheme).then(() => {
                    console.log(`Loaded user preferred theme: ${savedTheme}`);
                }).catch(err => {
                    console.error('Failed to load user preferred theme:', err);
                });
            }
        }
        html = `<h5>User Information</h5>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Username:</strong> ${userInfo.username}</p>
                        <p><strong>Role:</strong> ${userInfo.role}</p>
                        <p><strong>Printer Authenticated:</strong> ${user.print_authenticated ? 'Yes' : 'No'}</p>
                        ${(userInfo.role.toLowerCase() === 'admin' || userInfo.role.toLowerCase() === 'manager') ? `<p><strong>Incomplete Tickets:</strong> ${data.result.tickets.incomplete_count}</p>` : ''}
                        <p><strong>Choose Theme:</strong></p>
                        <select id="themeSelect" class="form-select mb-3" aria-label="Theme selection">
                            <option value="style" ${api.getCurrentTheme() === 'style' ? 'selected' : ''}>Default</option>
                            <option value="dark" ${api.getCurrentTheme() === 'dark' ? 'selected' : ''}>Dark</option>
                            <option value="light" ${api.getCurrentTheme() === 'light' ? 'selected' : ''}>Light</option>
                            <option value="blue" ${api.getCurrentTheme() === 'blue' ? 'selected' : ''}>Blue</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Create A Ticket:</strong></p>
                        <select class="form-select mb-2" id="ticketTypeSelect" aria-label="Ticket type selection">
                            <option value="">Select a ticket type</option>
                            <option value="Account Issue">Account Issue</option>
                            <option value="Missing SKU">Missing SKU</option>
                            <option value="Missing Item">Missing Item</option>
                            <option value="bug">Bug Report</option>
                            <option value="feature">Feature Request</option>
                            <option value="other">Other</option>
                        </select>
                        <textarea class="form-control mb-2" id="ticketDescription" rows="3" placeholder="Describe your issue..."></textarea>
                        <button class="btn btn-primary" id="createTicketBtn">Create Ticket</button>
                    </div>
                </div>
            </div>
            
            <h5>Notifications</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Total Notifications</th>
                    <td>${notifications.recent.length}</td>
                    <td>Read</td>
                    <td>Delete</td>
             </tr>`;
        notifications.recent.forEach(notif => {
            html += `<tr${notif.is_read ? ' class="table-success"' : ''}>
                    <td id="notif-${notif.id}"><button class="btn notifBtn" data-notif="${notif.id}">${notif.title}</button></td>
                    <td>${notif.message}</td>
                    <td><input type="checkbox" disabled ${notif.is_read ? 'checked' : ''}></td>
                    <td onclick="deleteNotification('${notif.id}')" style="cursor:pointer;color:red;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 .5-.5l2-2V7l-2-2z"/>
                        </svg>
                    </td>
                </tr>`;
        });
        html += `</table>`;

        // users with names containing 'Station' and Operators are not allowed to change passwords
        if (user.role === 'op' || user.username.toLowerCase().includes('station')) {
            Swal.fire({
                title: `${user.username}'s Settings`,
                html: html,
                showCancelButton: true,
                confirmButtonText: 'Close',
                width: '600px'
            });
            return;
        }
        Swal.fire({
            title: `${user.username}'s Settings`,
            html: html,
            showCancelButton: true,
            confirmButtonText: 'Account Settings',
            cancelButtonText: 'Close',
            width: '600px'
        }).then((result) => {
            if (result.isConfirmed) window.location.href = api.isSubdirectory ? '../user' : './user';
        });
    }).fail(function (err) {
        console.error("User Settings Error:", err);
        html = `<p class="text-danger">Failed to load user settings.</p>`;
        Swal.fire({
            title: `${user.username}'s Settings`,
            html: html,
            showCancelButton: true,
            confirmButtonText: 'Close',
            width: '600px'
        });
    });
});