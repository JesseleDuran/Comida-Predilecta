<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

use App\Comida;


class PdfController extends Controller
{
    public function invoice() 
    {
        $ingredientes = Ingrediente::latest('created_at')->get();
        $view =  \View::make('pdf.ingredientePDF', compact('ingredientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function pdfComida() 
    {
        $comidas = $comidas = Comida::where('tipo', '=', 'comida')->get();
        $view =  \View::make('pdf.comidaPDF', compact('comidas'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdfComida');
    }

    public function pdfCombo() 
    {
        $combos = Comida::where('tipo', '=', 'combo')->get();
        $view =  \View::make('pdf.comboPDF', compact('combos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdfCombo');
    }
}
