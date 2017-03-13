<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingrediente;

use App\Comida;
use App\User;
use App\Venta;
use App\Cliente;
use Illuminate\Support\Facades\DB;


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

        $arreglo = array();

        for ($i=0; $i < sizeof($comidas) ; $i++) 
        {
            $cantPosibleComidas = $this->cantidad_posible($comidas[$i]->id); 
            array_push($arreglo, $cantPosibleComidas);    
        }

        $view =  \View::make('pdf.comidaPDF', compact('comidas', 'arreglo'))->render();
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

    public function pdfVentas() 
    {
        $ventas = Venta::all();
        $view =  \View::make('pdf.ventasPDF', compact('ventas'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdfVenta');
    }

    public function pdfClientes() 
    {
        $clientes = Cliente::latest('created_at')->get();
        $view =  \View::make('pdf.clientesPDF', compact('clientes'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdfCliente');
    }

    public function pdfUser() 
    {
        $users = User::where('admin', 'false')->get();
        $view =  \View::make('pdf.usersPDF', compact('users'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdfCliente');
    }

    protected function cantidad_posible($id)
    {
      $cantPosibleComidas = DB::table('comida_ingrediente')
                          ->select(DB::raw('min((ingrediente.cantidad / comida_ingrediente.cantidad)) AS cant_posible, comida.nombre'))
                          ->join('comida', 'comida_ingrediente.id_comida', '=', 'comida.id')
                          ->join('ingrediente', 'comida_ingrediente.id_ingrediente', '=', 'ingrediente.id')->where('comida.id', $id)
                          ->groupBy('comida.nombre')
                          ->first();

      return $cantPosibleComidas;
    }
}
