<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nature;
use App\Element;
use App\People;
use App\BodyPart;
use App\Animal;
use App\Sickness;
use App\Color;
use App\Deity;

class NatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Nature::all()->pluck('name');
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
        //
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

    public function property(){
        $element = Element::all()->pluck('name');
        $people = People::all()->pluck('name');
        $bodyPart = BodyPart::all()->pluck('name');
        $animal = Animal::all()->pluck('name');
        $sickness = Sickness::all()->pluck('name');
        $color = Color::all()->pluck('name');
        $deity = Deity::all()->pluck('name');
        
        
        return response()->json([$element,$people,$bodyPart,$animal,$sickness,$color,$deity]);
    }
}
