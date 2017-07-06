<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotController extends Controller
{
    //
    public function  show (){
        $list = DB::table('message')
            ->join('subcommunity','subcommunity.ID','message.F_id')
            ->orderBy('creation_time', 'desc')
            ->simplePaginate(30);


        return view('Home/hot')->with('list',$list);
    }
}
