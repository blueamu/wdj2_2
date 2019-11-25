@extends('layouts.app')

@section('content')
<div text_align="right">
    <a href="{{ route('infos.index') }}" class="btn btn-default">조원목록</a>
</div>
<br />

<form method="post" action="{{ route('places.update', $place->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h2>시간표</h2>
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
                <td><input type="text" name="mon_1_subject" id="mon_1_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_1_subject" id="tue_1_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_1_subject" id="wed_1_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_1_subject" id="thr_1_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_1_subject" id="fri_1_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_1_subject" id="sat_1_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_1_subject" id="sun_1_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>2교시</td>
                <td><input type="text" name="mon_2_subject" id="mon_2_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_2_subject" id="tue_2_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_2_subject" id="wed_2_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_2_subject" id="thr_2_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_2_subject" id="fri_2_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_2_subject" id="sat_2_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_2_subject" id="sun_2_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>3교시</td>
                <td><input type="text" name="mon_3_subject" id="mon_3_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_3_subject" id="tue_3_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_3_subject" id="wed_3_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_3_subject" id="thr_3_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_3_subject" id="fri_3_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_3_subject" id="sat_3_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_3_subject" id="sun_3_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>4교시</td>
                <td><input type="text" name="mon_4_subject" id="mon_4_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_4_subject" id="tue_4_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_4_subject" id="wed_4_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_4_subject" id="thr_4_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_4_subject" id="fri_4_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_4_subject" id="sat_4_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_4_subject" id="sun_4_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>5교시</td>
                <td><input type="text" name="mon_5_subject" id="mon_5_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_5_subject" id="tue_5_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_5_subject" id="wed_5_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_5_subject" id="thr_5_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_5_subject" id="fri_5_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_5_subject" id="sat_5_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_5_subject" id="sun_5_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>6교시</td>
                <td><input type="text" name="mon_6_subject" id="mon_6_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_6_subject" id="tue_6_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_6_subject" id="wed_6_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_6_subject" id="thr_6_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_6_subject" id="fri_6_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_6_subject" id="sat_6_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_6_subject" id="sun_6_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>7교시</td>
                <td><input type="text" name="mon_7_subject" id="mon_7_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_7_subject" id="tue_7_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_7_subject" id="wed_7_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_7_subject" id="thr_7_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_7_subject" id="fri_7_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_7_subject" id="sat_7_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_7_subject" id="sun_7_subject" 
                    class="form-control"></td>
            </tr>
            <tr>
                <td>8교시</td>
                <td><input type="text" name="mon_8_subject" id="mon_8_subject" 
                    class="form-control"></td>
                <td><input type="text" name="tue_8_subject" id="tue_8_subject" 
                    class="form-control"></td>
                <td><input type="text" name="wed_8_subject" id="wed_8_subject" 
                    class="form-control"></td>
                <td><input type="text" name="thr_8_subject" id="thr_8_subject" 
                    class="form-control"></td>
                <td><input type="text" name="fri_8_subject" id="fri_8_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sat_8_subject" id="sat_8_subject" 
                    class="form-control"></td>
                <td><input type="text" name="sun_8_subject" id="sun_8_subject" 
                    class="form-control"></td>
            </tr>
        </table>
    <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" /> 
    </div>
</form>
@endsection