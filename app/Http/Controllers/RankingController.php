<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Grade;
use Validator;
use DataTables;
use App\Grade;

class RankingController extends Controller
{
    public function export() { 
    	return view('ranking'); 
    } 

    
}