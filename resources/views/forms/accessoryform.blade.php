<div class="forms" id="accessoryForm">
    <!-- NEW BUTTON FOR ACCESSORIES-->
    <div class="col button-container padding-bottom">
        <div class="container styled-box">
            <div class="container text-center">
                <div class="fluid-container">
                    <div class="row border-bottom border-dark border-3">
                        <h4> ACCESSORY FORM </h4>
                    </div>
                    <!-- Visual Condition -->
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="selectInput" class="form-label mb-1">Visual Condition / <span
                                    class="spanish-text"> Condición Visual </span></label>
                            <select class="form-select text-center" id="VisualA" required>
                                <option value="0"> --- </option>
                                <option value="new">NEW --- NUEVO</option>
                                <option value="6"> Factory Tape --- Cinta de fábrica</option>
                                <option value="1"> No Defects --- Sin defectos </option>
                                <option value="5"> Broken Parts --- Piezas rotas</option>
                                <option value="5"> Unable to clean --- No se puede limpiar</option>
                                <option value="2"> 1-2 minor scratches --- 1-2 rasguños menores</option>
                                <option value="3"> 3-5 scratches --- 3-5 rasguños</option>
                                <option value="3"> 5-10 scratches --- 5-10 rasguños</option>
                                <option value="4"> More than 10 Scratches --- Más de 10 rasguños</option>
                                <option value="5"> Multiple deep scratches --- Múltiples rayones profundos
                                </option>
                                <option value="5"> Stains / Discoloration --- Manchas / Decoloración</option>
                            </select>
                        </div>
                    </div>

                    <!-- Packaging Condition -->
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="selectInput" class="form-label mb-1">Packaging Condition /&nbsp;<span
                                    class="spanish-text"> Condición de Embalaje
                                </span></label>
                            <select class="form-select text-center" id="PackagingA" required>
                                <option value="0"> --- </option>
                                <option value="new">NEW --- NUEVO</option>
                                <option value="1">NEW: OEM Box --- NUEVO: Caja OEM</option>
                                <option value="1">NEW: Non OEM Box --- NUEVO: Caja no OEM</option>
                                <option value="3">USED: Generic Box --- USADO Caja genérica</option>
                                <option value="2">USED: Slightly Damaged box --- USADO: Caja ligeramente dañada
                                </option>
                                <option value="3">USED: OEM Packaging --- USADO: Embalaje OEM</option>
                                <option value="3">USED: Non OEM Packaging --- USADO Embalaje no OEM</option>
                                <option value="4">USED: Damaged Box --- USADO: Caja dañada</option>
                                <option value="5">USED: Very Damaged Box --- Usado: Caja muy dañada</option>
                            </select>
                        </div>
                    </div>

                    <!-- Condition -->
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="selectInput" class="form-label mb-1">Condition /&nbsp;<span
                                    class="spanish-text"> Condición </span></label>
                            <select class="form-select text-center" id="ConditionA" required>
                                <option value="0"> --- </option>
                                <option value="new">NEW --- NUEVO</option>
                                <option value="1"> NEW: Open Box --- NUEVO: Caja Abierta</option>
                                <option value="2"> USED: No missing items --- USADO: No falta artículos</option>
                                <option value="3"> USED: Missing items --- USADO: Faltan artículos</option>
                                <!--<option value="2"> No functional issues --- Sin problemas funcionales</option>-->
                                <option value="4"> Functional issues --- Problemas funcionales</option>
                                <option value="5"> Will not power on --- No se enciende</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-3">
                    <button class="btn btn-outline-success btn-2" style="background-color: #C1E1C1;" type="button"
                        onclick="fillAllNew()">Set All to
                        New / <span class="text-muted"> Todo es
                            Nuevo</span></button>
                </div>

                <div class="row border-bottom border-dark border-3 padding">
                    <h4> OTHER</h4>
                </div>

                <!-- Comments -->
                <div class="container">
                    <div class="d-inline-flex">
                        <button
                            class="btn btn-outline-dark btn-com btn-custom-size rounded-5 justify-content-center d-flex align-items-center"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">
                            Add comments / Añadir comentarios
                        </button>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="text mt-3">
                            <textarea class="form-control" id="commentsa" rows="3"
                                placeholder="Add comments here... / Añade tus comentarios aquí..."></textarea>
                        </div>
                    </div>
                </div>

                <!--Submit button-->
                <div class="text-center">
                    <br>
                    <button class="btn btn-dark green-hover w-25 checkForm" type="button">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>