@extends('layouts.app')

@section('content')

<div class="jumbotron text-center">
    <input type="hidden" name="place_id" id="place_id" value="{{ $place -> id }}">    
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">    
    <div>
        <a href = "{{ route('infos.index') }}" class="btn btn-default">BACK</a>
    </div>
    <br />
    <div class="imgdiv">
        <img id ="place_img" src="{{ URL::to('/') }}/images/places/{{ $place -> place_picture }}" class="img-thumbnail" />
        <!-- <img class="img-thumbnail" id="img" src="/images/places/{{$place->place_picture}}" alt="이미지 없음"> -->
    </div>
    <div class="namediv">
        <h3 id="place_title">{{ $place -> title }}</h3>
    </div>
    <div class="contentdiv">
        <p id="place_body">{{ $place -> body }}</p>
    </div>
    <div>
    @if (Auth::check())
        @if (Auth::user()->id<=6)
            <button class="btn btn-warning" id="p_update_btn">수정</button>
            <button class="btn btn-danger" id="p_delete_btn">삭제</button>
        @else
        @endif
    @endif
    </div>
</div>
@endsection
<script src="/js/info_update.js"></script>