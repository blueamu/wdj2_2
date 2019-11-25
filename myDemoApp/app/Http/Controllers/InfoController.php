<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = \App\Info::get();
        $places = \App\Place::latest()->paginate(10);
        $timetables = \App\Timetable::get();
        return view('infos.index', compact('infos', 'places', 'timetables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'outline' => 'required',
            'objective' => 'required',
        ]);

        $form_data = array(
            'outline' => $request->outline,
            'objective' => $request->objective
        );

        \App\Info::create($form_data);

        return redirect('infos')->with('success', 'Data Added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = \App\Info::findorFail($id); //  id를 검색 그러나 결과가 발견되지 않으면 예외 발생
        
        return view('infos.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = \App\Info::findorFail($id);

        return view('infos.edit', compact('info'));
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
            'outline' =>  'required',
            'objective' => 'required',
        ]);
        
        $form_data = array(
            'outline' => $request->outline,
            'objective' => $request->objective,
        );

        \App\Info::whereId($id)->update($form_data);

        return redirect('infos')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Info $info)
    {
        //$info = Info::where('outline', $info->outline)->delete();
        //$info = Info::where('objective', $info->objective)->delete();
        $info->delete();

        return redirect('infos')->with('success', 'Data is successfully deleted');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function img_create()
    {
        /* return view('places.create'); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function img_store(Request $request)
    {
        /* 
        $request->validate([
            'title' =>  'required',
            'body' => 'required',
            'place_picture' => 'required|image|max:2048',
        ]);

        if($request->hasFile('place_picture')){

        $img = $request->file('place_picture');

        $new_name = rand() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('images/places'), $new_name);
        $form_data = array(
            'title' => $request->title,
            'body' => $request->body,
            'place_picture' => $new_name 
        );

        \App\Place::create($form_data);

        }

        return redirect('infos')->with('success', 'Data Added successfully');
        // 파일저장성공
 */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function img_update(Request $request, $id)
    {
        /* 
        $image_name = $request->hidden_img;
        $img = $request->file('place_picture');
        if($img != '')
        {
            $request->validate([
                'title' =>  'required',
                'body' => 'required',
                'place_picture' => 'required|image|max:2048',
            ]);

            $img_name = rand() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images'), $img_name);
        }
        else
        {
            $request->validate([
                'title' =>  'required',
                'body' => 'required',
            ]);
        }

        $form_data = array(
            'title' => $request->title,
            'body' => $request->body,
            'place_picture' => $img_name 
        );

        \App\Place::whereId($id)->update($form_data);

        return redirect('infos')->with('success', 'Data is successfully updated');
 */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function img_destroy(\App\Place $place)
    {
        /* 
        $place->delete();
        return redirect('infos')->with('success', 'Data is successfully deleted');
         */
    }
}
