<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $timetables = \App\Timetable::get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $request->validate([
            // for($i = 1; $i <=8; $i++) {
            //     'mon_'.$i.'_subject' => 'required',
            // }
            // for ($i = 1; $i <=8; $i++) {
            //     'tue_'.$i.'_subject' => 'required',
            // }
            // for ($i = 1; $i <=8; $i++) {
            //     'wed_'.$i.'_subject' => 'required',
            // }
            // for ($i = 1; $i <=8; $i++) {
            //     'thr_'.$i.'_subject' => 'required',
            // }
            // for ($i = 1; $i <=8; $i++) {
            //     'fri_'.$i.'_subject' => 'required',
            // }
            // for ($i = 1; $i <=8; $i++) {
            //     'sat_'.$i.'_subject' => 'required',
            // }
            // for ($i = 1; $i <=8; $i++) {
            //     'sun_'.$i.'_subject' => 'required',
            // }
        ]);
        
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
}
