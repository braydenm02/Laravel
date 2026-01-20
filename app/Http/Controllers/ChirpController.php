<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $default_roles = ['admin', 'manager', 'lead', 'op'];
        $chirps = [
            [
                'author' => 'Jane Doe',
                'message' => 'Just deployed my first Laravel app! 🚀',
                'time' => '5 minutes ago'
            ],
            [
                'author' => 'John Smith',
                'message' => 'Laravel makes web development fun again!',
                'time' => '1 hour ago'
            ],
            [
                'author' => 'Alice Johnson',
                'message' => 'Working on something cool with Chirper...',
                'time' => '3 hours ago'
            ]
        ];
        $data = [
            [
                'href' => 'grading',
                'description' => '<span>Grading<br><span class="spanish-text">Calificar</span>
                    </span><br><span class="desc-text">
                    Quality assessment and grading </span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'reporting',
                'description' => '<span>Reporting<br><span class="spanish-text">Informes</span></span><br><span class="desc-text">Generate reports and insights</span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'receiving',
                'description' => '<span> Receiving <br>
                    <span class="spanish-text"> Recepción </span>
                    </span><br><span class="desc-text">Incoming shipment
                    processing</span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'shipping',
                'description' => '<span> Shipping <br><span 
                    class="spanish-text"> Envío </span></span><br><span 
                    class="desc-text">Outbound logistics management</span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'inventory',
                'description' => '<span> Inventory <br><span class="spanish-text"> Inventario </span></span><br><span class="desc-text">Stock management and control</span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'location',
                'description' => '<span> FGI Location Assignment <br><span 
                    class="spanish-text">Asignación de Ubicación de FGI</span>
                    </span><br><span class="desc-text">Finished goods location tracking
                    </span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'qc',
                'description' => '<span> Quality Control <br><span 
                    class="spanish-text"> Control de Calidad </span></span><br>
                    <span class="desc-text">Product quality assurance and testing
                    </span>',
                'roles' => $default_roles
            ],
            [
                'href' => 'A3',
                'description' => '<span> HP A3 Refurbishment <br><span 
                    class="spanish-text"> Reacondicionamiento de HP A3 </span>
                    </span><br><span class="desc-text">**In Development**</span>',
                'roles' => $default_roles
            ]
        ];
        

        return view('home', ['chirps' => $chirps, 'data' => $data]);
    }
}