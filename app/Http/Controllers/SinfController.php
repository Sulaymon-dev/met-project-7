<?php

namespace App\Http\Controllers;

use App\Sinf;
use App\Subject;

class SinfController extends Controller
{
    public function index()
    {
        $sinf = Subject::all();

        $result = $sinf->plans()->where('status',0)->get();
        dd($result);
    }
}
