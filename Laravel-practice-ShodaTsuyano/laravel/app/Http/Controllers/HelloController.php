<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{
    public function index($person)
    {
        $data = [
            'msg' => $person
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
