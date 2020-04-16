<?php

namespace App\Http\Controllers;

use App\Models\Modeling;
use App\Traits\Parsing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ModelingController extends Controller
{
    use Parsing;
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index()
    {
        return response()->json(['modeling' => $this->convert(Modeling::all())], Response::HTTP_OK);
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
     * @param  Modeling  $modeling
     * @return Response
     */
    public function show(Modeling $modeling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Modeling  $modeling
     * @return Response
     */
    public function edit(Modeling $modeling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Modeling  $modeling
     * @return Response
     */
    public function update(Request $request, Modeling $modeling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Modeling  $modeling
     * @return Response
     */
    public function destroy(Modeling $modeling)
    {
        //
    }
}
