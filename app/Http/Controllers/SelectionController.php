<?php

namespace App\Http\Controllers;

use App\Pc;
use App\Replacement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectionController extends Controller{
    private $price = 0;
    private $type = '';

    function searchReplacement($name){
        return Replacement::where('price', '=', $this->price)->where('computer_type', '=', $this->type)->where('component', '=', $name)->get();
    }

    function select(Request $request){
        if($request->isMethod("post")){
            $this->price = $request->input("price");
            $this->type = $request->input("pc-type");

            $pc = Pc::where('price_category', '=', $this->price)->where('computer_type', '=', $this->type)->get();
            $replacement = array();
            $replacement['mobo'] = self::searchReplacement('mobo');
            $replacement['cpu'] = self::searchReplacement('cpu');
            $replacement['gpu'] = self::searchReplacement('gpu');
            $replacement['ram'] = self::searchReplacement('ram');
            $replacement['storage'] = self::searchReplacement('storage');
            $replacement['psu'] = self::searchReplacement('psu');
            $replacement['case'] = self::searchReplacement('case');

            return view('selected-pc', compact('pc', 'replacement'));
        }else{
            return redirect("/select-pc");
        }
    }
}
