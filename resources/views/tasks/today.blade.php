@extends('layouts.master')
@section('styles')


@endsection
@section('content')

    <div class="card-body">
        <h5 class="card-title"> مهمات اليوم</h5>
        <hr>

        @include('tasks.partials.taskslist')

        @if($tasks->lastPage()>1)
            <div class="card-footer border-top">
                <div class="offset-6">
                    {{$tasks->links()}}
                </div>
            </div>
        @endif
    </div>

@endsection

@section('scripts')
    @include('tasks.partials.tasksscript')

    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

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
