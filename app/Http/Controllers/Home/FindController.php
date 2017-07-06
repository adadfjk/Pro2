<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FindController extends Controller
{
    //
    public function find(Request $request)
    {

        $list = DB::table('users')->where('UserPhone',$request->phone)->get();

        return $list;
    }

    public function up(Request $request)
    {
        $data = [
            'UserPass' =>Hash::make($request->password),
        ];


        $list = DB::table('users')->where('UserPhone',$request->phone)->where('UserEmail',$request->email)->update($data);

        return redirect('/login');
    }
}
