@extends('layouts.app')
@section('script')
    <script>
        function reviewUploadImg(fileObj)
        {
            var filePath = fileObj.value;
            var fileName = filePath.substring(filePath.lastIndexOf("\\")+1);
            document.getElementById('url').value="images/places"+fileName;
        }

    </script>
@endsection

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
            <input type="text" name="new_title" id="new_title" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">체험지 소개</label>
        <div class="col-md-8">
            <input type="text" name="new_body" id="new_body" row="10" class="form-control input-lg" />
        </div>
    </div>
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">체험지 사진</label>
        <div class="col-md-8">
            <input type="file" name="new_img" id="new_img" onchange="reviewUploadImg(this);" multiple="multiple" />
        </div>    
    </div>
    <br />
    <br />
    <input type="hidden" name="url" id="url">    
    <div class="form-group text-center">
            <!-- <input type="submit" name="add_place" id="add_place" class="btn btn-primary input-lg"/>  -->

            <button id="add_place" type="submit">추가</button>
    </div>
</form>
@endsection
