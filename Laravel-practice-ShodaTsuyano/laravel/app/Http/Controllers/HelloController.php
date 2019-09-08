<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index($id = -1)
    {
        if($id >= 0)
        {
            $msg = "get ID <= " . $id;
            $result = DB::table('people')->where('id', '<=', $id)->get();
        }
        else{
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
