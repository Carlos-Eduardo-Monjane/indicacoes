<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissional_Favorito;
use App\User;
use App\Shop;
use App\Indicar;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class ProfissionalFavoritoController extends Controller
{
    
        public function my_pro_index(){
            $fav_pro = Profissional_Favorito::with('pro_favorito.shop')
            ->with('pro_favorito.specialty')
            ->with('pro_favorito.oferta_do_profissinal')
            ->with('pro_favorito.subspecialty')->where('cliente_id', Auth::user()->id)->get();
            $fav_pro_count = $fav_pro->count();
            return view('cliente.favorito_pro')->with(["profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count, 'msg' => 'my_pro']);
           }

           public function my_pro_delete(Request $request){

            $fav_pro_delete = Profissional_Favorito::find($request['profissional_id']);
            $fav_pro_delete->delete();

            $fav_pro = Profissional_Favorito::with('pro_favorito.shop')
            ->with('pro_favorito.specialty')
            ->with('pro_favorito.oferta_do_profissinal')
            ->with('pro_favorito.subspecialty')->where('cliente_id', Auth::user()->id)->get();
            $fav_pro_count = $fav_pro->count();
            return view('cliente.favorito_pro')->with(["profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count, 'msg' => 'my_pro_success']);
           }

           public function add_new_pro_index(){
            $fav_pro = User::with('shop')
            ->with('specialty')
            ->with('subspecialty')
            ->with('oferta_do_profissinal')
            ->where('user_type_id', 3)
            ->whereNotNull('shop_id')->get();

            $fav_pro_count = $fav_pro->count();

            return view('cliente.favorito_pro_novo')->with(["profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count, 'msg' => 'add_new_pro']);
           }

           public function model_store_on_fav(Request $request){
            $entidade = 'admin_id';
            if(Auth::user()->user_type_id == 2){
                $entidade = 'afiliado_id';
            }
            if(Auth::user()->user_type_id == 3){
                $entidade = 'profissional_id';
            }

            $fav_pro = Profissional_Favorito::with('pro_favorito.shop')
            ->with('pro_favorito.specialty')
            ->with('pro_favorito.oferta_do_profissinal')
            ->with('pro_favorito.subspecialty')->where('cliente_id', Auth::user()->id)->get();
            $fav_pro_count = $fav_pro->count();

    
            $profissional_invest = User::find($request['professional_id']);

            return view('cliente.favorito_pro')->with(["profissional_invest"=>$profissional_invest, "profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count, 'msg' => 'modal_store_inv']);
          
            //  return view('cliente.favorito_pro')->with(["profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count, "profissional_invest"=>$profissional_invest, 'msg' => 'modal_store']);
        }

           public function add_new_pro_store(Request $request){

            $fav_validate = Profissional_Favorito::where('profissional_id',$request['profissional_id'])
            ->where('cliente_id',$request['cliente_id'])->first();

            if($fav_validate){ 
                // Nao pode adicionar o mesmo profissional sendo favorito
                $fav_pro = User::with('shop')
                ->with('specialty')
                ->with('subspecialty')
                ->with('oferta_do_profissinal')
                ->where('user_type_id', 3)
                ->whereNotNull('shop_id')->get();

                $fav_pro_count = $fav_pro->count();
                return view('cliente.favorito_pro_novo')->with(["profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count , 'msg' => 'add_new_pro_error']);
               

            } else{

                $pro_store_fav = new Profissional_Favorito();
                $pro_store_fav->cliente_id = $request['cliente_id'];
                $pro_store_fav->profissional_id = $request['profissional_id'];
                $pro_store_fav->save();
    
    
                $fav_pro = Profissional_Favorito::with('pro_favorito.shop')
                ->with('pro_favorito.specialty')
                ->with('pro_favorito.oferta_do_profissinal')
                ->with('pro_favorito.subspecialty')->where('cliente_id', Auth::user()->id)->get();
                $fav_pro_count = $fav_pro->count();
                return view('cliente.favorito_pro')->with(["profissionais"=>$fav_pro, "fav_pro_count"=>$fav_pro_count, 'msg' => 'my_pro_success']);
              
            }

   }
}
