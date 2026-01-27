<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <!--  -->
    <div class="row">
        <div class="col-2 d-flex vh-100 border-end">
            <!-- Vertical Scrolling Sidebar for choosing chapters -->
            <div class="p-3 bg-white">
                <a href="/dashboard"
                    class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <span class="fs-5 fw-semibold">Dashboard Menu</span>
                </a>
                <ul class="list-unstyled ps-0">
                    @isset($chapters)
                        @foreach($chapters as $chapter)
                            <li class="mb-1">
                                <button class="btn btn-dark">{{$chapter->name}}</button>
                            </li>
                        @endforeach
                    @else
                        <li class="mb-1">
                            <span class="text-muted">No Chapters Available</span>
                        </li>
                    @endisset
                </ul>
            </div>
        </div>
        <div class="col-10 d-flex flex-column">
            @isset($form)
                <!-- textEditor.blade view for the chapter form -->
                @include('components.textEditor', ['form' => $form])
            @else
                @include('components.textEditor')
            @endisset
        </div>
    </div>

</x-layout>

<x-footer />