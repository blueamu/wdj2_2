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
    
<form method="post" action="{{ route('infos.store') }}" enctype="multipart/form-data">
    
    @csrf
    <div class="form-group">
        <label class="col-md-4 text-right">개요</label>
        <div class="col-md-8">
            <textarea name="outline" rows ="10" class="form-control input-lg" > </textarea>
        </div>
    </div>
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">목표</label>
            <textarea name="objective" rows ="10" class="form-control input-lg">
            </textarea> 
    </div>
    <br />
    <br />
    <div class="form-group text-center">
            <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" /> 
    </div>
</form>

@endsection