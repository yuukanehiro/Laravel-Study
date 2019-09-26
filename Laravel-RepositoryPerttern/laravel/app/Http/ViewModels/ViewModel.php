<?php

namespace App\Http\ViewModels;

use Illuminate\Support\Fluent;

abstract class ViewModel extends Fluent
{
    abstract public function render();
}
