<!-- Detect whether we are in a subdirectory or not -->
@php
    $pathParts = explode('/', request()->path());
    $isSubdirectory = count($pathParts) > 1;

    if ($isSubdirectory) {
        $currentDir = ucfirst($pathParts[0]);
        $currentPage = $pathParts[1];
    } else {
        $currentDir = '';
        $currentPage = $pathParts[0];
    }

    $pageMap = [
        'Shipping /<span class="spanish-text">Envío </span>' => [
            'BOL' => ['BOL', 'BOL Form /<span class="spanish-text">Formulario BOL </span>'],
            'create' => ['create', 'Create Order /<span class="spanish-text">Crear Orden </span>'],
            'pick' => ['pick', 'Pick Order /<span class="spanish-text">Seleccionar Orden </span>'],
            'build' => ['build', 'Build Order /<span class="spanish-text">Construir Orden </span>'],
            'fulfill' => ['fulfill', 'Fulfill Order /<span class="spanish-text">Cumplir Orden </span>']
        ],
        'Quality Control /<span class="spanish-text">Control de Calidad </span>' => [
            'audit' => ['audit', 'Audit /<span class="spanish-text">Auditoría </span>'],
            'station' => ['qc_station', 'Station /<span class="spanish-text">Estación </span>'],
            'final' => ['qc_final', 'Final /<span class="spanish-text">Final </span>']
        ],
        'Reports /<span class="spanish-text">Reportes </span>' => [
            'report' => ['report', 'Production Report /<span class="spanish-text">Reporte de Producción </span>']
        ],
        '' => [ // Root directory
            'grading' => ['grading', 'Grading /<span class="spanish-text">Calificación </span>'],
            'receiving' => ['receiving', 'Receiving /<span class="spanish-text">Recepción </span>'],
            'inventory' => ['inventory', 'Inventory /<span class="spanish-text">Inventario </span>'],
            'location' => ['location', 'FGI Location Assignment /<span class="spanish-text">Asignación de Ubicación de FGI </span>'],
            'A3' => ['A3', 'A3 /<span class="spanish-text">A3 </span>']
        ]
    ];

    function getDir($string)
    {
        if (!$string) {
            return '';
        }
        return match (explode('/', $string)[0]) {
            'grading' => 'Grading',
            'inventory' => 'Inventory',
            'orders' => 'Orders',
            'suppliers' => 'Suppliers',
            'reports' => 'Reports',
            'quality control' => 'QC',
            default => $string,
        };
    }
@endphp

<div class="container-fluid" style="font-size: larger;">
    <a class="navbar-brand mx-5" style="font-size: larger;" href="{{ $isSubdirectory ? '../' : './' }}">Home /<span
            class="spanish-text">
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
                <li><a class="dropdown-item btn btn-danger" onclick="api.logout()"><strong>Log Out</strong> | Cerrar
                        sesión</a></li>
            </ul>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

            @foreach ($pageMap as $subPath)
                @foreach ($subPath as $key => $value)
                    @php
                        $dir = getDir($value[0]);
                        $page = $value[0];
                        $isActive = $currentDir === $dir && $currentPage === $page;
                        if ($isSubdirectory) {
                            $href = "../$dir/$page";
                        } else {
                            $href = "$dir/$page";
                        }
                    @endphp

                    @if ($isActive)
                        continue;
                    @endif
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="{{ $href }}">{!! $value[1] !!}</a>
                    </li>
                @endforeach

            @endforeach
        </ul>
    </div>
</div>