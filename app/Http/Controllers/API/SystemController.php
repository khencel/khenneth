<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SystemContent;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
        $data = request()->validate([
            'content_name' => 'required',
            'content' => 'required'
        ]);

        SystemContent::where('content_name','About Us')->update($data);
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

    public function aboutUs(){
        return SystemContent::where('content_name','About Us')->first();
    }

    public function footerContent(){
        return SystemContent::where('content_name','footer')->first();
    }

    public function footer(){
        $data = request()->validate([
            'content_name' => 'required',
            'content_footer' => 'required'
        ]);

        SystemContent::where('content_name','footer')->update(
            [
                'content_name' => request()->content_name,
                'content' => request()->content_footer,
            ]
        );
    }
}
