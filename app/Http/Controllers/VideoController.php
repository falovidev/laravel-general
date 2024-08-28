<?php

namespace App\Http\Controllers;
use App\Models\Video; 
use App\Models\MyStuff;
use App\Models\VideoPlay;
use Illuminate\Http\Request;

class VideoController extends Controller
{


    protected function getFilteredVideos()
    {
        $userId =1;

        return Video::selectRaw('max.videos.*, 
        CASE 
            WHEN type = 1 THEN "serie" 
            WHEN type = 2 THEN "pelicula" 
            ELSE "otro"
        END as tipo,
        CASE 
            WHEN mystuff.userid IS NOT NULL THEN "stuff" 
            ELSE "no_stuff"
        END as status
        ')
        ->leftJoin('max.mystuff', function ($join) use ($userId) {
            $join->on('max.videos.videoid', '=', 'max.mystuff.videoid')
                 ->where('max.mystuff.userid', $userId);
        })
        ->orderBy('name', 'asc')
        ->get();
    }



    public function index()
    {
        $vista='any';
        $userId =1;
        $videos = $this->getFilteredVideos();

        $videoPlay= Video::selectRaw('*')
            ->join('max.video_play as vp', 'max.videos.videoid', '=', 'vp.videoid')
            ->get();

    //   return response()->json($videoPlay);

        return view('max', [
            'videos'=>$videos ,
            'videoPlay'=>$videoPlay ,
            'vista'=>$vista , 
            'typeforYou'=>'Solo para ti'
        ],);
        

    }


    public function show($video_id)
    {

        $userId = 1;
        $videos = Video::find($video_id);//all() seleciona toda la tabla
        $videoExists = VideoPlay::where('userid', $userId)
            ->where('videoid', $video_id)
            ->exists();

        return view('play', ['videos' => $videos, 'videoExists' =>$videoExists]);//compact pasa los datos a la vista con el metodo view()

    }


    public function series()
    {

        $categoryName = 'series'; 
        $videos = Video::with('categories')->whereHas('categories', function($query) use ($categoryName) {
            $query->where('category_name', $categoryName);
        })->get();

        

        return view('max', ['videos' => $videos, 'vista' => 'serie','typeforYou' => 'Series para ti']);

    }

    public function movies()
    {

        $categoryName = 'movies'; 


        $videos = Video::with('categories')->whereHas('categories', function($query) use ($categoryName) {
            $query->where('category_name', $categoryName);
        })->get();

        

        return view('max', ['videos' => $videos, 'vista' => 'película', 'typeforYou' => 'Peliculas para ti']);

    }


    public function peliculas()
    {

        $videos = Video::all();

        $vista= 'peliculas';
        return view('max', compact('videos'))->with('vista', $vista);

    }


    public function hbo()
    {
        $vista='any';
        $categoryName = 'hbo'; 
        $videos = Video::selectRaw('max.videos.*, 
            CASE 
                WHEN type = 1 THEN "serie" 
                WHEN type = 2 THEN "pelicula" 
                ELSE "otro"
            END as tipo')
            ->join('max.video_category as vc', 'max.videos.videoid', '=', 'vc.videoid')
            ->join('max.type_category as tc', 'vc.categoryid', '=', 'tc.categoryid')
            ->with('categories')
            ->where('category_name', $categoryName)
            ->get();
      //  return response()->json($videos);

        return view('max', ['videos'=>$videos ,'vista'=>$vista , 'typeforYou'=>'HBO para ti'],);//compact('videos'))->with('vista', $vista);//compact pasa los datos a la vista con el metodo view()
        

    }


    public function  childAndFamily()
    {
        $vista='any';
        $categoryName = 'childandfamily'; 
        $videos = Video::selectRaw('max.videos.*, 
            CASE 
                WHEN type = 1 THEN "serie" 
                WHEN type = 2 THEN "pelicula" 
                ELSE "otro"
            END as tipo')
            ->join('max.video_category as vc', 'max.videos.videoid', '=', 'vc.videoid')
            ->join('max.type_category as tc', 'vc.categoryid', '=', 'tc.categoryid')
            ->with('categories')
            ->where('category_name', $categoryName)
            ->get();

        return view('max', ['videos'=>$videos ,'vista'=>$vista , 'typeforYou'=>'Para ti'],);
        

    }


    public function  stuff()
    {
        $vista = 'any';
        $videos = Video::selectRaw('*')
            ->join('max.mystuff as v', 'max.videos.videoid', '=', 'v.videoid')
            ->get();

        $videos_foryou = Video::selectRaw('max.videos.*, 
            CASE 
                WHEN type = 1 THEN "serie" 
                WHEN type = 2 THEN "pelicula" 
                ELSE "otro"
            END as tipo')
        ->get();

        return view('stuff', [
            'videos' => $videos,
            'vista' => $vista,
            'typeforYou' => 'Para ti',
            'videos_foryou' => $videos_foryou
        ]);

    }


    public function addStuff($videoId) {
        
        // Obtener el ID del usuario autenticado
        $userId = 1;//Auth::id();

        // Crear una nueva entrada en la tabla 'mystuff'
        $mystuff = MyStuff::firstOrCreate([
            'userid' => $userId,
            'videoid' => $videoId
        ]);

        $videos = $this->getFilteredVideos();

        return response()->json([
            'html' => view('_videoPoster', ['videos' => $videos])->render()
        ]);
    }

    public function removeStuff($videoId) {
        // Obtener el ID del usuario autenticado
        $userId = 1; // O usa Auth::id() si la autenticación está habilitada
    
        // Buscar y eliminar el registro correspondiente en la tabla 'mystuff'
        $deleted = MyStuff::where('userid', $userId)
                          ->where('videoid', $videoId)
                          ->delete();
    
        // Verificar si se eliminó el registro
        if ($deleted) {

            $videos = $this->getFilteredVideos();

            return response()->json([
                'html' => view('_videoPoster', ['videos' => $videos])->render()
            ]);
        } else {
            return response()->json(['message' => 'El video no estaba en tu lista'], 404);
        }
    }
    
    public function addContinueWatching($videoId) {
        $userId = 1;
    
        // Verificar si el video ya existe
        $videoExists = VideoPlay::where('userid', $userId)
            ->where('videoid', $videoId)
            ->exists();
    
        // Si no existe, crearlo
        if (!$videoExists) {
            VideoPlay::create([
                'userid' => $userId,
                'videoid' => $videoId,
                'time' => 70
            ]);
            $videoExists = true;  // Ahora existe
        }
    
     // Renderizar la vista y devolverla en una respuesta JSON
        return response()->json([
            'html' => view('_buttonsPlay', [
                'videoExists' => $videoExists
            ])->render()
        ]);

    
 }

}
