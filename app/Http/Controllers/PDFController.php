<?php

namespace App\Http\Controllers;

use App\Models\LeaveForm;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDF()

    {

        $dompdf = new Dompdf();
        $dompdf->loadHtml('myPDF');

// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF to Browser

        return $dompdf->stream();

    }

    public function pdf($id){
        $leaveforms = LeaveForm::findOrFail($id);

        // Check if the logged-in user is the owner of the leave form
        if ($leaveforms->user_id !== auth()->user()->id) {
            abort(403, 'ไม่ได้รับอนุญาต');
        }

        $users = User::all();
//        dd($leaveforms->leave_start);

        return view('pdf', compact('leaveforms', 'users'));
    }

}
