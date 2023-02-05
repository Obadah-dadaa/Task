<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Validator;
class ProductController extends Controller
{
    protected function validator (array $data) {
        return Validator:: make($data,[
            'name' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods=Product::paginate(4);
        return view('admin.dashboard_product', ['prods' =>  $prods]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('proudcts.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $product = Product::create([
            'name' => $request->name,
            'image' =>  $request->image,
            'description' => $request->description,
            'user_id'=>$request->user_id,
        ]);
        // 3. return to another page.
        $request->session()->flash('message','تم إضافة منتج بنجاح');
        return redirect()->route('homee');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $users=User::all();
        $product=Product::where('id',$id)->firstOrFail();
        return view('admin.show_product', ['product' =>  $product,'users'=> $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::all();
        $product=Product::where('id',$id)->firstOrFail();
        return view('admin.edit_product',['product' =>  $product,'users'=> $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::where('id',$id)->firstOrFail();

        $product->update([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
            'user_id' => $request->user_id,

        ]);
        $product->save();

        $request->session()->flash('message','تم تعديل معلومات المنتج بنجاح');
        return view('admin.dashboard_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->firstorfail()->delete();
        echo ("Product Record deleted successfully.");
        return view('admin.dashboard_product');

    }
}
