<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1)
    {
        $name = DB::table('people')->pluck('name');
        $value = $name->toArray();
        $msg = implode(',', $value);

        $result = DB::table('people')->get();
        $data = [
            'msg'  => $msg,
            'data' => $result
        ];
        return view('hello.index', $data);
    }
}
