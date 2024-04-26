<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choix;
use App\Models\categs;
use App\Models\test_comp;
use App\Models\qstns_test;
use App\Models\reponse_test;
use Session;

class TestController extends Controller
{
    public function test(){
        return view('test.test_comp');
    }
    public function show(){
        
    }

}
