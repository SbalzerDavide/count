<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Folder;


class TestController extends Controller
{
    public function index(){
        // chiamata a db fatta con eloquent

        $folders = Folder::all(); 
        // dd($plates);
        return response()
            ->json($folders);
    }
}
