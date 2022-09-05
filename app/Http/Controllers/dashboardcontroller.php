<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    
}
