@extends('layouts.app')

@section('content')
<div text_align="right">
    <a href="{{ route('infos.index') }}" class="btn btn-default">조원목록</a>
</div>
<br />

<form method="post" action="{{ route('infos.update', $info->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="col-md-4 text-right">개요</label>
        <div class="col-md-8">
        <textarea name="outline" class="form-control input-lg" > {{ $info->outline}} </textarea>
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">목표</label>
            <textarea name="objective" rows ="10" class="form-control input-lg">{{ $info->objective }}
            </textarea>
    </div>
    <br />
    <br />
    <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" /> 
    </div>
</form>
@endsection