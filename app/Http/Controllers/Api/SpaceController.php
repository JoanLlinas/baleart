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
    public function index(Request $request)
    {
        $query = Space::query();
        if ($request->has('illa')){
            $query->whereHas('address.municipality.island', function($query) use ($request){
                $query->where('name', 'like', '%' . $request->illa . '%');
            });
        }
        $spaces = $query->get();
        
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
    /*public function show(Space $space)
    {   
        $space->load(['user', 'modalities', 'comments', 'comments.images']);
        
        return new SpaceResource($space);
    }*/

    public function show($value)
    {
        $space = is_numeric($value)
        ? Space::with(['user', 'modalities', 'comments', 'comments.images'])->findOrFail($value) // Busca por ID
        : Space::with(['user', 'modalities', 'comments', 'comments.images'])->where('regNumber', $value)->firstOrFail(); // Busca por regNumber

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
