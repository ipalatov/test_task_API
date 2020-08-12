<?php

namespace App\Http\Models\Core;

use Illuminate\Http\Request;

abstract class Model
{
    abstract public function getIndex(Request $request);
}
