<?php

namespace App\Http\Controllers;

use App\Models\Inscribirse;
use Illuminate\Http\Request;

class InscribirseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Accediendo al controlador con el método index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $inscrito = new Inscribirse;
    
        $inscrito->nombre = $request->nombre;
        $inscrito->email = $request->correo;
    
        $inscrito->save();
        
        return redirect('/registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscribirse $inscribirse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscribirse $inscribirse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscribirse $inscribirse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscribirse $inscribirse)
    {
        //
    }
}
