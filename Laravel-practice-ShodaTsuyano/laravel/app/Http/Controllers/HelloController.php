<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Http\Pagination\MyPaginator;
use App\Jobs\MyJob;

class HelloController extends Controller
{
    public function index(Person $person = null)
    {
        if($person != null)
        {
            $qname = $person->id % 2 == 0 ? 'even' : 'odd';
            MyJob::dispatch($person)->onQueue($qname);
        }
        $msg = 'show people record.';
        $result = Person::get();
        $data = [
            'input' => '',
            'msg'   => $msg,
            'data'  => $result
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
        $person->all_data = ['yudetarou','yudetarou@example.net', 42]; // ダミーデータ
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
