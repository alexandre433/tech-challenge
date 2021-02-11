<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HasFetchAllRenderCapabilities;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    use HasFetchAllRenderCapabilities;

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        $this->setGetAllBuilder(Movie::query());
        $this->setGetAllOrdering('name', 'asc');
        $this->parseRequestConditions($request);
        return new ResourceCollection($this->getAll()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MovieRequest  $request
     * @return JsonResource
     */
    public function store(MovieRequest $request)
    {
        $movie = DB::transaction(function () use ($request) {
            return Movie::create($request->validated());
        });

        return new JsonResource($movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  Movie  $movie
     * @return JsonResource
     */
    public function show(Movie $movie)
    {
        return new JsonResource($movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Movie  $movie
     * @param  MovieRequest  $request
     * @return JsonResource
     */
    public function update(Movie $movie, MovieRequest $request)
    {
        DB::transaction(function () use ($request, $movie) {
            $movie->fill($request->validated());
            $movie->save();
        });

        return new JsonResource($movie->fresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        DB::transaction(function () use ($movie) {
            $movie->delete();
        });

        return response()->noContent();
    }
}
