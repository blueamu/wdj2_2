@extends('layouts.app')

@section('content')
<div text_align="right">
    <a href="{{ route('places.create') }}">Add</a>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif 
    <header class="jumbotron my-4">
        <h1 class="display-3">WDJ-2 Welcome!</h1>
        <p class="lead">어 서 오 세 요</p>
        <a href="{{ route('places.create') }}" class="btn btn-primary btn-lg">JOIN</a>
    </header>
    <div class="row text-center flex-row m-xl-n2">
    @foreach($places as $row)
        <div class="col-lg-3 col-md-6 mb-4" >
            <div class="card h-100">
                <img class="card-img-top" src="/images/places/{{$row->place_picture}}" alt="이미지 없음">
                <div class="card-body">
                <h4 class="card-title">{{$row->name}}</h4>
                <p class="card-text">{{$row->content}}</p>
                </div>
                <div class="card-footer">
                    @if (Auth::check())
                        @if (Auth::user()->id<=6)  
                            
                            <form method="post" action="{{ route('places.destroy', $row->id) }}" class="display inline-block">
                                <a href="{{ route('places.edit', $row->id) }}" id="{{Auth::user()->id}}" class="btn btn-warning">수정하기</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">조원삭제</button>
                            </form>
                        @else

                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection