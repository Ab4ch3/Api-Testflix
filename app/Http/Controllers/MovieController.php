<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use Illuminate\Http\Request;
use App\Models\Movie;
use Iluminate\Support\Facades\Storage;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return new MovieCollection($movies);
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
    public function store(StoreMovieRequest $request)
    {
        $newMovie = new Movie();

        //Store the file in storage\app\public folder
        $file = $request->file('path');
        $file_Name = time() . '_' . $file->getClientOriginalName();
        $file_Path = $file->storeAs('uploads', $file_Name, 'public');


        // Store file information in the database
        $newMovie->user_id = $request->user_id;
        $newMovie->title = $request->title;
        $newMovie->path = '/storage/' . $file_Path;
        $newMovie->save();


        // $newMovie->path = $file_Path;


        return response()->json(['success' => 'Movie Created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {

        return new MovieResource($movie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }

    public function storeFile(StoreMovieRequest $request)
    {
    }
}
