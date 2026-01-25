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
    <nav class="navbar basenav">
        <x-navbar />
    </nav>
    <main class="flex-1 container mx-auto px-4 py-8">
        <!-- The $slot variable here is used to load components and display their content -->
        {{ $slot }}
    </main>
    <canvas id="canvas-slp" style="display:none;"></canvas>
    <canvas id="canvas-serial" style="display:none;"></canvas>
    <canvas id="canvas-sku" style="display:none;"></canvas>
</body>

</html>