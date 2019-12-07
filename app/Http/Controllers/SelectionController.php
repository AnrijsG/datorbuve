<?php

namespace App\Http\Controllers;

use App\Pc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectionController extends Controller{
    function select(Request $request){
        if($request->isMethod("post")){
            $price = $request->input("price");
            $type = $request->input("pc-type");
            $pc = Pc::all();

            return view('selected-pc', compact('pc'));
        }else{
            return redirect("/select-pc");
        }
    }
}
