<div class="accordion" id="accordionExample">
    @forelse($tasks as $task)
    @php
    $tmam=0;
    @endphp

    <div class="card m-b-0  border-top">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <a  data-toggle="collapse" data-target="#collapse{{$task->id}}" aria-expanded="true" aria-controls="collapse{{$task->id}}">
                    <i class="m-r-5  fas fa-newspaper" aria-hidden="true"></i>
                    <span>{{$task->title}} ({{$task->start_date}})</span>
                </a>
                @if(auth()->id()==$task->creator_id)
                <a class="btn btn-warning btn-sm" style="float: left" href="/edittask/{{$task->id}}">تعديل</a>
                @endif
            </h5>

        </div>
        <div id="collapse{{$task->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                {{$task->details}}
                <hr>
                {{$task->creator->rank->name}}/
                {{$task->creator->name}}
                <hr>
                <div id="users_badges_{{$task->id}}">
                    @foreach($task->users as $user)
                    {{--                                @if($user->id!=$task->creator_id)--}}
                    <span id="user_task_{{$user->id}}_{{$task->id}}" class="badge badge-pill   @if($user->pivot->status==1) badge-success @elseif($user->pivot->status==2) badge-dark @else badge-warning @endif"
                          data-toggle="tooltip" title=" @if($user->pivot->status==1) تم انتهاء @elseif($user->pivot->status==2) تم تحويل المهمة@else تحت التنفيذ @endif">
                                {{$user->rank->name}}/
                                {{$user->name}}
                                </span>
                    {{--                                @endif--}}

                    @if($user->id==auth()->id()&&$user->pivot->status==0)
                    @php
                    $tmam=1;
                    @endphp
                    @endif
                    @endforeach

                    @if($tmam==1)
                    <button class="btn btn-success btn-sm finish-task" id="tmam_{{$task->id}}" data-id="{{$task->id}}">تمام</button>
                    @endif
                    <button class="btn btn-info btn-sm transfer-task-show"  id="trans_{{$task->id}}" data-id="{{$task->id}}">تحويل المهمة</button>
                </div>
                <form id="transfer_{{$task->id}}">
                    {{--                            <form action="/transfertask" id="transfer_{{$task->id}}" method="post">--}}
                        @csrf
                        <div id="transfer-div_{{$task->id}}"  style="display: none;">
                            <hr>
                            <input type="hidden" name="f_id" value="{{auth()->id()}}">
                            <input type="hidden" name="tid" value="{{$task->id}}">
                            <select class="select2" id="t_id" name="t_id" style="height:24px;">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->rank->name}} / {{$user->name}}</option>
                                @endforeach

                            </select>
                            {{--                                    <input class="form-control d-inline col-4" type="text" id="desc_{{$task->id}}" name="desc">--}}
                            <input type="button" class="btn btn-sm btn-info transfer-task-post"  id="trans_{{$task->id}}" data-id="{{$task->id}}" value="تحويل">
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @empty
    <h3>لا يوجد مهمات</h3>
    @endforelse


</div>
