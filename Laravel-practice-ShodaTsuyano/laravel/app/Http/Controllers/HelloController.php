<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($name = "hoge")
    {
        if ($name != '') {
            $msg = 'get name like ' . $name . '"';
            $result = DB::table('people')
                ->where('name', 'like', '%' . $name . '%')->get();
        } else {
            $msg = 'get people records';
            $result = DB::table('people')->get();
        }

        $data = [
            'msg'  => 'Database access',
            'data' => $result
        ];
        return view('hello.index', $data);
    }
}
