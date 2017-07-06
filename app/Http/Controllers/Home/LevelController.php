<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use App\Models\Home\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    //判断用户等级
    public function level()
    {
        if (session('user')) {
            $data = Level::all();
            for($i = 0; $i < 36; $i++)
            {
                if(session('user')->UserPoint < $data[$i]->exp)
                {
                    $level = $i;
                    break;
                }
            }
            session('user')->level = $level;
        }

        $hdp = DB::table('slideshows')->simplePaginate(5);

        $squad=DB::table('subcommunity')->simplePaginate(10);

        $class=DB::table('community_classify')->where('CStatus',0)->simplePaginate(4);

        return view('home.index')->with('hdp',$hdp)->with('squad',$squad)->with('class',$class);
    }


    public function show (Request $request)
    {
        $list=DB::table('message')->where('F_id',$request->F_id)->simplePaginate(4)->toArray();

        return $list;
    }


}
