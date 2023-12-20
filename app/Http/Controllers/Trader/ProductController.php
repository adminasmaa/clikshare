<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $products = Product::orderBy('id', 'DESC')->where('created_by', auth()->user()->id)->paginate(8);
        $categories = Category::whereNull('parent_id')->orderBy('id', 'DESC')->get();
        return view('trader.products.index', compact('products','categories'));
    }

    public function filter(Request $request)
    {
        if(!empty($request->status)) {
            if ($request->status === '4') {
                $products = Product::orderBy('id', 'DESC')->paginate(8);
            } else {
                $products = Product::orderBy('id', 'DESC')->where('status', $request->status)->paginate(8);
            }
        }
        $categories = Category::whereNull('parent_id')->orderBy('id', 'DESC')->get();
        $status = $request->status;
        return view('trader.products.index', compact('products','categories','status'));
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
        try {
            DB::beginTransaction();
            $PPFileDBName = '';
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
            $product = Product::create([
                'category_id'        => $request->category_id,
                'price'              => $request->price,
                'qty'                => $request->qty,
                'status'             => 1,
                'product_photo'      => $PPFileDBName,
                'created_by'         => auth()->user()->id,
                'created_on'         => now()->toDateTimeString(),
            ]);

            // save translations
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
            DB::commit();
            return redirect()->route('trader.products.index')->with(['success' => 'تم الإضافة بنجاح']);
        } catch (\Exception $ex) {
            dd($ex);
            DB::rollback();
            return redirect()->route('trader.products.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
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
        try {
            $product = Product::find($id);

            if (!$product)
                return redirect()->route('trader.products.index')->with(['error' => 'هذا المنتج غير موجود']);

            $product->delete();

            return redirect()->route('trader.products.index')->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('trader.products.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
    }
}
