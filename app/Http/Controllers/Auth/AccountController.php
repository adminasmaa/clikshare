<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class AccountController extends Controller
{
    public function viewAccount() {
        $payment_methods = PaymentMethod::orderBy('created_at')->where('payment_status',1)->select('id','payment_title')->get();
        return view('auth.view_account',compact('payment_methods'));
    }

    public function storeUser(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|unique:users,email',
                'mobile' => 'required|regex:/(05)[0-9]/|min:10|max:10',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required|same:password|min:8',
                'company_name' => 'nullable|string',
                'full_name' => 'nullable|string',
                'phone_number' => 'nullable',
                'country_name' => 'required|string',
                'city_name' => 'nullable|string',
                'postal_code' => 'nullable',
                'full_address' => 'nullable|string',
                'name_in_passport' => 'nullable|string',
                'company_name_in_cr' => 'nullable|string',
                'cr_document' => 'nullable',
                'vat_document' => 'nullable',
                'id_document' => 'nullable',
                'passport_document' => 'nullable',
                'is_est' => 'required',
                'is_merchant' => 'required'
            ]);
            $user = new User();
            $user->name = $request->is_est === "1" ? $request->company_name : $request->full_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->user_type =  $request->is_merchant === "1" ? 3 : 4;
            $user->mobile = $request->mobile;
            $user->save();
            if($request->is_merchant === "1") {
                $user->assignRole([2]);
            } else {
                $user->assignRole([3]);
            }
            $user_detail = new UserDetail();
            $user_detail->user_id = $user->id;
            $user_detail->phone_number = $request->phone_number ?? null;
            $user_detail->country_name = $request->country_name ?? null;
            $user_detail->city_name = $request->city_name ?? null;
            $user_detail->postal_code = $request->postal_code ?? null;
            $user_detail->full_address = $request->full_address ?? null;
            if($request->is_est === "1") {
                $user_detail->user_type = 1;
                $user_detail->company_name = $request->company_name;
                $user_detail->company_name_in_cr = $request->company_name_in_cr;
                if ($request->file('cr_document') && $request->file('vat_document')) {
                    $CRFileUploaded = $request->file('cr_document');
                    $VATFileUploaded = $request->file('vat_document');
                    $CRFileDBName = 'CR-'.random_int(1000,9999).'-'.now()->year.'-'.now()->month.'.'.$CRFileUploaded->getClientOriginalExtension();
                    $VATFileDBName = 'VAT-'.random_int(1000,9999).'-'.now()->year.'-'.now()->month.'.'.$VATFileUploaded->getClientOriginalExtension();
                    //Name of our directory
                    $dir_name ='PartnersAttachments';
                    //check if the directory with the name already exists
                    if (!is_dir($dir_name)) {
                        //Create our directory if it does not exist
                        mkdir($dir_name);
                    }
                    $destinationPath = 'PartnersAttachments';
                    $CRFileUploaded->move($destinationPath,$CRFileDBName);
                    $VATFileUploaded->move($destinationPath,$VATFileDBName);
                    $user_detail->cr_document = $CRFileDBName;
                    $user_detail->vat_document = $VATFileDBName;
                }
            } else {
                $user_detail->user_type = 0;
                $user_detail->full_name = $request->full_name;
                $user_detail->name_in_passport = $request->name_in_passport;
                if ($request->file('id_document') && $request->file('passport_document')) {
                    $IDFileUploaded = $request->file('id_document');
                    $PASSPORTFileUploaded = $request->file('passport_document');
                    $IDFileDBName = 'ID-'.random_int(1000,9999).'-'.now()->year.'-'.now()->month.'.'.$IDFileUploaded->getClientOriginalExtension();
                    $PASSPORTFileDBName = 'PASSPORT-'.random_int(1000,9999).'-'.now()->year.'-'.now()->month.'.'.$PASSPORTFileUploaded->getClientOriginalExtension();
                    //Name of our directory
                    $dir_name ='PartnersAttachments';
                    //check if the directory with the name already exists
                    if (!is_dir($dir_name)) {
                        //Create our directory if it does not exist
                        mkdir($dir_name);
                    }
                    $destinationPath = 'PartnersAttachments';
                    $IDFileUploaded->move($destinationPath,$IDFileDBName);
                    $PASSPORTFileUploaded->move($destinationPath,$PASSPORTFileDBName);
                    $user_detail->id_document = $IDFileDBName;
                    $user_detail->passport_document = $PASSPORTFileDBName;
                }
            }
            $user_detail->save();
            $payment_methods_values = $request->input('payment_methods_values');
            $payment_methods_types = $request->input('payment_methods_types');
            $payment_methods = [];
            foreach($payment_methods_values as $key => $payment) {
                $payment_methods[$payment] = ['account_name' => $payment_methods_types[$key]];
            }
            $user->payment_methods()->attach($payment_methods);
            return redirect()->route('login')->with('success',Lang::get('admin.User created successfully'));
        } catch (Exception $ex) {
            return redirect()->back()->with('failed',Lang::get('admin.Something was wrong please try again'));
        }
    }
}
