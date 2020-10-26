<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    public function index()
    {


        $tasks=Task::whereHas('users',function (Builder $query){
            $query->where('id','=',auth()->id());
        })->get();
//        $tasks->whereDate('date',today());
//        dd($tasks);
        return view('tasks.calendar')
            ->with('tasks',$tasks);


    }
    public function all(Request $request)
    {


        $tasks=Task::whereHas('users',function ($query){
            $query->where('id','=',auth()->id());
        });

        if($request->start_date!="") {
            $tasks->where('start_date', '>=', $request->start_date);
        }
        if($request->end_date!="") {

            $tasks->where('start_date', '<=', $request->end_date);
        }
        if($request->title!="") {
            $tasks->where('title', 'like', "%$request->title%");
        }
        if($request->details!="") {
            $tasks->where('details', 'like', "%$request->details%");
        }
        if($request->has('users')) {
            foreach ($request->users as $user)
            {
                $tasks->whereHas('users',function ($query) use($user){
                    $query->where('id','=',$user);
                });
            }

        }

        return view('tasks.all')
            ->with('tasks',$tasks->orderBy('start_date','desc')->paginate(8));

    }
    public  function create()
    {
        $user=auth()->user();
        $users=User::query()
            ->where('rank_id','>=',"$user->rank_id")
            ->where('id','!=',"$user->id")
            ->where('type','!=','admin')
            ->orderBy('rank_id','asc')->get();
        return view('tasks.create')
            ->with('users',$users);

    }
    public function store(Request $request)
    {
        $task=new Task();
        $task->title=$request->title;
        $task->details=$request->details;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->creator_id=auth()->id();
        $task->save();

        $uid=auth()->id();
        DB::insert("INSERT INTO users_tasks (user_id, task_id, status) VALUES ('$uid', '$task->id', '0')");
        if ($request->has('users')){
        foreach ($request->users as $user)
        {
            DB::insert("INSERT INTO users_tasks (user_id, task_id, status) VALUES ('$user', '$task->id', '0')");
        }}
        Session::flash('message', 'تم انشاء المهمة بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect('/today');

    }
    public function finishTask($uid,$tid)
    {
        DB::update("UPDATE `users_tasks` SET `status` = '1' WHERE `users_tasks`.`user_id` = '$uid' AND `users_tasks`.`task_id` = '$tid';");
        return response()->json("UPDATE `users_tasks` SET `status` = '1' WHERE `users_tasks`.`user_id` = '$uid' AND `users_tasks`.`task_id` = '$tid';");
    }
    public function transferTask(Request $request)
    {
        $tid=$request->tid;
        $f_id=$request->f_id;
        $t_id=$request->t_id;
        $desc=' ';
        if($request->desc!=null)
            $desc=$request->desc;
        DB::beginTransaction();
        DB::insert("INSERT INTO `transfers` (`from_id`, `to_id`, `task_id`, `details`) VALUES ( '$f_id', '$t_id', '$tid', '$desc');");
        DB::insert("INSERT INTO users_tasks (user_id, task_id, status) VALUES ('$t_id', '$tid', '0')");
        DB::update("update users_tasks set status=2 where task_id='$tid' and user_id='$f_id'");
        DB::commit();

//        Session::flash('message', 'تم تحويل المهمة بنجاح');
//        Session::flash('alert-class', 'alert-success');
//        return back();
        $res=User::find($t_id);

        return Response::json([$res,$res->rank->name]);

    }
    public function edit($id)
    {

        $task=Task::find($id);

        $user=auth()->user();
        if($task->creator_id!=$user->id)
        {
            Session::flash('message', 'هذة الصفحة مخصصة لقائد المهمة فقط');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $users=User::query()
            ->where('rank_id','>=',"$user->rank_id")
            ->where('id','!=',"$user->id")
            ->where('type','!=','admin')
            ->orderBy('rank_id','asc')->get();
        return view('tasks.edit')
            ->with('task',$task)
            ->with('users',$users);
    }
    public function update(Request $request)
    {
        $task=Task::find($request->tid);
        $task->title=$request->title;
        $task->details=$request->details;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->status=$request->status;
        $task->save();
        DB::delete("delete from users_tasks where task_id='$task->id'");
        $uid=auth()->id();
        DB::insert("INSERT INTO users_tasks (user_id, task_id, status) VALUES ('$uid', '$task->id', '0')");
        if ($request->has('users')){
            foreach ($request->users as $user)
            {
                DB::insert("INSERT INTO users_tasks (user_id, task_id, status) VALUES ('$user', '$task->id', '0')");
//            echo "INSERT INTO users_tasks (user_id, task_id, status) VALUES ('$user', '$task->id', '0') <br>";
            }}
        return redirect('/today');

    }
    public function calendar()
    {
        return view('tasks.calendar');
    }
}
