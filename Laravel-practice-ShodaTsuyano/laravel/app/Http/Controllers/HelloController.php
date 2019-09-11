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
        $id_even = Person::get()->filter(function($item){
            return $item->id % 2 === 0;
        });
        $map = $id_even->map(function($item, $key){
            return $item->id . ':' . $item->name;
        });

        $data = [
            'msg'  => $map,
            'data' => $id_even
        ];
        return view('hello.index', $data);
    }
}
