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
        $result = Person::get()->filter(function($person)
        {
            return $person->age < 70;
        });
        $result2 = Person::get()->filter(function($person)
        {
            return $person->age < 10;
        });
        // 70歳以下のレコード群から、10歳以下のレコードを取り除いたもの
        $result3 = $result->diff($result2);

        $data = [
            'msg'  => $msg,
            'data' => $result3
        ];
        return view('hello.index', $data);
    }
}
