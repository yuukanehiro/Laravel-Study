<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($name = "hoge")
    {
        $msg = "get people records.";
        $first = DB::table('people')->first();
        $last  = DB::table('people')->orderBy('id', 'desc')->first();
        $result = [$first, $last];

        $data = [
            'msg'  => 'Database access',
            'data' => $result
        ];
        return view('hello.index', $data);
    }
}
