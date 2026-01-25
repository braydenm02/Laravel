/**
 * Navbar Module
 * This file is only for generating the navbar across different pages. It detects
 * if the current page is in a subdirectory (like 'shipping', 'qc', or 'audit')
 * and adjusts the links accordingly. It hides the link of the current page to prevent
 * redundant navigation.
 */
export function init() {
    let navbar = `<div class="container-fluid" style="font-size: larger;">
    <a class="navbar-brand mx-5" style="font-size: larger;" href="${isSubdirectory ? '../' : './'}">Home /<span class="spanish-text">
        Inicio </span></a>
<div class="d-flex align-items-center ms-auto">
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Separate username/role dropdown -->
    <div class="dropdown mx-3">
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span id="username">Username</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
            <li class="dropdown-item-text">Role: <span id="role">User</span></li>
            <li><a class="dropdown-item btn btn-danger" onclick="api.logout()"><strong>Log Out</strong> | Cerrar sesión</a></li>
        </ul>
    </div>
</div>
<div class="collapse navbar-collapse" id="navbarNav"><ul class="navbar-nav ms-auto">`;

    const pathParts = window.location.pathname.toLowerCase().split('/').filter(part => part);
    let currentDir = '';
    let currentPage = 'index'; // Default page

    if (pathParts.length > 0) {
        if (subDirectories.includes(pathParts[0])) {
            currentDir = pathParts[0];
            if (pathParts.length > 1) currentPage = pathParts[1].replace('.html', '');
        } else {
            currentDir = '';
            currentPage = pathParts[0].replace('.html', '');
        }
    }

    for (const [dir, pages] of Object.entries(pageMap)) {
        // Skip entire subdirectory dropdown if we're on its index page
        if (dir === currentDir && currentPage === 'index' && dir !== '') continue;

        for (const [page, [subPath, label]] of Object.entries(pages)) {
            // Skip adding link to current page
            if (dir === currentDir && page === currentPage) continue;
            const href = `${isSubdirectory ? '../' : './'}${dir ? getDir(dir) + '/' : ''}${page === 'index' ? '' : page}`;
            if (Object.keys(pageMap).some(subDir => subDir === dir && subDir !== '')) {
                // It's a subdirectory with dropdown
                if (!navbar.includes(`href="${isSubdirectory ? '../' : './'}${getDir(dir)}"`)) {
                    const dirLabel = dir.charAt(0).toUpperCase() + dir.slice(1);
                    navbar += `<li class="nav-item dropdown">
                    <a class="nav-link" href="${isSubdirectory ? '../' : './'}${getDir(dir)}" style="display: inline-block; padding-right: 0;"> ${dirLabel}</a>
                    <span class="dropdown-toggle nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; display: inline-block; padding-left: 0.25rem; vertical-align: middle;"></span>
                    <ul class="dropdown-menu dropdown-menu-dark">`;
                }
                navbar += `<li><a class="dropdown-item text-center" href="${href}"> ${label.split('/')[0]} </a></li>`;
                if (Object.keys(pages).indexOf(page) === Object.keys(pages).length - 1) navbar += `</ul></li>`;
            } else {
                // Regular link
                navbar += `<li class="nav-item"><a class="nav-link" href="${href}"> ${label} </a></li>`;
            }
        }
    }
    navbar += `</ul></div></div>`;

    $('.basenav').addClass('navbar navbar-dark bg-dark');
    $('.basenav').html(navbar);

}

/**
 * Gets the directory identifier from a given string.
 * @param {String} string Window location path
 * @returns {String} Directory identifier
 */
function getDir(string) {
    if (!string || string == '' || string == null) return '';
    const pathParts = string.toLowerCase().split('/').filter(part => part);
    let temp = '';
    if (pathParts.length > 0) {
        temp = pathParts[0].toLowerCase().trim();
    }

    switch (temp) {
        case 'quality control':
            temp = 'qc';
            break;
        default:
            break;
    }
    return temp;
}


const subDirectories = ['shipping', 'qc', 'reports'];
const isSubdirectory = subDirectories.some(dir => window.location.pathname.toLowerCase().includes(`/${dir}/`));
/**
 * Page Map Object
 * Maps directories and their respective pages with labels.
 */
const pageMap = {
    'Shipping /<span class="spanish-text">Envío </span>':
    {
        'BOL': ['BOL', 'BOL Form /<span class="spanish-text">Formulario BOL </span>'],
        'create': ['create', 'Create Order /<span class="spanish-text">Crear Orden </span>'],
        'pick': ['pick', 'Pick Order /<span class="spanish-text">Seleccionar Orden </span>'],
        'build': ['build', 'Build Order /<span class="spanish-text">Construir Orden </span>'],
        'fulfill': ['fulfill', 'Fulfill Order /<span class="spanish-text">Cumplir Orden </span>']
    },
    'Quality Control /<span class="spanish-text">Control de Calidad </span>':
    {
        'audit': ['audit', 'Audit /<span class="spanish-text">Auditoría </span>'],
        'station': ['qc_station', 'Station /<span class="spanish-text">Estación </span>'],
        'final': ['qc_final', 'Final /<span class="spanish-text">Final </span>']
    },
    'Reports /<span class="spanish-text">Reportes </span>':
    {
        'report': ['report', 'Production Report /<span class="spanish-text">Reporte de Producción </span>']
    },
    '': // Root directory
    {
        'grading': ['grading', 'Grading /<span class="spanish-text">Calificación </span>'],
        'receiving': ['receiving', 'Receiving /<span class="spanish-text">Recepción </span>'],
        'inventory': ['inventory', 'Inventory /<span class="spanish-text">Inventario </span>'],
        'location': ['location', 'FGI Location Assignment /<span class="spanish-text">Asignación de Ubicación de FGI </span>'],
        'A3': ['A3', 'A3 /<span class="spanish-text">A3 </span>']
    }
};

