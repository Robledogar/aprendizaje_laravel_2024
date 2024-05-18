<?php

namespace App\Http\Controllers;

use App\Models\Inscribirse;
use Illuminate\Http\Request;


class VoluntariosController extends Controller
{
    public function index(Request $request)
    {
        $inscritos = Inscribirse::all();
        

        return view('voluntarios', ['inscritos' => $inscritos]);
    }
}
