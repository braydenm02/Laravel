<!-- x-layout, calls the layout.blade.php -->
<!-- Now we can add pages by makinge more blade.php and having
    the layoout tag -->
<x-layout>
    <!-- Sets the $title variable in layout to the html inside -->
    <x-slot:title>
        Welcome
    </x-slot:title>
    <x-slot:navbar>

    </x-slot:navbar>
    <div class="container" style="margin-top: 50px">
        <div class="d-flex flex-column align-items-center mb-4">
            <img id="logo" src="../imgs/grading-tool-logo.png" alt="Grading Tool Logo" style="height: 150px;">
        </div>

        <div class="row py-2 g-4 justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 grading">
                <a href="grading" class="d-block w-100 text-decoration-none text-reset">
                    <button
                        class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column justify-content-between align-items-center text-center"
                        type="button">
                        <div class="grow d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                class="bi bi-list-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                            </svg>
                        </div>
                        <div>
                            <span>Grading<br><span class="spanish-text">Calificar</span>
                            </span><br><span class="desc-text">
                                Quality assessment and grading </span>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 reports">
                <div class="submenu-container w-100">
                    <a href="reports" class="main-btn-link">
                        <button
                            class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                            type="button">
                            <div class="grow d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                    class="bi bi-clipboard2-data" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                                    <path
                                        d="M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 0-1 1v3a1 1 0 1 0 2 0V9a1 1 0 0 0-1-1" />
                                </svg>
                            </div>
                            <div>
                                <span> Reports <br>
                                    <span class="spanish-text"> Reportes </span>
                                </span><br><span class="desc-text">Production Analytics
                                    and
                                    Reports</span>
                            </div>
                        </button>
                    </a>
                    <div class="submenu">
                        <a href="reports/report" class="submenu-btn">▸ Production Report</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 receiving">
                <a href="receiving" class="d-block w-100 text-decoration-none text-reset">
                    <button
                        class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                        type="button">
                        <div class="grow d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                                <path
                                    d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                            </svg>
                        </div>
                        <div>
                            <span> Receiving <br>
                                <span class="spanish-text"> Recepción </span>
                            </span><br><span class="desc-text">Incoming shipment
                                processing</span>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 shipping">
                <div class="submenu-container w-100">
                    <a href="shipping/" class="main-btn-link">
                        <button
                            class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                            type="button">
                            <div class="grow d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                    class="bi bi-truck" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                </svg>
                            </div>
                            <div>
                                <span> Shipping <br>
                                    <span class="spanish-text"> Envío </span>
                                </span><br>
                                <span class="desc-text">
                                    Outbound logistics management
                                </span>
                            </div>
                        </button>
                    </a>
                    <div class="submenu">
                        <a href="shipping/create" class="submenu-btn admin-only">▸ Create Order</a>
                        <a href="shipping/fulfill" class="submenu-btn">▸ Fulfill Order</a>
                        <a href="shipping/BOL" class="submenu-btn">▸ Create BOL</a>
                        <a href="shipping/pick" class="submenu-btn">▸ Pick, pack</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 inventory">
                <a href="inventory" class="d-block w-100 text-decoration-none text-reset">
                    <button
                        class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                        type="button">
                        <div class="grow d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                class="bi bi-boxes" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                            </svg>
                        </div>
                        <div>
                            <span> Inventory <br> <span class="spanish-text"> Inventario </span>
                            </span><br><span class="desc-text">Stock management and
                                tracking</span>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 location">
                <a href="location" class="d-block w-100 text-decoration-none text-reset">
                    <button
                        class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                        type="button">
                        <div class="grow d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </div>
                        <div>
                            <span> FGI Location Assignment <br>
                                <span class="spanish-text">Asignación de Ubicación de FGI</span>
                            </span><br><span class="desc-text">Finished goods location tracking</span>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 qc">
                <div class="submenu-container w-100">
                    <a href="qc" class="main-btn-link">
                        <button
                            class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                            type="button">
                            <div class="grow d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                    class="bi bi-patch-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                    <path
                                        d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z" />
                                </svg>
                            </div>
                            <div>
                                <span> Quality Control <br>
                                    <span class="spanish-text"> Control de Calidad </span>
                                </span><br><span class="desc-text">**In
                                    Development**</span>
                            </div>
                        </button>
                    </a>
                    <div class="submenu">
                        <a href="qc/audit" class="submenu-btn">▸ Audit</a>
                        <a href="qc/qc_station" class="submenu-btn qc_station">▸ HP QC Station Audit</a>
                        <a href="qc/qc_final" class="submenu-btn qc_final">▸ HP Final QC Audit</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 a3">
                <a href="A3" class="d-block w-100 text-decoration-none text-reset">
                    <button
                        class="btn btn-outline-dark w-100 py-4 rounded-5 custom-btn btn-height d-flex flex-column align-items-center justify-content-center text-center"
                        type="button">
                        <div class="grow d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                <path
                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                            </svg>
                        </div>
                        <div>
                            <span> HP A3 Refurbishment <br>
                                <span class="spanish-text"> Reacondicionamiento de HP A3 </span>
                            </span><br><span class="desc-text">**In
                                Development**</span>
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </div>
    @foreach ($chirps as $chirp)
        <div class="card bg-base-100 shadow mt-8">
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