<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Revertant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class RevertantController extends Controller
{
    //

    public function add(Request $request){

        $time=time();
        $message = new Revertant;
        $message->T_id = $request->T_id;
        $message->U_id = $request->U_id;
        $message->details = $request->details;
        $message->up_time = $time;
        $message->save();
        if ($message->save()){

            $arr = array('user' => $request->U_id, 'detailst' => $request->details, 'up_time' => $time);
//            $arr = '[{"id":"22","name":"33","descn":"44"}]';
            return json_encode($arr);
        } else {
            return  '添加失败';
        }



    }



    public function show(Request $request){

//        $list = DB::table('revertant')->where('T_id',$request->T_id)->get();
        $list = DB::table('users')
            ->join('revertant', 'users.UserID', '=', 'revertant.U_id')
            ->where('T_id',$request->T_id)
            ->get();


       return json_encode($list);

    }
}
