<?php

namespace App\Http\Controllers\Api;

use App\Models\Space;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SpaceResource;


class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spaces = Space::with(["user", "modalities", "comments", "comments.images"])->paginate(1);
        return (SpaceResource::collection($spaces));
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
    public function show($id)
    {   
        $space = Space::with(['user', 'modalities', 'comments', 'comments.images'])->find($id);
        
        return new SpaceResource($space);
    }

    public function show($id)
    {   
        $space = Space::with(['user', 'modalities', 'comments', 'comments.images'])->find($id);
        
        return new SpaceResource($space);
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
