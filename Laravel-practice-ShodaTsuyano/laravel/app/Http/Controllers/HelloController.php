<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $msg    = 'please input text:';
        $keys   = [];
        $values = [];
        if ($request->isMethod('post')) {
            $form   = $request->all();
            $keys   = array_keys($form);
            $values = array_values($form);
        }
        $data = [
            'msg'    => $msg,
            'keys'   => $keys,
            'values' => $values,
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
