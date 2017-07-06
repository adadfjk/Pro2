<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Level;
use App\Models\Home\Mark;
use App\Models\Home\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    //签到
    public function checkIn(Request $request)
    {
        if($request->sign == 1){
            $data = Mark::where('uid', session('user')->UserID)->first();
            if($data){
                if($data->signtime == date('Y-m-d')){
                    return 0;
                }else{
                    $arr1 = explode('-',$data->signtime);
                    $arr2 = explode('-', date('Y-m-d'));
                    $time = mktime('0','0','0',$arr2[1], $arr2[2], $arr2[0]) - mktime('0','0','0',$arr1[1], $arr1[2], $arr1[0]);
                    $hour = $time/3600;
                    if($hour == 24) {
                        $res = Mark::where('id', $data->id)->update(['sustaindays' => $data->sustaindays + 1, 'sumdays' => $data->sumdays + 1, 'signtime' => date('Y-m-d')]);
                        if ($res){
                            $num1 = $data->sustaindays + 1;
                            $num2 = $data->sumdays + 1;
                            $arr = ['sustaindays' => $num1, 'sumdays' => $num2];
                        }
                    }else{
                        $res = Mark::where('id', $data->id)->update(['sustaindays' => 1, 'sumdays' => $data->sumdays + 1, 'signtime' => date('Y-m-d')]);
                        if ($res) {
                            $num1 = 1;
                            $num2 = $data->sumdays + 1;
                            $arr = ['sustaindays' => $num1, 'sumdays' => $num2];
                        }
                    }
                    session('user')->sustaindays = $num1;
                    session('user')->sumdays = $num2;
                    if ($num1 < 8) {
                        session('user')->UserPoint += $num1;
                        User::where('UserID', $data->uid)->update(['UserPoint' =>session('user')->UserPoint]);
                    } else {
                        session('user')->UserPoint += 10;
                        User::where('UserID', $data->uid)->update(['UserPoint' => session('user')->UserPoint]);
                    }
                    $exp = Level::where('id', session('user')->level + 1)->first();
                    if (session('user')->UserPoint >= $exp->exp) {
                        session('user')->level += 1;
                        $arr['level'] = session('user')->level;
                    }
                    $arr['point'] = session('user')->UserPoint;
                    return $arr;
                }
            }else{
                DB::table('marks')->insert(['uid' => session('user')->UserID, 'sustaindays' => 1, 'sumdays' => 1, 'signtime' => date('Y-m-d')]);
                session('user')->sustaindays = 1;
                session('user')->sumdays = 1;
                session('user')->UserPoint = 1;
                User::where('UserID', session('user')->UserID)->update(['UserPoint' => session('user')->UserPoint]);
                return ['sustaindays' => 1, 'sumdays' => 1, 'point' => 1];
            };
        }

    }
}
