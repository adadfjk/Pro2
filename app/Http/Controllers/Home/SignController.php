<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Models\Home\Sign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignController extends Controller
{
    //
    public function add(Request $request)
    {

        $result = DB::table('sign')->where('F_id',$request->F_id)->where('U_id',$request->U_id)->first();
        $time = date("Y-m-d");

        if ($result == null){

            $message = new Sign;
            $message->F_id = $request->F_id;
            $message->U_id = $request->U_id;
            $message->in_time = $time;
            $message->save();

            if ($message->save()) {
                return '签到成功';
            } else {
                return '签到失败';
            }

        } else {

            $data=[
                'in_time' => $time,
                'count'   => ($result->count) + 1,
                ];

            $list = DB::table('sign')->where('F_id',$request->F_id)->where('U_id',$request->U_id)->update($data);

            if ($list == 1){
                return '签到成功';

            } else{
                return '签到失败';
            }

        }




    }

}
