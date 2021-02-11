<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HasFetchAllRenderCapabilities;
use App\Http\Requests\ActorRequest;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
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
        $this->setGetAllBuilder(Actor::query());
        $this->setGetAllOrdering('name', 'asc');
        $this->parseRequestConditions($request);
        return new ResourceCollection($this->getAll()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ActorRequest $request
     * @return JsonResource
     */
    public function store(ActorRequest $request)
    {
        $actor = DB::transaction(function () use ($request) {
            return Actor::create($request->validated());
        });

        return new JsonResource($actor);
    }

    /**
     * Display the specified resource.
     *
     * @param  Actor  $actor
     * @return JsonResource
     */
    public function show(Actor $actor)
    {
        return new JsonResource($actor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Actor  $actor
     * @param  ActorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Actor $actor, ActorRequest $request)
    {
        DB::transaction(function () use ($request, $actor) {
            $actor->fill($request->validated());
            $actor->save();
        });

        return new JsonResource($actor->fresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $response = DB::transaction(function () use ($actor) {
            $actor->delete();
        });

        return response()->noContent(
            $response ? 204 : 500
        );
    }

    public function appearances(Actor $actor)
    {
        $actor->load(['roles', 'roles.movies']);
        return new JsonResource($actor->toArray());
    }
}
