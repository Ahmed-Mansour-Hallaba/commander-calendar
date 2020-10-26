@extends('layouts.master')

@section('content')
    <form class="form-horizontal" method="post" action="/storeuser">
        @csrf
        <div class="card-body">
            <h4 class="card-title">اضافة مستخدم جديد</h4>
            <div class="form-group row">
                <label for="fname"
                       class="col-sm-3 text-right control-label col-form-label">اسم الدخول</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="uname" name="uname">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">اسم بالكامل</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" name="fname">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname"
                       class="col-sm-3 text-right control-label col-form-label">كلمة المرور</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1"
                       class="col-sm-3 text-right control-label col-form-label">الرتبة\الدرجة</label>
                <div class="col-sm-9">
                    <select class="select2 form-control m-t-15"  name="rank" style="height: 36px;width: 100%;">
                        @foreach($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->name}}</option>
                        @endforeach
                    </select>
                </div>

        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
@endsection
