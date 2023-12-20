<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\CategoryType;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    function __construct()
    {
        $this->middleware('permission:View Category', ['only' => ['index']]);
        $this->middleware('permission:Add Category', ['only' => ['create','store']]);
        $this->middleware('permission:Edit Category', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.settings.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'parent_id')->get();
        return view('admin.settings.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {

            DB::beginTransaction();

            // validation

            // if user choose main category then we must remove parent id from the request

            if ($request->type == CategoryType::mainCategory)  // main category
            {
                $request->request->add(['parent_id' => null ]);
            }

            // if he choose child category we must add parent id
            $category = Category::create($request->except('_token'));

            // save translations
            $category->name = $request->name;
            $category->save();
            DB::commit();
            return redirect()->route('admin.settings.categories.index')->with(['success' => 'تم الإضافة بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.settings.categories.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
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
        $category = Category::orderBy('id', 'DESC')->find($id);
        $categories = Category::select('id', 'parent_id')->get();

        if (!$category)
            return redirect()->route('admin.settings.categories.index')->with(['error' => 'هذا القسم غير موجود']);

        return view('admin.settings.categories.show', compact('category','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('id', 'DESC')->find($id);
        $categories = Category::select('id', 'parent_id')->get();

        if (!$category)
            return redirect()->route('admin.settings.categories.index')->with(['error' => 'هذا القسم غير موجود']);

        return view('admin.settings.categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {

            $category = Category::find($id);

            if (!$category)
                return redirect()->route('admin.settings.categories.index')->with(['error' => 'هذا القسم غير موجود']);

            $category->update($request->all());

            // save translations
            $category->name = $request->name;
            $category->save();

            return redirect()->route('admin.settings.categories.index')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.settings.categories.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
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
            $category = Category::find($id);

            if (!$category)
                return redirect()->route('admin.settings.categories.index')->with(['error' => 'هذا القسم غير موجود']);

            $category->delete();

            return redirect()->route('admin.settings.categories.index')->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.settings.categories.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
        }
    }
}
