<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    
    public function Dashboard()
    {
        return view('Documents.dashboard');
    }

    public function Detalles()
    {
        return view('Documents.details');
    }
}
