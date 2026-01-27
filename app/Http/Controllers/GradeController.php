<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;

class GradeController extends Controller {

    private function respond($status, $message, $data = [], $code = 200) {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function index() {
        return view('grading');
    }

    public function gradeItem(Request $request) {
        $serial = $request->input('serial');

        // Get the printers matching the serial number
        $printers = Printer::where('serial', '=', $serial)->get();

        if ($printers->isEmpty()) {
            return $this->respond(1, 'No items found with that serial number.');
        }
        if ($printers->count() > 1) {
            return $this->respond(1, 'Multiple items found with that serial number. Please contact support.');
        }
        
        $printerHTML = view('partials.printer_table', ['printers' => $printers])->render();
        $serialHTML = 'Showing Results for ' . $serial;

        if (str_starts_with($serial, 'PRN')) {
            $form = view('forms.printform')->render();
        } else {
            $form = view('forms.accessoryform')->render();
        }
        
        return $this->respond(0, 'Showing items for ' . $serial, [
            'printerHTML' => $printerHTML,
            'serialHTML' => $serialHTML,
            'form' => $form
        ]);
    }   

}