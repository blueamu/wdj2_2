@extends('layouts.app')

@section('content')
    <div class="container">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
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
            <p id="info_outline"> {{ $info->outline }} </p>
        @empty
        <p>No text</p>
        @endforelse
        <br />
        <br />
        <h2>목표</h2>
        @forelse($infos as $info)
            <p id="info_objective"> {{ $info->objective }} </p>
        @empty
        <p>No text</p>
        <br />
        @if (Auth::check())
            @if (Auth::user()->id<=6)
                <a href="{{ route('infos.create') }}" class="btn btn-info">생성</a>
            @endif
        @endif
        @endforelse
        <div>
        @if (Auth::check())
            @if (Auth::user()->id<=6)  
                @foreach ($infos as $info)
                    
                    <button class="btn btn-warning" id="info_update_btn">ajax 수정</button>
                    <form method="post" action="{{ route('infos.destroy', $info->id) }}" class="display inline-block">
                    <a href="{{ route('infos.edit', $info->id) }}" class="btn btn-warning">수정</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">삭제</button>
                    </form>
                @endforeach
                <input type="hidden" name="info_id" id="info_id" value="{{ $info['id'] }}">
            @endif
        @endif
        <br />
        <br />
        </div>
        <!-- <h2>시간표</h2>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>월</th>
                <th>화</th>
                <th>수</th>
                <th>목</th>
                <th>금</th>
                <th>토</th>
                <th>일</th>
            </tr>
            <tr>
                <td>1교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==1)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>2교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==2)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>3교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==3)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>4교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==4)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>5교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==5)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>6교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==6)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>7교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==7)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td>8교시</td>
                @foreach ($timetables as $row)
                    @if ($row->time==8)
                        <td>{{ $row->subject }}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
        </table> -->
        <br />
        <br />
        <h2>체험지</h2>
        <br />
        <br />
        @if (Auth::check())
            @if (Auth::user()->id<=6)
            <button class="btn btn-info" id="place_create_btn">ajax 생성</button>
            <a href="{{ route('places.create') }}" class="btn btn-info">생성</a>
            @endif
        @endif
        <div id="create_place" style="display:none;">
            <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
                <label for="place">제목</label>
                <input type="text" name="new_title" id="new_title" class="form-control">
                <label for="place">내용</label>
                <input type="text" name="new_body" id="new_body" class="form-control">
                <br />
                <label for="place">사진</label>
                <br />
                <input type="file" name="new_img" id="new_image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="p_store_btn">저장하기</button>
            </div>
        </div>
        <br />
        <br />
        <div class="row">
            <div id="add_card" class="col-xs-6 col-sm-3" style="display: none;">
                <div class="card h-100">
                    <img class="card-img-top" src="" alt="이미지 없음">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        @if (Auth::check())
                            @if (Auth::user()->id<=6)  
                            <button type="submit" class="btn btn-warning" id="p_update_btn">ajax 수정</button>
                            <button type="submit" class="btn btn-danger" id="p_delete_btn">ajax 삭제</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="places">
        @foreach($places as $row)
            <div class="col-xs-6 col-sm-3" id="place_card" >
                <div class="card h-100">
                    <img class="card-img-top" id="place_img" src="/images/places/{{$row->place_picture}}" alt="이미지 없음">
                    <div class="card-body">
                    <h4 class="card-title" id="place_title">{{$row->title}}</h4>
                    <p class="card-text" id="place_body">{{$row->body}}</p>
                    <input type="text" name="place_id" id="place_id" value="{{ $row['id'] }}">
                    </div>
                    <div class="card-footer">
                        @if (Auth::check())
                            @if (Auth::user()->id<=6)
                            <button type="submit" class="btn btn-warning" id="p_update_btn">ajax 수정</button>
                            <button type="submit" class="btn btn-danger" id="p_delete_btn">ajax 삭제</button>
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
                <input type="hidden" name="place_id" id="place_id" value="{{ $row['id'] }}">
            </div>
        @endforeach
        </div>
    </div>
@stop
<script src="/js/info.js"></script>

