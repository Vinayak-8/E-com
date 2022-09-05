<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.userdashboard');
    }
    public function show(Request $req)
    {
        $data=product::where('name','LIKE', '%' . $req->q . '%')
         ->orWhere('original_price','LIKE', '%' . $req->q . '%')
         ->orWhere('our_price','LIKE', '%' . $req->q . '%')
        ->paginate(100);
        // dd($data);
        return view('user.userdashboard',compact('data'));
    }
}
