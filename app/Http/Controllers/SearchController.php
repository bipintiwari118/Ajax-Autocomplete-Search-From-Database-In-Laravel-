<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function searchList(Request $req){
        if($req->ajax()){
            $product = Product::where('name','LIKE',$req->name.'%')->get();
            $output = '';
            if(count($product)>0){
                $output = '<ul class="list-group">';
                    foreach($product as $data){
                        $output .='<li class="list-group-item">'. $data->name .'</li>';
                    }

                $output .='</ul>';

            }else{
                $output .='<li class="list-group-item">Data Not Found.</li>';
            }
            return $output;
        }
        return view('product');
    }
}
