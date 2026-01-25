import $ from 'jquery';

export const user = {
    init: function (username, role, print_authenticated) {
        console.log(`Welcome ${username}`);
        this.username = username;
        this.role = role;
        this.print_authenticated = print_authenticated;
        this.getData();
    },
    username: '',
    role: '',
    building: '',
    notifications: [],
    tickets: [],
    preferences: [],
    print_authenticated: false,
    isAdmin: function () {
        return (this.role === 'admin' || this.role === 'manager');
    },
    isLead: function () {
        return (this.role === 'lead');
    },
    getData: function () {
        if (!this.username) {
            api.logout();
            return;
        }
        $.ajax({
            url: api.admin + 'userData',
            method: 'POST',
            data: {
                username: user.username
            }
        }).done(function (data) {
            if (data && data.message && typeof data.message === 'string' && data.message.includes('Please log in')) {
                window.location.href = api.loginPage;
                return;
            }
            if (data.status != '0') console.error("User Data Fetch Error:", data.message);
            if (!data.result) return;
            user.notifications = data.result.notifications || [];
            user.tickets = data.result.tickets || [];
            user.preferences = data.result.preferences || [];
            user.building = data.result.user.building || '';
            if (window.location.pathname.toLowerCase().includes('user')) {
                displayUserInfo();
            }
        }).fail(function (err) {
            console.error("User Data Error:", err);
        });
    },
    notificationAlert: function (notif, type = 'info', title = '') {
        let html = `<p>${notif.message}</p>`;
        html += `<p><strong>Date:</strong> ${notif.created_at}</p>`;
        Swal.fire({
            title: notif.title,
            html: html,
            icon: notif.is_read ? 'question' : 'success',
            confirmButtonText: 'Close'
        }).then((res) => {
            // Reload the notifications table
            if (res.isConfirmed) {
                $('#userSettingsModal').trigger('click');
            }
        });
    },
    viewNotification: function (notificationId) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: api.apiBase + 'auth/notification',
                method: "POST",
                data: { id: notificationId }
            }).done(function (data) {
                resolve(data);
            }).fail(function (err) {
                reject(err);
            });
        });
    },
    deleteNotification: function (notificationId, read) {
        if (!read) {
            return Promise.resolve({ status: '1', message: 'Notification not marked as read.' });
        }
        return new Promise((resolve, reject) => {
            $.ajax({
                url: api.apiBase + 'auth/notification/delete',
                method: "POST",
                data: { id: notificationId }
            }).done(function (data) {
                resolve(data);
            }).fail(function (err) {
                reject(err);
            });
        });
    },
    loadFromCache: function () {
        const cachedData = api.cache.get('user');
        if (!cachedData) throw new Error('No cached user data found.');
        console.log(`Welcome ${cachedData.username}`);

        // Map cached data to user object
        user.username = cachedData.username || '';
        user.role = cachedData.role || '';
        user.building = cachedData.building || '';
        user.notifications = cachedData.notifications || [];
        user.tickets = cachedData.tickets || [];
        user.preferences = cachedData.preferences || [];
        user.print_authenticated = cachedData.print_authenticated || false;
    }
};

$(document).on('click', '.notifBtn', function () {
    const notifId = $(this).data('notif');
    user.viewNotification(notifId).then(data => {
        if (data.status != '0') {
            console.error("Notification Fetch Error:", data.message);
            Swal.fire({
                title: 'Error',
                text: 'Failed to load notification details.',
                icon: 'error'
            });
            return;
        }
        user.notificationAlert(data.result.notification);
    }).catch(err => {
        console.error("Notification Error:", err);
        Swal.fire({
            title: 'Error',
            text: 'An error occurred while fetching the notification.',
            icon: 'error'
        });
    });
});