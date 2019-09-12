<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Http\Pagination\MyPaginator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $msg = 'show people record.';
        $re = Person::get();
        $fields = Person::get()->fields();

        $data = [
            'msg'  => implode(', ', $fields),
            'data' => $re
        ];
        return view('hello.index', $data);
    }

    public function save($id, $name)
    {
        $record = Person::find($id); // 1. id = 1のモデルを取得する
        $record->name = $name;       // 2. id = 1のモデルのnameプロパティに値を入れる
        $record->save();             // 3. 保存する
        return redirect()->route('hello');
    }

    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa','bbb@ccc', 1234]; // ダミーデータ
        $person->save();

        return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if($id == -1)
        {
            return Person::get()->toJson();
        }
        else{
            return Person::find($id)->toJson();
        }
    }
}
