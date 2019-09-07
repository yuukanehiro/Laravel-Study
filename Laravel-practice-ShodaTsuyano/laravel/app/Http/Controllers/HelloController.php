<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg'  => $request->msg,
            'data' => $request->alldata
        ];
        return view('hello.index', $data);
    }
}
