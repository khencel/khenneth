<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Journal;
use App\JournalConsultant;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Journal::with('attribute')->where('user_id', \Auth::user()->id)->get()->unique('type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $hex_focus = "";
        $journal = request()->validate([
            'type' => 'required',
            'question' => 'required',
            'details' => 'required',
        ]);

        if(isset(request()->hex_code)){
            $hex_focus = implode(" ",request()->hex_code);
        }

        if(\Gate::denies('manage-users')){
            return Journal::create([
                'user_id' => \Auth::user()->id,
                'type' => request()->type[0],
                'question' => request()->question,
                'details' => request()->details,
                'cast_type' => request()->cast_type,
                'original_hex_id' => request()->original_hex_id,
                'hex_focus' => $hex_focus,
                'transform_hex_id' => request()->transform_hex_id,
                'trigram_id' => request()->trigram_id,
                'date' => request()->date
            ]);
        }
        
        return JournalConsultant::create([
            'user_id' => request()->user_id[0],
            'schedule_user_id' => request()->user_id[1],
            'type' => request()->type[0],
            'question' => request()->question,
            'details' => request()->details,
            'comment' => request()->comment,
            'cast_type' => request()->cast_type,
            'original_hex_id' => request()->original_hex_id,
            'hex_focus' => $hex_focus,
            'transform_hex_id' => request()->transform_hex_id,
            'trigram_id' => request()->trigram_id,
            'date' => request()->date
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Journal::with(
            'hex_original.opening',
            'hex_original.nobleman',
            'hex_original.weather',
            'hex_original.luck',
            'hex_original.wealth',
            'hex_original.relationship',
            'hex_original.business',
            'hex_original.family',
            'hex_original.legal',
            'hex_original.examination',
            'hex_original.travel',
            'hex_original.health',
            'hex_original.properties',
            'hex_transform',
            'trigram'
            )->where('type',$id)->orderBy('id','desc')->get();  
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

    public function customerJournal($id,$schedule_id){
        return JournalConsultant::with('hex_transform','hex_original','attribute','trigram')
                                        ->where('user_id',$id)
                                        ->where('schedule_user_id',$schedule_id)
                                        ->get();
    }

    public function user_consultant_diary(){
        return JournalConsultant::with('hex_transform','hex_original','attribute','trigram')->where('user_id',\Auth::user()->id)->get();
    }
}
