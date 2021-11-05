<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trigram;


class TrigramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trigram::latest()->paginate(10);
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
        $trigram = Trigram::with('natureTrigram','triPeople','triBodyPart','triAnimal','triSickness','triColor','triDeity')->find($id);
        return $trigram;
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

        $trigram = Trigram::find($id);

        request()->validate([
            'element' => 'required',
            'number' => 'required',
            'nature' => 'required',
            'people' => 'required',
            'bodyPart'=>'required',
            'animal'=>'required',
            'sickness'=>'required',
            'shape' => 'required',
            'color' => 'required',
            'deity' => 'required',
            'door' => 'required',
            'star' => 'required',
            'direction' => 'required',
        ]);

       

        $trigram->update([
            'element' => request()->element,
            'number' => request()->number,
            'shape' => request()->shape,
            'door' => request()->door,
            'star' => request()->star,
            'direction' => request()->direction
        ]);
        $trigram->natures()->sync(request()->nature);
        $trigram->people()->sync(request()->people);
        $trigram->animals()->sync(request()->animal);
        $trigram->bodyParts()->sync(request()->bodyPart);
        $trigram->sickness()->sync(request()->sickness);
        $trigram->color()->sync(request()->color);
        $trigram->deity()->sync(request()->deity);
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

    public function castTrigram(){
        $trigram = Trigram::all()->random(1)->first();
        $tri = Trigram::with('natureTrigram','triPeople','triBodyPart','triAnimal','triSickness','triColor','triDeity')->where('id',$trigram->id)->first();
        $user = \Auth::user()->is_subscriber;
        
        return response()->json([
            'tri' => $tri,
            'user' => $user,
        ]);
    }
}
