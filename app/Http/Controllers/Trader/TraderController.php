<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;


class TraderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
//        $this->middleware('permission:View Trader', ['only' => ['index']]);
//        $this->middleware('permission:Add Trader', ['only' => ['create', 'store']]);
//        $this->middleware('permission:AView All Trader', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:Delete Trader', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (isset($id)) {
            $trader = User::find($id);


            return view('trader.users.edit', compact('trader'));


        } else {

            return back()->with('error id not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,

            'mobile' => 'required|regex:/(05)[0-9]/|min:6'
        ]);

//        try {
//            DB::beginTransaction();
        $trader = User::find($id);
        $trader->name = $request->name;
        $trader->email = $request->email;
        $trader->mobile = $request->mobile;
        $trader->user_type = 3;
        if ($request->has('password')) {
            $trader->password = Hash::make($request->password);
        }
        $trader->save();


// upload all files can do helpers and use composer dumpautoload and dynamic function to use to upload all images in one function and use name function with parameter here way to another upload
        if ($request->file('cr_document')) {
            $PPFileUploaded = $request->file('cr_document');
            $PPFileDBName = 'Trader-' . random_int(1000, 9999) . '-' . now()->year . '-' . now()->month . '.' . $PPFileUploaded->getClientOriginalExtension();
            //Name of our directory
            $dir_name = 'TradersAttachments';
            //check if the directory with the name already exists
            if (!is_dir($dir_name)) {
                //Create our directory if it does not exist
                mkdir($dir_name);
            }
            $destinationPath = 'TradersAttachments';
            $PPFileUploaded->move($destinationPath, $PPFileDBName);
        }

        if ($request->file('passport_document')) {
            $PPFileUploaded = $request->file('passport_document');
            $PPFileDBNamePassport = 'Trader-' . random_int(1000, 9999) . '-' . now()->year . '-' . now()->month . '.' . $PPFileUploaded->getClientOriginalExtension();
            //Name of our directory
            $dir_name = 'TradersAttachments';
            //check if the directory with the name already exists
            if (!is_dir($dir_name)) {
                //Create our directory if it does not exist
                mkdir($dir_name);
            }
            $destinationPath = 'TradersAttachments';
            $PPFileUploaded->move($destinationPath, $PPFileDBNamePassport);
        }

        if ($request->file('vat_document')) {
            $PPFileUploaded = $request->file('vat_document');
            $PPFileDBNameVat = 'Trader-' . random_int(1000, 9999) . '-' . now()->year . '-' . now()->month . '.' . $PPFileUploaded->getClientOriginalExtension();
            //Name of our directory
            $dir_name = 'TradersAttachments';
            //check if the directory with the name already exists
            if (!is_dir($dir_name)) {
                //Create our directory if it does not exist
                mkdir($dir_name);
            }
            $destinationPath = 'TradersAttachments';
            $PPFileUploaded->move($destinationPath, $PPFileDBNameVat);
        }

        $detail = UserDetail::where('user_id', $id)->first();
        UserDetail::updateOrCreate(['user_id' => $id], [
            'user_id' => $id,
            'company_name' => $request->company_name,
            'full_name' => $request->name,
            'phone_number' => $request->phone_number,
            'country_name' => $request->country_name,
            'full_address' => $request->full_address,
            'name_in_passport' => $request->name_in_passport,
            'company_name_in_cr' => $request->company_name_in_cr,
            'id_document' => $request->id_document,
            'cr_document' => $PPFileDBName ?? $detail->cr_document,
            'passport_document' => $PPFileDBNamePassport ?? $detail->passport_document,
            'vat_document' => $PPFileDBNameVat ?? $detail->vat_document,

        ]);

        return back()->with('success', Lang::get('trader.Trader updated successfully'));
//        return redirect()->route('trader.traders.index')->with('success', Lang::get('trader.Trader updated successfully'));
//
//        } catch (\Exception $ex) {
//            dd($ex);
//            DB::rollback();
//            return redirect()->route('trader.traders.index')->with(['error' => 'حدث خطأ ما برجاء المحاولة لاحقاً']);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
