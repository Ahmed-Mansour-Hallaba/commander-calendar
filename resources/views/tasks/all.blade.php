@extends('layouts.master')
@section('styles')


@endsection
@section('content')

    <div class="card-body">
        <h5 class="card-title">جميع المهمات</h5>
        <hr>
        <div class="card m-b-0  border-top">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <a  data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                        <i class="m-r-5  fas fa-filter" aria-hidden="true"></i>
                        <span>تصفيات</span>
                    </a>
                </h5>
            </div>
            <div id="collapse" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="">
                    <form method="get" action="">
                        <div class="form-group row">
                            <label for="fname"
                                   class="col-sm-1 text-right control-label col-form-label">عنوان</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <label for="lname" class="col-sm-1 text-right control-label col-form-label">موضوع</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="details" name="details">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email1"
                                   class="col-sm-1 text-right control-label ">تاريخ البدئ</label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                </div>
                            </div>
                            <label for="email1"
                                   class="col-sm-1 text-right control-label col-form-label">تاريخ نهاية</label>
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="date"  class="form-control" name="end_date" id="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1"
                                   class="col-sm-1 text-right control-label col-form-label">الضباط المكلفين</label>
                            <div class="col-sm-11">
                                <select class="select2 form-control m-t-15" multiple="multiple" name="users[]" style="height: 36px;width: 100%;">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->rank->name.':'.$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                        <span class="col-sm-1"></span>
                        <input class="btn btn-info col-sm-1" type="submit" value="بحث">
                            <span class="col-sm-1"></span>

                            <a class="btn btn-light col-sm-1" href="/tasks">مسح</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        @include('tasks.partials.taskslist')

    @if($tasks->lastPage()>1)

        <div class="card-footer border-top">
            <div class="offset-6">
            {{$tasks->links()}}</div>
        </div>
        @endif

    </div>


@endsection

@section('scripts')

    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    @include('tasks.partials.tasksscript')
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable({
                "language": {
                    "sProcessing":    "جاري التحميل...",
                    "sLengthMenu":    "إظهار _MENU_ المدخلات",
                    "sZeroRecords":   "لا يوجد سجلات مطابقة",
                    "sEmptyTable":    "لا يوجد بيانات متاحة في الجدول",
                    "sInfo":          "إظهار _START_ من _END_ اجمالي _TOTAL_ مدخلات",
                    "sInfoEmpty":     "إظهار 0 to 0 of 0 المدخلات",
                    "sInfoFiltered": '(مصفاه من _MAX_ جميع المدخلات)',
                    "sInfoPostFix":   "",
                    "sSearch":        'بحث:',
                    "sUrl":           "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "جاري التحميل...",
                    "oPaginate": {
                        "sFirst":    "الأول",
                        "sLast":    "الأخير",
                        "sNext":    "التالى",
                        "sPrevious": "السابق"
                    },
                    "oAria": {
                        "sSortAscending":  ": تنشيط ليتم الترتيب تصاعدياً",
                        "sSortDescending": ": تنشيط حتي يتم الترتيب تنازلي"
                    }
                }
            }
        );
    </script>
@endsection
