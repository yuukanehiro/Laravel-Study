<?php

namespace App\Http\Controllers;
use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(MyServiceInterface $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg'  => $myservice->say(),
            'data' => $myservice->alldata()
        ];
        return view('hello.index', $data);
    }
}
