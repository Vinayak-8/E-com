<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product');
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name'=>['required', 'min:2'],
            'image'=>['required'],
            'original_price'=>['required'],
            'our_price'=>['required'],
        ]);
        
        if(isset($request)){
                $data=new product();
                $data['name']=$request->name;
                $data['original_price']=$request->original_price;
                $data['our_price']=$request->our_price;
                $file=$request->image;
                $filename=time().'.'.$file->getClientOriginalExtension();
                 $request->image->move('assets',$filename);
                 $data['image']=$filename;
                
                 $data->save();
                 Alert::success('Congrats', 'Product Added successfully!!!');
                 return redirect()->back();
        }
    }

    public function show(Request $req)
    {
        $data=product::where('name','LIKE', '%' . $req->q . '%')
         ->orWhere('original_price','LIKE', '%' . $req->q . '%')
         ->orWhere('our_price','LIKE', '%' . $req->q . '%')
        ->paginate(2);
        // dd($data);
        return view('admin.dashboard',compact('data'));
    }

    public function searchproduct(Request $req){
        $userInfo = Auth::user();
            $data = product::where('name','LIKE', '%' . $req->q . '%')
            ->orWhere('original_price','LIKE', '%' . $req->q . '%')
            ->orWhere('our_price','LIKE', '%' . $req->q . '%')
            ->paginate(2);
            //$notification = Notifications::count();
            return view('admin.dashboard',['data'=>$data]);
    }

   
}

