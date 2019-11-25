<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceController extends Controller
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
        return view('infos.index', compact('infos', 'places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
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
            'place_picture' => 'required|image|max:2048',
            'title' =>  'required',
            'body' => 'required',
        ]);

        if($request->hasFile('place_picture')){

        $img = $request->file('place_picture');

        $new_name = rand() . '_' . $request->title . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('images/places'), $new_name);
        $form_data = array(
            'place_picture' => $new_name,
            'title' => $request->title,
            'body' => $request->body
        );

        \App\Place::create($form_data);

        }

        return redirect('infos')->with('success', 'Data Added successfully');
        // 파일저장성공
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
        $place = \App\Place::findorFail($id);

        return view('places.edit', compact('place'));
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
        $image_name = $request->hidden_img;
        $img = $request->file('place_picture');
        if($img != '')
        {
            $request->validate([
                'title' =>  'required',
                'body' => 'required',
                'place_picture' => 'required|image|max:2048',
            ]);

            $img_name = rand() . '_' . $request->title . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/places'), $img_name);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = \App\Place::findorFail($id);
        $place->delete();
        return redirect('infos')->with('success', 'Data is successfully deleted');
    }
}
