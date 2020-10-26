@extends('layouts.master')
@section('header')

    <link rel="stylesheet" href="/assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

    <form class="form-horizontal" method="post" action="/savetask">
        @csrf
        <div class="card-body">
            <h4 class="card-title">إنشاء مهمة جديدة</h4>
            <div class="form-group row">
                <label for="fname"
                       class="col-sm-3 text-right control-label col-form-label">عنوان</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">موضوع</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="details" name="details"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">وقت البداية</label>
                <div class="col-sm-9">
                    <input class="form-control" name="start_date" id="datetimepicker6">
                </div>
            </div>
            <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">وقت البداية</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="end_date" id="datetimepicker7">
                            </div>
            </div>


            <div class="form-group row">
                <label for="cono1"
                       class="col-sm-3 text-right control-label col-form-label">الضباط المكلفين</label>
                <div class="col-sm-9">
                    <select class="select2 form-control m-t-15" multiple="multiple" name="users[]" style="height: 36px;width: 100%;">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->rank->name.':'.$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="/assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script >
        $(function () {
            $('#datetimepicker6').datetimepicker(
                {
                    format:' YYYY-MM-DD hh:mm',
                }
            );
            $('#datetimepicker7').datetimepicker({
                format:' YYYY-MM-DD hh:mm',
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
@endsection
