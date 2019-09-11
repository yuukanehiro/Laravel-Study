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
        $age_even = Person::get()->filter(function($item){
            return $item->age % 2 === 0;
        });
        $result = $id_even->merge($age_even);

        $data = [
            'msg'  => $msg,
            'data' => $result
        ];
        return view('hello.index', $data);
    }
}
