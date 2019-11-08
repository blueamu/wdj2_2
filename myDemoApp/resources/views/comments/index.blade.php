@extends('layouts.app')

@section('content')
<div class='container'>
    <h1>포럼 글 목록</h1>
    <hr/>
    <ul>
        @forelse($comments as $comment)
        <li>
            {{$comment->comment}}
        </li>
        @empty
        <p>글이 없습니다</p>
        @endforelse
    </ul>
</div>
@stop