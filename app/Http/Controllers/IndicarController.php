<?php

namespace App\Http\Controllers;

use App\Indicar;
use App\Cat_Product;
use Illuminate\Http\Request;
use App\User;
use App\Shop;
use App\Oferta;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;



class IndicarController extends Controller
{
    public function index(){

        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';
        }

        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();

        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados, "indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => '']);
       }

    public function model_store_index(Request $request){
        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';
        }

        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();

        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados, "indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => 'modal_cad_produto']);

    }

    public function model_store(Request $request){
        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';
        }

        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();

        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados, "indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => 'modal_store']);
    }

    public function model_edit(Request $request){
        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';
        }

        $indicar = Indicar::find($request['id']);
        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();

        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados, "indicacao"=>$indicar,"indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => 'model_edit']);
    }

    public function model_delete(Request $request){
        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';
        }
        

        $indicar = Indicar::find($request['id']);
        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();
        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados, "indicacao"=>$indicar,"indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => 'modal_delete']);
    }

    public function editIndicarDelete(Request $request){
        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';
        }

        
        $indicar = Indicar::find($request['id']);
        $indicar->delete();

        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();
        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados,"indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => '']);
    }

    public function editIndicarStatus(Request $request){
        $indicar = Indicar::find($request['id']);


        $entidade = 'admin_id';
        if(Auth::user()->user_type_id == 2){
            $entidade = 'afiliado_id';

            $indicacao->cliente_nome  = $request['cliente_nome'];
            $indicacao->cliente_phone = $request['cliente_phone'];
            $indicacao->cliente_email = $request['cliente_email'];
            $indicar->obs = $request['obs'];
        }
        if(Auth::user()->user_type_id == 3){
            $entidade = 'profissional_id';

            $indicar->status = $request['status'];
        }

        $indicar->save();

        $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
        $indicacoes_count = $indicacoes->count();
        $afiliados = User::where('user_type_id', 2)->get();
        $profissionais = User::where('user_type_id', 3)->get();
        return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados,"indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => '']);
    }
    
    public function storeIndicarManual(Request $request){
        try{
            $entidade = 'admin_id';
            if(Auth::user()->user_type_id == 2){
                $entidade = 'afiliado_id';

                $oferta = Oferta::where('profissional_id',$request['profissional_id'])->first();

                $indicacao = new Indicar();
                $indicacao->profissional_id = $request['profissional_id'];
                $indicacao->afiliado_id = Auth::user()->id ;
                if($oferta)
                $indicacao->oferta_id = $oferta->id;
                $indicacao->manual = false;
                $indicacao->cliente_nome  = $request['cliente_nome'];
                $indicacao->cliente_phone = $request['cliente_phone'];
                $indicacao->cliente_email = $request['cliente_email'];
                $indicacao->obs = $request['obs'];
                $indicacao->save();
            }


            if(Auth::user()->user_type_id == 3){
                $entidade = 'profissional_id';

                $oferta = Oferta::where('profissional_id',Auth::user()->id)->first();


                $indicacao = new Indicar();
                $indicacao->profissional_id = Auth::user()->id;
                $indicacao->afiliado_id = $request['afiliado_id'];
                if($oferta)
                $indicacao->oferta_id = $oferta->id;
                $indicacao->manual = true;
                $indicacao->cliente_nome  = $request['cliente_nome'];
                $indicacao->cliente_phone = $request['cliente_phone'];
                $indicacao->cliente_email = $request['cliente_email'];
                $indicacao->obs = $request['obs'];
                $indicacao->save();
            }




            $indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
            $indicacoes_count = $indicacoes->count();
            $afiliados = User::where('user_type_id', 2)->get();
            $profissionais = User::where('user_type_id', 3)->get();

            return view('parceiro.indicacao')->with(["profissionais"=>$profissionais,"afiliados"=>$afiliados,"indicacoes"=>$indicacoes, "indicacoes_count"=>$indicacoes_count, 'msg' => 'success']);}
        catch(Exception $ex){
            return view('parceiro.indicacao')->with('msg', 'error');

        }
    }
}
