@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <table>
                <tr>
                    <th>개요</th>
                    <th>목표</th>
                    <th>시간표</th>
                    <th>체험지</th>
                </tr>
            </table>
        </div>
        <hr/>
        <h2>개요</h2>
        @forelse($infos as $info)
            <p> {{ $info->outline }} </p>
        @empty
        <p>No text</p>
        @endforelse
        <br />
        <br />
        <h2>목표</h2>
        @forelse($infos as $info)
            <p> {{ $info->objective }} </p>
        @empty
        <p>No text</p>
        <a href="{{ route('infos.create') }}" class="btn btn-info">생성</a>
        @endforelse
        <div>
        @if (Auth::check())
            @if (Auth::user()->id<=6)  
                @foreach ($infos as $info)
                    <form method="post" action="{{ route('infos.destroy', $info->id) }}" class="display inline-block">
                    <a href="{{ route('infos.edit', $info->id) }}" class="btn btn-warning">수정</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">삭제</button>
                    </form>
                @endforeach
            @endif
        @endif
        </div>
        <h2>시간표</h2>
        <br />
        <br />
        <h2>체험지</h2>
        <br />
        <br />
        @if (Auth::check())
            @if (Auth::user()->id<=6)  
            <a href="{{ route('places.create') }}" class="btn btn-info">생성</a>
            @endif
        @endif
        <div class="row">
        @foreach($places as $row)
            <div class="col-lg-3 col-md-3 col-sm-3 mb-3" >
                <div class="card h-100">
                    <img class="card-img-top" src="/images/places/{{$row->place_picture}}" alt="이미지 없음">
                    <div class="card-body">
                    <h4 class="card-title">{{$row->title}}</h4>
                    <p class="card-text">{{$row->body}}</p>
                    </div>
                    <div class="card-footer">
                        @if (Auth::check())
                            @if (Auth::user()->id<=6)  
                                <form method="post" action="{{ route('places.destroy', $row->id) }}" class="display inline-block">
                                    <a href="{{ route('places.edit', $row->id) }}" id="{{Auth::user()->id}}" class="btn btn-warning">수정</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">삭제</button>
                                </form>
                            @else

                            @endif
                        @endif
                    </div>
                </div>
                
            </div>
        @endforeach
        </div>
    </div>
@stop

