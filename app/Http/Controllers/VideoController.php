<?php

namespace App\Http\Controllers;
use App\Models\Video; // Agrega esta línea para importar el modelo Task

use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $videos = Video::all();//all() seleciona toda la tabla
        return view('max', compact('videos'));//compact pasa los datos a la vista con el metodo view()
        

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
    public function show($video_id)
    {
        //
        $videos = Video::find($video_id);//all() seleciona toda la tabla

       // var_dump($videos);

        return view('play', compact('videos'));//compact pasa los datos a la vista con el metodo view()

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
