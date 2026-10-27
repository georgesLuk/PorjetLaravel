<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeuxContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On va chabger le monde
        return View('jeux.index');
        //jeux.index fait référence au dossier Views/jeux/index.blade.php
    }

    public function indexGabarits(){
        return View('jeux.indexAvecGabarit');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
