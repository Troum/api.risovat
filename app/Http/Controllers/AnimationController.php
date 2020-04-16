<?php

namespace App\Http\Controllers;

use App\Models\Animation;
use App\Traits\Parsing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class AnimationController extends Controller
{
    use Parsing;
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse|Response
     */
    public function index()
    {
        return response()->json(['animation' => $this->convert(Animation::all())], Response::HTTP_OK);
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
     * @param  Animation  $animation
     * @return Response
     */
    public function show(Animation $animation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Animation  $animation
     * @return Response
     */
    public function edit(Animation $animation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Animation  $animation
     * @return Response
     */
    public function update(Request $request, Animation $animation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Animation  $animation
     * @return Response
     */
    public function destroy(Animation $animation)
    {
        //
    }
}
