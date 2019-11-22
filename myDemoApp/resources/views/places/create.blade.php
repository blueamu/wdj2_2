@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div text_align="right">
    <a href="{{ route('infos.index') }}" class="btn btn-default">BACK</a>

<form method="post" action="{{ route('places.store') }}" enctype="multipart/form-data">
    
    @csrf
    <div class="form-group">
        <label class="col-md-4 text-right">체험지</label>
        <div class="col-md-8">
            <input type="text" name="title" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">체험지 소개</label>
            <textarea name="body" rows ="10" class="form-control input-lg">
            </textarea> 
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">체험지 사진</label>
        <div class="col-md-8">
            <input type="file" name="place_picture" />
        </div>    
    </div>
    <br />
    <br />
    <br />
    <div class="form-group text-center">
            <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" /> 
    </div>
</form>

@endsection