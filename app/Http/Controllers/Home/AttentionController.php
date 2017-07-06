<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Models\Home\Attention;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttentionController extends Controller
{
    //
    public function add(Request $request)
    {
        $time = time();

        $message = new Attention;
        $message->F_id = $request->F_id;
        $message->U_id = $request->U_id;
        $message->F_name = $request->Fname;
        $message->up_time = $time;
        $message->save();
        if ($message->save()) {

            return '关注成功';
        } else {
            return '关注失败';
        }
    }


        public function del(Request $request){
//           $a=  'delete from attention  where F_id = ' .$request->F_id. ' and U_id = '.$request->U_id;
           $list = DB::table('attention')->where('F_id',$request->F_id)->where('U_id',$request->U_id)->delete();


                if ($list==1){
                     return '取消关注';
                } else {
                    return '取消失败';
                }



    }
}
