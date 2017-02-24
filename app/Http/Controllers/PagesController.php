<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
    	$name = 'Jessele Duran';
    	
    	return view('about')->with('name', $name);

    }

    public function contact()
    {
    	return view('contact');
    }



}
