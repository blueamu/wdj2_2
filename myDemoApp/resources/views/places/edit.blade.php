@extends('layouts.app')

@section('content')
<div text_align="right">
    <a href="{{ route('infos.index') }}" class="btn btn-default">BACK</a>
</div>
<br />

<form method="post" action="{{ route('places.update', $place->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="col-md-4 text-right">체험지</label>
        <div class="col-md-8">
            <input type="text" name="title" value="{{ $place->title }}" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">체험지 소개</label>
            <textarea name="body" rows ="10" class="form-control input-lg">{{ $place->body }}
            </textarea>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">체험지 사진</label>
        <div class="col-md-8">
            <input type="file" name="place_picture" />
            <img src="{{ URL::to('/') }}/images/places/{{ $place->place_picture }}" class="img-thumbnail" width="100" />
            
        </div>    
    </div>
    <br />
    <br />
    <br />
    <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" /> 
    </div>
</form>
@endsection