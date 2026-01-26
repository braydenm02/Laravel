<x-layout>
    <x-slot:title>
        Grading
    </x-slot:title>


    <!--STATION & SEARCH-->
    <div class="container-fluid px-5">
        <div class="card text-start" style="border-radius: 20px;">
            <div class="card-body">
                <h4 class="card-title mb-4" style="font-size: xx-large; ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                        class="bi bi-list-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                    </svg> Grading <span class="spanish-text"> / Calificación </span>
                </h4>
                <div class="row">
                    <!-- Grading station -->
                    <div class="col-12 col-md-4 mb-2 mb-md-0">
                        <div class="input-group">
                            <label for="selectInput" class="input-group-text">Grading Station /&nbsp;<span
                                    class="spanish-text">
                                    Estación</span></label>
                            <select class="form-select" id="Station" required
                                style="min-width: 100px; max-width: 215px;">
                                <option value="0"> --- </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                            </select>
                        </div>
                    </div>
                    <!-- Serial Number -->
                    <div class="col-12 col-md-8">
                        <form id="gradeFormSearch" class="d-flex justify-content-center" action="/grading"
                            method="POST">
                            @csrf
                            <div id="searchBar">
                                <div class="input-group">
                                    <label for="searchInput" class="input-group-text"> SLP or Serial Number / <span
                                            class="spanish-text">&nbsp;Número de Serie </span></label>
                                    <input type="text" class="form-control" id="searchInput" name="serial"
                                        placeholder="Enter Serial No. or SLP / Ingrese Núm. de Serie o SLP" required
                                        style="min-width: 200px;">
                                    <button class="btn btn-dark green-hover" type="submit"
                                        id="gradeSearch">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table + Search Message-->
    <div id="searchMessage" class="mt-2 spanish-text text-center"></div>
    <div class="" id="gradeResults">
        {{ isset($printers) ? $printers->toJson() : '' }}
    </div>

    <!-- Alerts -->
    <div class="d-flex justify-content-center">
        <div id="dangerAlert" class="alert alert-danger fade d-flex align-items-center p-3 d-none" role="alert"
            style="max-width: 500px;">
            <svg class="me-2" role="img" aria-label="Danger:" style="width: 1em; height: 1em;">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>Warning! Failed to input grade. <b>Error! No se pudo calificar.</b></div>
        </div>
    </div>

    <!--Table -->
    <div class="fluid-container text-center" style="padding: 0;" id="itemInfo"></div>
    <div id="graded"></div>

    <div class="form-container mt-4">
        {!! isset($form) ? $form : '' !!}
    </div>
</x-layout>

@vite(['resources/js/script.js'])