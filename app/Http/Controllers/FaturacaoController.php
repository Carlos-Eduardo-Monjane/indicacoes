<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Cat_Product;
use Illuminate\Http\Request;
use App\User;

class FaturacaoController extends Controller
{
    
    public function index(){
        return view('faturacao.faturacao')->with(['msg' => '']);

    }
  

}
