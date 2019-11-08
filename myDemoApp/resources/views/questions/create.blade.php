@extends('layouts.app')

@section('content')
    <div class="container">
        <hr/>
        
        <form action="{{ route('questions.store') }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                <label for="question">질문</label>
                <input type="text" name="question" id="question"  value="{{ old('question') }}"
                class="form-control">
                {!! $errors->first('question', '<span class="form-error">:message</span>') !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    저장하기
                </button>
            </div>
        </form>
    </div>