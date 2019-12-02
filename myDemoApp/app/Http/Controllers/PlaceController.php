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
        if($request->hasFile('place_img')){

            $img = $request->file('place_img');
    
            $new_name = rand() . '_' . $request->place_title . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images'), $new_name);
        }
        return response()->json($new_name);
        // return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $place_datas = $request->all();

        // $form_data = array(
        //     'place_picture' => $place_datas['place_img'],
        //     'title' => $place_datas['place_title'],
        //     'body' => $place_datas['place_body'],
        // );

        // $request->validate([
        //     'place_picture' => 'required|image|max:2048',
        //     'title' =>  'required',
        //     'body' => 'required',
        // ]);
        
        if($place_datas->hasFile('place_picture')){

        $img = $request->file('place_picture');

        $new_name = rand() . '_' . $place_datas->title . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('images/places'), $new_name);
        $form_data = array(
            'place_picture' => $new_name,
            'title' => $place_datas['place_title'],
            'body' => $place_datas['place_body'],
            // 'title' => $request->title,
            // 'body' => $request->body
        );

        \App\Place::create($form_data);

        }

        $form_data->validate([
            'place_picture' => 'required|image|max:2048',
            'title' =>  'required',
            'body' => 'required',
        ]);
        // return redirect('infos')->with('success', 'Data Added successfully');
        // 파일저장성공

        return response()->json($form_data);
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

    public function upload(Request $request)
    {
        if($request->hasFile('place_img')){

            $img = $request->file('place_img');
    
            $new_name = rand() . '_' . $request->place_title . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images'), $new_name);
        }
        return response()->json($new_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datas = $request->all();
        $id = $datas['place_id'];
        $form_data = array(
            'place_picture'=>$datas['place_img'],
            'title' => $datas['place_title'],
            'body' => $datas['place_body'],
        );

        \App\Place::whereId($id)
            ->update($form_data);

        // return response()->json(['id'=>$id, $form_data]);
        return response()->json($form_data);

        // $image_name = $request->hidden_img;
        // $img = $request->file('place_picture');
        // if($img != '')
        // {
        //     $request->validate([
        //         'title' =>  'required',
        //         'body' => 'required',
        //         'place_picture' => 'required|image|max:2048',
        //     ]);

        //     $img_name = rand() . '_' . $request->title . '.' . $img->getClientOriginalExtension();
        //     $img->move(public_path('images/places'), $img_name);
        // }
        // else
        // {
        //     $request->validate([
        //         'title' =>  'required',
        //         'body' => 'required',
        //     ]);
        // }

        // $form_data = array(
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'place_picture' => $img_name 
        // );

        // \App\Place::whereId($id)->update($form_data);

        // return redirect('infos')->with('success', 'Data is successfully updated');

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
