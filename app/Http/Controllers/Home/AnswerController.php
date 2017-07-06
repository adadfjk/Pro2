<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    //
    public function show($id,$fname)
    {

        $headline = DB::table('message')->where('id',$id)->pluck('headline');

//        $result = Answer::where('T_id',$id)
////            ->take(20)
//            ->get();

        $result = DB::table('users')
            ->join('answer', 'users.UserID', '=', 'answer.U_id')
            ->get();


        $liet = DB::table('subcommunity')->where('SName',$fname)->get();
        if (session('user') ==  null){
            return view('/Home/revert')->with('result',$result)->with('headline',$headline)->with('TID',$id)->with('liet',$liet);
        } else {


        $list= DB::table('attention')->where('F_id',$liet[0]->ID)->where('U_id',session('user')->UserID)->first();

            if ($list == null){

                $arr = '关注';
                return view('/Home/revert')->with('result',$result)->with('headline',$headline)->with('TID',$id)->with('liet',$liet)->with('arr',$arr);
            } else {


                $arr = '取消关注';
                return view('/Home/revert')->with('result',$result)->with('headline',$headline)->with('TID',$id)->with('liet',$liet)->with('arr',$arr);
            }


        }






    }

    public function add(Request $request){
        $time=time();
        $message = new Answer;
        $message->T_id = $request->T_id;
        $message->U_id = $request->U_id;
        $message->F_id = $request->F_id;
        $message->content = $request->content;
        $message->content_time = $time;
        $message->save();
        if ($message->save()){

            $arr = array('user' => $request->U_id, 'content' => $request->content, 'content_time' => $time);

            return json_encode($arr);
        } else {
            return  '添加失败';
        }



    }

}
