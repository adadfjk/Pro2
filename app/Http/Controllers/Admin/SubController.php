<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Qqtz;
use App\Models\Admin\Sub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubController extends Controller
{
    //社区列表显示
    public function listShow($id, $name)
    {
        //获取数据
        $sub = Sub::where('CID', $id)->get();
        return view('admin.subcommunity')->with('sub', $sub)->with('name', $name)->with('id', $id);
    }

    //社区添加页面
    public function add($id)
    {
        return view('Admin.add_subcommunity')->with('id', $id);
    }

    //添加社区数据到数据库
    public function checkAdd(Request $request)
    {
        $img = $request->file('backdrop');
        $info = $img->store('uploads');
        $result = Sub::create(['SName' => $request->SName, 'SDesc' => $request->SDesc, 'backdrop' => $info, 'CID' => $request->CID]);
        if($result){
            $count = Sub::where('CID', $request->CID)->count();
            Qqtz::where('ID', $request->CID)->update(['CNum' => $count]);
            $name = Qqtz::where('ID', $request->CID)->get()->first();
            $name = $name['CName'];
            return redirect('subcommunity/'.$request->CID.'/'.$name);
        } else {
            return back();
        }
    }

    //社区编辑页面
    public function edit($id, $cid, $cname)
    {
        $data = Sub::where('ID', $id)->get()->first();
        return view('Admin.edit_subcommunity')->with('data', $data)
                                              ->with('cid', $cid)
                                              ->with('cname', $cname);
    }

    //跟新社区信息到数据库
    public function editSub(Request $request)
    {
        $id = $request['id'];
        $cid = $request['cid'];
        $cname = $request['CName'];
        $data = $request->all();
        $img = $request->file('backdrop');
        if ($img) {
            $info = $img->store('uploads');
            $data['backdrop'] = $info;
        }
        $data = array_except($data, ['CName', '_token', 'id', 'cid', 'submit']);
        Sub::where('ID', $id)->update($data);
        return redirect('subcommunity/'.$cid.'/'.$cname);
    }

    //删除社区
    public function dele($id, $cid, $cname)
    {
        Sub::where('ID', $id)->delete();
        $count = Sub::where('CID', $cid)->count();
        Qqtz::where('ID', $cid)->update(['CNum' => $count]);
        return redirect('subcommunity/'.$cid.'/'.$cname);
    }

    //后台社区排名列表
    public function subcommunityList()
    {
        $subs = Sub::where('Status',0)->orderBy('SNum', 'desc')->simplePaginate(10);;
        foreach ($subs as $sub) {
            $com = DB::table('community_classify')->where('ID', $sub->CID)->first();
            $sub->CName = $com->CName;
        }
        return view('Admin.subcommunityList')->with('subs', $subs);
    }
}
