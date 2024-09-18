<?php

namespace App\Http\Controllers;
use App\Models\Video; 
use App\Models\MyStuff;
use App\Models\VideoPlay;
use Illuminate\Http\Request;
use Mockery\Undefined;

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

    protected function getVideosPlayed()
    {
        $userId =1;

        return Video::selectRaw('*')
        ->join('max.video_play as vp', 'max.videos.videoid', '=', 'vp.videoid')
        ->get();
    }

    protected function getMysStuff()
    {
        $userId =1; 

        return Video::selectRaw('*')
            ->join('max.mystuff as v', 'max.videos.videoid', '=', 'v.videoid')
            ->where('v.userid', $userId)
            ->get();
    }

    protected function getMysStuffbyId($videoId)
    {
        $userId = 1;

        return Video::selectRaw('max.videos.*,
        CASE 
            WHEN m.userid IS NOT NULL THEN "stuff" 
            ELSE "no_stuff"
        END as status
        ')
        ->leftJoin('max.mystuff as m', 'max.videos.videoid', '=', 'm.videoid')
        ->where('max.videos.videoid', $videoId)
            ->where(function ($query) use ($userId) {
                $query->where('m.userid', $userId)
                    ->orWhereNull('m.userid');
            })
            ->get();
    }
    

    protected function updateView() {

        $videos = $this->getFilteredVideos();
        $videos_mystuff = $this->getMysStuff();



        return response()->json([
            'html_poster' => view('partial._videoPoster', ['videos' => $videos])->render(),
            'html_stuff' => view('partial._videoListStuff', ['videos' => $videos_mystuff])->render()
        ]);

    }

    public function index()
    {
        $vista='any';
        $userId =1;
        $videos = $this->getFilteredVideos();
        $nameView = 'home';

        $videoPlay= Video::selectRaw('*')
            ->join('max.video_play as vp', 'max.videos.videoid', '=', 'vp.videoid')
            ->get();


        return view('max', [
            'videos'=>$videos ,
            'videoPlay'=>$videoPlay ,
            'vista'=>$vista , 
            'typeforYou'=>'Solo para ti',
            'nameView' => $nameView
        ],);
        

    }

    public function viewPlay($video_id)
    {

        $userId = 1;
        $videos = $this->getMysStuffbyId($video_id);
        $videoExists = VideoPlay::where('userid', $userId)
            ->where('videoid', $video_id)
            ->get();


       // return response()->json([$videoExists]);

        if(isset($videoExists[0])) {
            $videoExists = $videoExists[0];
        } else {
            $videoExists = false;
        }


        return view('play', ['videos' => $videos[0], 'videoExists' =>$videoExists, 'nameView' => 'play']);
        

    }


    public function series()
    {

        $categoryName = 'series'; 
        $videos = Video::with('categories')->whereHas('categories', function($query) use ($categoryName) {
            $query->where('category_name', $categoryName);
        })->get();

        

        return view('max', ['videos' => $videos, 'vista' => 'serie','typeforYou' => 'Series para ti', 'nameView' => 'series']);

    }

    public function movies()
    {

        $categoryName = 'movies'; 


        $videos = Video::with('categories')->whereHas('categories', function($query) use ($categoryName) {
            $query->where('category_name', $categoryName);
        })->get();

        

        return view('max', ['videos' => $videos, 'vista' => 'película', 'typeforYou' => 'Peliculas para ti', 'nameView' => 'movies']);

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

        return view('max', ['videos'=>$videos ,'vista'=>$vista , 'typeforYou'=>'HBO para ti', 'nameView' => 'hbo'],);
        

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

        return view('max', ['videos'=>$videos ,'vista'=>$vista , 'typeforYou'=>'Para ti', 'nameView' => 'childandfamily'],);
        

    }


    public function  stuff()
    {
        $vista = 'any';
        $videos = Video::selectRaw('*')
            ->join('max.mystuff as v', 'max.videos.videoid', '=', 'v.videoid')
            ->get();

        $videos_foryou = $this->getFilteredVideos();
        $nameView = 'stuff';

        return view('stuff', [
            'videos' => $videos,
            'vista' => $vista,
            'typeforYou' => 'Para ti',
            'videos_foryou' => $videos_foryou,
            'nameView' => $nameView
        ]);

    }

    public function addStuff($videoId) {
        
        
        $userId = 1;
        $mystuff = MyStuff::firstOrCreate([
            'userid' => $userId,
            'videoid' => $videoId
        ]);


        return $this->updateView();
    }

    public function removeStuff($videoId) {
       
        $userId = 1; 
    
        $deleted = MyStuff::where('userid', $userId)
                          ->where('videoid', $videoId)
                          ->delete();


        return $this->updateView();


    }

    public function removeStuffFromList($videoId) {
        $userId = 1; 
    
        $deleted = MyStuff::where('userid', $userId)
                          ->where('videoid', $videoId)
                          ->delete();

        if ($deleted) {

            return $this->updateView();

        } else {
            return response()->json(['message' => 'El video no estaba en tu lista'], 404);
        }   
    }
    
    public function addPlayvideo($videoId) {
        $userId = 1;
    

        $videoExists = VideoPlay::where('userid', $userId)
            ->where('videoid', $videoId)
            ->exists();

        if (!$videoExists) {
            VideoPlay::create([
                'userid' => $userId,
                'videoid' => $videoId,
                'time' => mt_rand(0, 100)
            ]);
        }

        $videoExists = VideoPlay::where('userid', $userId)
        ->where('videoid', $videoId)
        ->get();

        return response()->json([
            'html' => view('partial._buttonsPlay', [
                'videoExists' => $videoExists[0]
            ])->render()
        ]);

    
    }

    public function removePlayVideo($videoId) {

        $userId = 1; 
        $deleted = VideoPlay::where('userid', $userId)
                        ->where('videoid', $videoId)
                        ->delete();


        if ($deleted) {

            $videoPlay = $this->getVideosPlayed();

        // return response()->json($videoPlay);


            return response()->json([
                'html' => view('partial._videoPlayed', ['videoPlay' => $videoPlay])->render()
            ]);
        } else {
            return response()->json(['message' => 'El video no estaba en tu lista'], 404);
        }
    }

    public function playedPlayvideo($videoId)
    {


        $userId = 1;
        VideoPlay::where('userid', $userId)
            ->where('videoid', $videoId)
            ->update(['time' => mt_rand(0, 100)]);

        $videoPlay = VideoPlay::where('userid', $userId)
            ->where('videoid', $videoId)
            ->first();


        return response()->json([
            'html' => view('partial._buttonsPlay', ['videoExists' => $videoPlay])->render()
        ]);
    }   
    
    public function toggleStuff($videoId) {
        
        $userId = 1;
        $deleted = MyStuff::where('userid', $userId)
                          ->where('videoid', $videoId)
                          ->delete();   


        if (!$deleted) {


            $videoExists = MyStuff::where('userid', $userId)
                ->where('videoid', $videoId)
                ->exists();

            if (!$videoExists) {
                MyStuff::create([
                    'userid' => $userId,
                    'videoid' => $videoId
                ]);
            }
            
        }

        $videos = $this->getMysStuffbyId($videoId);
        
        return response()->json([
             'html_buttonToggleStuff' => view('partial._buttonToggleStuff', ['videos' => $videos[0]])->render()
        ]);



        
    }   

}
