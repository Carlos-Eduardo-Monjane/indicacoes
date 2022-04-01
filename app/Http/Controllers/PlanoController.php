<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Cat_Product;
use Illuminate\Http\Request;
use App\User;

class PlanoController extends Controller
{
    
    public function index(){
        return view('plano.plano')->with(['msg' => '']);
    }

}
