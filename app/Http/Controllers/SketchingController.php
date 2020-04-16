<?php

namespace App\Http\Controllers;

use App\Models\Sketching;
use App\Traits\Parsing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class SketchingController extends Controller
{
    use Parsing;
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index()
    {
        return response()->json(['sketching' => $this->convert(Sketching::all())], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Sketching  $sketching
     * @return Response
     */
    public function show(Sketching $sketching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Sketching  $sketching
     * @return Response
     */
    public function edit(Sketching $sketching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Sketching  $sketching
     * @return Response
     */
    public function update(Request $request, Sketching $sketching)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Sketching  $sketching
     * @return Response
     */
    public function destroy(Sketching $sketching)
    {
        //
    }
}
