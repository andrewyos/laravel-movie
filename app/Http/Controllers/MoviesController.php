<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=80e7d376edb191a308ae274d9fcc0a01&language=en-US&page=1')
        ->json()['results'];

        $genreArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=80e7d376edb191a308ae274d9fcc0a01&language=en-US')
        ->json()['genres'];

        $genres = collect($genreArray)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']];
        });
            #End Of Popular

            #Start Of Now Playing
        $nowPlaying = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=80e7d376edb191a308ae274d9fcc0a01&language=en-US&page=1')
        ->json()['results'];


        return view('index', [
            'popularMovies' => $popularMovies,
                   'genres' => $genres,
               'nowPlaying' => $nowPlaying
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $popular = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=80e7d376edb191a308ae274d9fcc0a01&language=en-US&append_to_response=credits,videos,images&include_image_language=en&')
        ->json();

        return view('movie/show', [
            'movie' => $popular,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
