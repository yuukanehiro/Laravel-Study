<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $msg = 'please input text:';
        if($request->isMethod('post'))
        {
            $msg = 'you typed: "' . $request->input('msg') . '"';
        }
        $data = [
            'msg' => $msg,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg' => $request->bye
        ];
        return view('hello.index', $data);
    }
}
