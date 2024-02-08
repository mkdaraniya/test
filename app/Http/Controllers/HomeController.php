<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('home');
    }

    public function userList()
    {

        $type = auth()->guard('admin')->user()->type;


        if ($type == 1) {
            $users = User::get();
            return view('admin', compact('users'));
        } else {
            $users = User::get();
            return view('super-admin', compact('users'));
        }
    }

    public function calculation(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'calculation' => 'required',

        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        if ($request->has('calculation')) {
            $input = $request->calculation;
            $open = strpos($input, "(");
            $close = strpos($input, ")");
            $firstVal = strstr($input, "A", true);
            // $middleVal = strstr($input, "A", false);

            $inputText = substr($input, $open + 1, $close - $open - 1);
            

            $inputVal = explode(",",$inputText);
            // print_r($inputVal);
            die;
        }

        // return back()->withInput($request->only('calculation'));
    }
}
