<?php

namespace App\Http\Controllers;

use App\Pc;
use App\Replacement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectionController extends Controller{
    function select(Request $request){
        if($request->isMethod("post")){
            $price = $request->input("price");
            $type = $request->input("pc-type");

            $pc = Pc::where('price', '=', $price)->where('computer_type', '=', $type)->get();
            $replacement = Replacement::where('price', '=', $price)->where('computer_type', '=', $type)->get();
            return view('selected-pc', compact('pc', 'replacement'));
        }else{
            return redirect("/select-pc");
        }
    }
}
