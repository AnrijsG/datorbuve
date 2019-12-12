<?php

namespace App\Http\Controllers;

use App\Pc;
use App\Replacement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectionController extends Controller{
    /** @var integer */
    private $price;

    /** @var string */
    private $type;

    private $variables = [
        'mobo',
        'cpu',
        'gpu',
        'ram',
        'storage',
        'psu',
        'case'
    ];

    /**
     * @param $name
     * @return mixed
     */
    function searchReplacement($name){
        return Replacement::where('price', '=', $this->price)->where('computer_type', '=', $this->type)->where('component', '=', $name)->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    function select(Request $request){
        if($request->isMethod("post")){
            $this->price = round($request->input("price") / 100);
            $this->type = $request->input("pc-type");

            $pc = Pc::where('price_category', '=', $this->price)->where('computer_type', '=', $this->type)->get();
            $replacement = array();
            foreach($this->variables as $k => $v){
                $replacement[$v] = self::searchReplacement($v);
            }

            return view('selected-pc', compact('pc', 'replacement'));
        }else{
            return redirect("/select-pc");
        }
    }
}
