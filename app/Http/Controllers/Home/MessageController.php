<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Home\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //

    /**
     * 添加新帖子
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // 添加到磁盘空间下
        $path = $request->file('picture')->store('/','picture');
        $time=time();


        $picture = '/newspicture/'.$path;
//        设置时区 上海
        date_default_timezone_set('Asia/Shanghai');



        $message = new Message;
        $message->F_id = $request->F_id;
        $message->U_id = $request->U_id;
        $message->headline = $request->headline;
        $message->picture = $picture;
        $message->creation_time = $time;
        $message->save();

        $Tid = DB::table('message')->where('creation_time',$time)->first();

        DB::insert('insert into answer ( F_id, T_id, U_id, content, content_time) values (?, ?, ? , ? , ?)',
            [$request->F_id, $Tid->id,$request->U_id,$request->content,$time]);

        if ($message->save()){

            return redirect("/home/message/".$request->F_id);
        } else {
            return redirect("/");
        }

    }

    /**
     * 查看社区帖子
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $result = Message::where('F_id',$id)
            ->orderBy('headline','picture','id')
                            ->take(20)
                            ->get();
        $Tname = DB::table('subcommunity')->where('ID',$id)->first();

        if (session('user') ==  null) {
            return view('/Home/post')->with('result',$result)->with('Tname',$Tname);
        } else {


            $list = DB::table('sign')->where('F_id',$id)->where('U_id',session('user')->UserID)->first();
//            var_dump($time = date("Y-m-d"));
//            dd($list);
            if ($list== null){

                return view('/Home/post')->with('result',$result)->with('Tname',$Tname)->with('time','签到');
            } else {

                if ($list->in_time==date("Y-m-d")){
                    return view('/Home/post')->with('result',$result)->with('Tname',$Tname)->with('time','已签到');
                } else {
                    return view('/Home/post')->with('result',$result)->with('Tname',$Tname)->with('time','签到');
                }
            }


        }





    }

    
}
