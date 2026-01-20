<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- If the title variable exists, use that. If not, chirper -->
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper'}}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <!--Uses tailwind.css-->
    <!--This is where we can load the js, css resources-->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/style.css',
        '../node_modules/bootstrap/dist/css/bootstrap.min.css'
    ])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    {{ isset($navbar) ? $navbar : `<nav class="navbar bg-base-100">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">🐦 Chirper</a>
        </div>
        <div class="navbar-end gap-2">
            <a href="#" class="btn btn-ghost btn-sm">Sign In</a>
            <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
        </div>
    </nav>` }}


    <main class="flex-1 container mx-auto px-4 py-8">
        <!-- The $slot variable here is used to load components and display their content -->
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2025 Chirper - Built with Laravel and ❤️</p>
        </div>
    </footer>
</body>

</html>