<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;

class HelloController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $msg    = 'please input text:';
        $keys   = [];
        $values = [];
        if ($request->isMethod('post')) {
            $form   = $request->only(['name', 'mail', 'tel']);
            $result = '<html><body>';
            foreach($form as $key => $value)
            {
                $result .= $key . ': ' . $value . "<br>";
            }
            $result .= '</body></html>';
            $response->setContent($result);
            return $response;
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
