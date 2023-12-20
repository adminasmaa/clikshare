<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    function __construct()
    {
        $this->middleware('permission:View Dashboard', ['only' => ['index']]);
    }

    public function index()
    {
        return view('moderator.dashboard');
    }
}
