<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Qqtz;
use App\Models\Admin\Sub;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QqtzController extends Controller
{
    //后台综合社区分类
    public function listShow()
    {
        $qqtz = Qqtz::all();
        return view('Admin/community_classify', ['qqtz' => $qqtz]);
    }

    //后台访问添加分类页面
    public function add()
    {

        return view('Admin.add_community');
    }

    //后台添加分类到数据库
    public function checkAdd(Request $request)
    {
        Qqtz::create($request->all());
        return redirect('/community_classify');
    }

    //后台访问分类编辑页面
    public function edit($id)
    {
        $qqtz = Qqtz::where('ID', $id)->get()->first();
        return view('Admin.edit_community')->with('qqtz', $qqtz);
    }

    //后台编辑分类到数据库
    public function checkEdit(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        unset($data['id']);
        unset($data['submit']);
        unset($data['_token']);
        Qqtz::where('ID', $id)->update($data);
        return redirect('community_classify');
    }

    //后台删除分类
    public function dele($id)
    {
        Qqtz::where('ID', $id)->delete();
        Sub::where('CID', $id)->delete();
        return redirect('community_classify');
    }

    //前台社区分类显示
    public function showList()
    {
        $data = Qqtz::where('CStatus', 0)->orderBy('CNum', 'desc')->get();

        for($i = 0 ; $i < 5; $i++){
            $arr = Sub::where('CID', $data[$i]['ID'])->get();


            $aa = '';

            foreach ($arr as $item){

                $aa[$item['ID']] = $item['SName'];
            }
            $aar[$data[$i]['CName']] = $aa;
        }

        return view('Home.classify')->with('data', $aar);
    }
}
