<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Admin\Inform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformController extends Controller
{
    //
    public function add(Request $request)
    {

        $message = new Inform;
        $message->content = $request->content;

        $message->save();
        return redirect('/admin/inform');
    }

    public function show()

    {
        $result =DB::table('inform')->simplePaginate(10);

        if ($result == null){
            return view('Admin/inform');
        } else {
            return view('Admin/inform')->with('result',$result);
        }

    }



    public function alter(Request $request)
    {

        $time = date('Y-m-j');

        $data =[
          'status'=> 1,
            'up_time'=>$time,
        ];


        $list = DB::table('inform')->where('id',$request->id)->update($data);


        return redirect('/admin/inform');

    }




}
