<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    function __construct()
    {
        $this->middleware('permission:View Product', ['only' => ['index']]);
        $this->middleware('permission:Add Product', ['only' => ['create','store']]);
        $this->middleware('permission:AView All Products', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Product', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('trader')->orderBy('id', 'DESC')->paginate(8);
        $categories = Category::whereNull('parent_id')->orderBy('id', 'DESC')->get();
        return view('moderator.products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approveProduct($id)
    {
        try {
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('moderator.products.index')->with(['error' => 'هذا المنتج غير موجود']);
            $product->status = 3;

            $product->approved_by  = auth()->user()->id;
            $product->approved_on = now()->toDateTimeString();
            $product->save();
            return redirect()->route('moderator.products.index')->with(['success' => 'تم قبول المنتج بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('moderator.products.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
    }

    public function updateProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('moderator.products.index')->with(['error' => 'هذا المنتج غير موجود']);
            if ($request->file('product_photo')) {
                $PPFileUploaded = $request->file('product_photo');
                $PPFileDBName = 'Prod-'.random_int(1000,9999).'-'.now()->year.'-'.now()->month.'.'.$PPFileUploaded->getClientOriginalExtension();
                //Name of our directory
                $dir_name ='ProductsAttachments';
                //check if the directory with the name already exists
                if (!is_dir($dir_name)) {
                    //Create our directory if it does not exist
                    mkdir($dir_name);
                }
                $destinationPath = 'ProductsAttachments';
                $PPFileUploaded->move($destinationPath,$PPFileDBName);
            }
            Product::where('id', $id)->update([
                'category_id'        => $request->category_id,
                'price'              => $request->price,
                'qty'                => $request->qty,
                'status'             => 1,
                'product_photo'      => isset($PPFileDBName) ? $PPFileDBName : $product->product_photo,
                'modified_by'        => auth()->user()->id,
                'modified_on'        => now()->toDateTimeString(),
            ]);
            // save translations
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
            return redirect()->route('moderator.products.index')->with(['success' => 'تم تعديل المنتج بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('moderator.products.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
    }

    public function rejectProduct(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('moderator.products.index')->with(['error' => 'هذا المنتج غير موجود']);
            $product->status = 2;
            $product->approved_by = auth()->user()->id;
            $product->approved_on = now()->toDateTimeString();
            $product->reject_reason = $request->reject_reason;
            $product->save();
            return redirect()->route('moderator.products.index')->with(['success' => 'تم رفض المنتج بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('moderator.products.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
    }
}
