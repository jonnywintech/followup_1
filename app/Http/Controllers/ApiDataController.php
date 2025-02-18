<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $file_exist =  $file_exist = Storage::disk('public')->exists('data.json');

        if(!$file_exist){
            return response()->json([]);
        }

        $data = $file_exist = Storage::disk('public')->get('data.json');

        return response()->json($data);
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
