<!-- x-layout, calls the layout.blade.php -->
<!-- Now we can add pages by makinge more blade.php and having
    the layoout tag -->
<x-layout>
    <!-- Sets the $title variable in layout to the html inside -->
    <x-slot:title>
        Welcome
    </x-slot:title>
    <x-slot:navbar>
        <nav class="navbar bg-base-100">
            <div class="navbar-start">
                <a href="/" class="btn btn-ghost text-xl">🏭 Warehouse Management System</a>
            </div>
            <div class="navbar-end gap-2">
                <a href="#" class="btn btn-ghost btn-sm">Sign In</a>
                <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
            </div>
        </nav>
    </x-slot:navbar>
    <div class="row py-2 g-4 justify-content-center">
        @foreach ($data as $div)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ isset($div['href']) ? $div['href'] : '#' }}" class="text-decoration-none">
                    <button
                        class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column justify-content-between align-items-center text-center">
                        {!! isset($div['description']) ? $div['description'] : '' !!}
                    </button>
                </a>
            </div>
        @endforeach
    </div>

    @foreach ($chirps as $chirp)
        <div class=" card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <div class="font-semibold">{{ $chirp['author'] }}</div>
                    <div class="mt-1">{{ $chirp['message'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">{{ $chirp['time'] }}</div>
                </div>
            </div>
        </div>
    @endforeach
</x-layout>
<x-footer />