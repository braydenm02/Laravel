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

        if ($printers->isEmpty()) {
            return view('grading', ['printers' => 'Serial number not found in inventory.']);
        }
        if ($printers->count() > 1) {
            return view('grading', ['printers' => 'Multiple items found with the same serial number. Please contact support.']);
        }
        
        $printerHTML = view('partials.printer_table', ['printers' => $printers])->render();
        $serialHTML = 'Showing Results for ' . $serial;

        if (str_starts_with($serial, 'PRN')) {
            $form = view('forms.printform')->render();
        } else {
            $form = view('forms.accessoryform')->render();
        }
        return view('grading', ['form' => $form, 'printers' => $printerHTML, 'serial' => $serialHTML]);
    }   
}