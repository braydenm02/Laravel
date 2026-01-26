<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;

class GradeController extends Controller {
    public function index() {
        return view('grading');
    }

    public function gradeItem(Request $request) {
        $serial = $request->input('serial');

        // Get the printers matching the serial number
        $printers = Printer::where('serial', '=', $serial)->get();
        // Get the item from inventory based on the serial number
        // Detect if it is a printer or accessory
        // Return the appopriate form
        $form = $this->accessoryForm();
        if (str_starts_with($serial, 'PRN')) {
            $form = $this->printerForm();
        }
        return view('grading', ['form' => $form, 'printers' => $printers]);
    }   

    public function printerForm() {
    return <<<'HTML'
    <!--PRINTER FORM-->
    <div class="container-fluid px-5  forms" id="gradeForm">
        <div class="card text-start" style="border-radius: 20px;">
            <div class="card-body" style="margin: 1rem;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0" style="font-size: x-large;">
                        Printer Form <span class="spanish-text"> / Formulario de Impresora </span>
                    </h4>
                    <div class="d-flex gap-2" style="max-height: 90%;">
                        <!--NEW BUTTON-->
                        <button type="button" class="btn btn-warning rounded-5" style="font-size: medium;"
                            data-bs-toggle="modal" data-bs-target="#nibmodal"><span class="icon mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-patch-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                    <path
                                        d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z" />
                                </svg></span> NEW: Unopened / <span class="text-muted2"> NUEVO: Sin Abrir </span>
                        </button>
                        <!-- Modal NEW -->
                        <div class="modal fade" id="nibmodal" tabindex="-1" aria-labelledby="nibmodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="nibmodalLabel">Warning! Advertencia!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure this is box is unopened with orange tape or is factory sealed? This
                                        will
                                        automatically assign it a
                                        grade "A".
                                        <br>
                                        <span class="spanish-text"> ¿Estás seguro de que esta caja
                                            está
                                            sin abrir con cinta naranja o está sellada de fábrica? Al hacer clic en
                                            "Yes", se le
                                            asignará automáticamente una
                                            calificación de "A". </span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-success" id="nibButton">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TODO: Remove the popup form selection as it is now automatic-->
                        <button type="button" class="btn btn-secondary rounded-5" style="font-size: medium;"
                            id="showAccessoryForm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                            Accessory Box / <span class="text-muted2"> Caja de Accesorios </span>
                        </button>
                        <button type="button" class="btn btn-info rounded-5" style="font-size: medium;"
                            id="tonerButton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-droplet-half" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M7.21.8C7.69.295 8 0 8 0q.164.544.371 1.038c.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8m.413 1.021A31 31 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                                <path fill-rule="evenodd"
                                    d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87z" />
                            </svg>
                            Toner <span class="spanish-text"> </span>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row border-bottom border-dark border-3 mb-3">
                            <h4> Cosmetics / <span class="spanish-text"> Cosméticos
                                </span> </h4>
                        </div>
                        <!-- Visual Condition -->
                        <div class="form-group mb-3">
                            <label for="selectInput" class="form-label mb-1">
                                Visual Condition<span class="spanish-text"> / Condición Visual</span>
                            </label>
                            <select class="form-select" id="Visual" required>
                                <option value="0"> --- </option>
                                <option value="1"> No Defects --- Sin defectos </option>
                                <option value="5"> Broken Parts --- Piezas rotas</option>
                                <option value="5"> Unable to clean --- No se puede limpiar</option>
                                <option value="2"> 1-2 minor scratches --- 1-2 rasguños menores</option>
                                <option value="3"> 3-5 scratches --- 3-5 rasguños</option>
                                <option value="3"> 5-10 scratches --- 5-10 rasguños</option>
                                <option value="4"> More than 10 Scratches --- Más de 10 rasguños</option>
                                <option value="5"> Multiple deep scratches --- Múltiples rayones profundos</option>
                                <option value="5"> Stains / Discoloration --- Manchas / Decoloración</option>
                            </select>
                        </div>
                        <!-- Packaging Condition -->
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="selectInput" class="form-label mb-1">
                                    Packaging Condition <span class="spanish-text"> / Condición de Embalaje</span>
                                </label>
                                <select class="form-select" id="Packaging" required>
                                    <option value="0"> --- </option>
                                    <option value="1">NEW: OEM Box --- NUEVO: Caja OEM</option>
                                    <option value="1">NEW: Non OEM Box --- NUEVO: Caja no OEM</option>
                                    <option value="3">USED: OEM Packaging --- USADO: Embalaje OEM</option>
                                    <option value="3">USED: Non OEM Packaging --- USADO Embalaje no OEM</option>
                                    <option value="3">USED: Generic Box --- USADO Caja genérica</option>
                                    <option value="2">USED: Slightly Damaged box --- USADO: Caja ligeramente
                                        dañada
                                    </option>
                                    <option value="4">USED: Damaged Box --- USADO: Caja dañada</option>
                                    <option value="5">USED: Very Damaged Box --- Usado: Caja muy dañada</option>
                                    <option value="1">No Packaging --- Sin embalaje</option>
                                </select>
                            </div>
                        </div>
                        <!-- FUNCTIONALITY CONTAINER -->
                        <div class="row border-bottom border-dark border-3 mb-3">
                            <h4> Functionality / <span class="spanish-text"> Funcionalidad
                                </span></h4>
                        </div>

                        <!-- Condition -->
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="selectInput" class="form-label mb-1">
                                    Condition <span class="spanish-text"> / Condición</span>
                                </label>
                                <select class="form-select" id="Condition" required>
                                    <option value="0"> --- </option>
                                    <option value="1"> NEW: Open Box --- NUEVO: Caja Abierta</option>
                                    <option value="2"> USED: No missing items --- USADO: No falta artículos</option>
                                    <option value="3"> USED: Missing items --- USADO: Faltan artículos</option>
                                    <!--<option value="2"> No functional issues --- Sin problemas funcionales</option>-->
                                    <option value="5"> Functional issues --- Problemas funcionales</option>
                                    <option value="5"> Will not power on --- No se enciende</option>
                                    <option value="5"> PASSWORD NEEDED</option>
                                </select>
                            </div>
                        </div>

                        <!-- Pages-->
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="selectInput" class="form-label mb-1">
                                    Pages <span class="spanish-text"> / Páginas</span>
                                </label>
                                <select class="form-select" id="Pages" required>
                                    <option value="0"> --- </option>
                                    <option value="-1">Not detectable --- No detectable</option>
                                    <option value="1">Less than 20k pages --- Menos de 20k páginas</option>
                                    <option value="2">20k to 40k pages --- 20k a 40k páginas</option>
                                    <option value="3">More than 40k pages --- Mas de 40k páginas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="margin-left: 30px;">
                        <!--Toner level (Colors)-->
                        <div class="row mb-3">
                            <div class="row border-bottom border-dark border-3">
                                <h4> Toner Level / <span class="spanish-text"> Nivel de Toner </h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3 padding">
                                        <label for="selectInput" class="input-group-text">Black&nbsp;<span
                                                style="font-weight: bold;">
                                                (K) </span></label>
                                        <select class="form-select" id="TonerK" required>
                                            <option value="0"> --- </option>
                                            <option value="-1">Not detectable --- No detectable</option>
                                            <option value="1">Toner level > 80% toner --- Nivel de toner > 80%
                                            </option>
                                            <option value="2">Toner Level 50% to 80% --- Nivel de toner 50% a 80%
                                            </option>
                                            <option value="3">Toner level less than 50% --- Nivel de toner menos de 50%
                                            </option>
                                            <option value="4">No toner cartridge --- Sin cartucho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3 padding">
                                        <label for="selectInput" class="input-group-text">Cyan&nbsp;<span
                                                style="font-weight: bold;">
                                                (C) </span></label>
                                        <select class="form-select" id="TonerC" required>
                                            <option value="0"> --- </option>
                                            <option value="1">Toner level > 80% toner --- Nivel de toner > 80%
                                            </option>
                                            <option value="2">Toner Level 50% to 80% --- Nivel de toner 50% a 80%
                                            </option>
                                            <option value="3">Toner level less than 50% --- Nivel de toner menos de 50%
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <label for="selectInput" class="input-group-text">Magenta&nbsp;<span
                                                style="font-weight: bold;">
                                                (M) </span></label>
                                        <select class="form-select" id="TonerM" required>
                                            <option value="0"> --- </option>
                                            <option value="1">Toner level > 80% toner --- Nivel de toner > 80%
                                            </option>
                                            <option value="2">Toner Level 50% to 80% --- Nivel de toner 50% a 80%
                                            </option>
                                            <option value="3">Toner level less than 50% --- Nivel de toner menos de 50%
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <label for="selectInput" class="input-group-text">Yellow&nbsp;<span
                                                style="font-weight: bold;">
                                                (Y) </span></label>
                                        <select class="form-select" id="TonerY" required>
                                            <option value="0"> --- </option>
                                            <option value="1">Toner level > 80% toner --- Nivel de toner > 80%
                                            </option>
                                            <option value="2">Toner Level 50% to 80% --- Nivel de toner 50% a 80%
                                            </option>
                                            <option value="3">Toner level less than 50% --- Nivel de toner menos de 50%
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom border-dark border-3 mb-3">
                            <h4> Other / <span class="spanish-text"> Otro </h4>
                        </div>
                        <!--PRINTER TYPE-->
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="selectInput" class="form-label mb-1">
                                    Printer Type <span class="spanish-text"> / Tipo de Impresora </span>
                                </label>
                                <select class="form-select" id="Printer" required>
                                    <option value="Printer" default> Printer </option>
                                    <option value="A3"> A3 </option>
                                    <option value="Scanner"> Scanner </option>
                                    <option value="Plotter"> Plotter </option>
                                </select>
                            </div>
                        </div>
                        <!--BER-->
                        <div class="row justify-content-center text-center">
                            <div class="col-auto">
                                <button type="button"
                                    class="btn btn-outline-dark btn-ber btn-custom-size rounded-5 d-flex align-items-center justify-content-center mx-auto"
                                    data-bs-toggle="modal" data-bs-target="#brokenModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red"
                                        class="bi bi-exclamation-triangle-fill" viewBox="0 0 20 17">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg> Create BER Report / <span class="spanish-text"> Crear informe BER </span>
                                </button>
                            </div>
                            <!-- Modal BER -->
                            <div class="modal fade" id="brokenModal" tabindex="-1" aria-labelledby="brokenModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="brokenModalLabel">Warning! Advertencia!
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure this is printer has broken parts? This will automatically
                                            assign it
                                            a "BER"
                                            grade.
                                            <br>
                                            <span class="spanish-text"> ¿Estás seguro de que
                                                esta
                                                impresora
                                                tiene partes rotas? Al hacer clic en "Yes", se le asignará
                                                automáticamente
                                                una
                                                calificación de "BER". </span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <button type="button" class="btn btn-success" id="berConfirm">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Broken Form Hidden -->
                            <div class="modal-body d-none mt-3" id="dropdownForm">
                                <label for="part1" class="form-label">Error Codes / <span class="spanish-text">Códigos
                                        de
                                        Error:</span></label>
                                <select class="form-select mb-2" id="part1">
                                </select>

                                <label for="part2" class="form-label">Missing or Broken Parts / <span
                                        class="spanish-text">
                                        Piezas Rotas o Faltantes:
                                    </span></label>
                                <select class="form-select mb-2" id="part2">
                                </select>

                                <label for="part3" class="form-label">Functional Issues / <span class="spanish-text">
                                        Problemas funcionales::
                                    </span></label>
                                <select class="form-select mb-2" id="part3">
                                </select>

                                <label for="part4" class="form-label"> Other / <span class="spanish-text">
                                        Otro: </span></label>
                                <input type="text" class="form-control"
                                    placeholder="Describe any other issues here... / Describe cualquier otro problema aquí..."
                                    id="part4">
                            </div>
                        </div>
                        <!-- Comments -->
                        <div class="row d-flex justify-content-center">
                            <button
                                class="btn btn-outline-dark btn-com btn-custom-size rounded-5 justify-content-center d-flex align-items-center"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                Add comments / Añadir comentarios
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="text mt-3">
                                    <textarea class="form-control" id="content"="3" rows
                                        placeholder="Add comments here... / Añade tus comentarios aquí..."></textarea>
                                </div>
                            </div>
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
HTML;
    }

    public function accessoryForm() {
        return <<<'HTML'
        
    <!-- ACCESSORY FORM -->
    <div class="col  forms" id="accessoryForm">
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
HTML;
    }
}