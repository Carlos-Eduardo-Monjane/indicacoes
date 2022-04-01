<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Cat_Product;
use Illuminate\Http\Request;
use App\User;
use App\Shop;
use App\News;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;



class OfertaController extends Controller
{
    public function index(){
        $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
        $ofertas_count = $ofertas->count();
        return view('parceiro.oferta')->with(["ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => '']);
       }

    public function model_store(Request $request){
        $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
        $ofertas_count = $ofertas->count();
        return view('parceiro.oferta')->with(["ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => 'modal_store']);
    }

    public function model_edit(Request $request){
        $oferta = Oferta::find($request['id']);
        $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
        $ofertas_count = $ofertas->count();
        return view('parceiro.oferta')->with(["oferta"=>$oferta,"ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => 'model_edit']);
    }

    public function model_delete(Request $request){
        $oferta = Oferta::find($request['id']);
        $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
        $ofertas_count = $ofertas->count();
        return view('parceiro.oferta')->with(["oferta"=>$oferta,"ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => 'modal_delete']);
    }

    public function editOfertaDelete(Request $request){
        $oferta = Oferta::find($request['id']);
        $oferta->delete();

        $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
        $ofertas_count = $ofertas->count();
        return view('parceiro.oferta')->with(["ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => '']);
    }

    public function editOfertaStatus(Request $request){
        $request->validate([
            'photo_oferta' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = $request->file('photo_oferta');

        if($imageName != NULL){
            $extension = $imageName->getClientOriginalExtension();
            Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));

            $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
        }

        $oferta = Oferta::find($request['id']);

        $imageName != NULL ? $oferta->photo = $photo : $oferta->photo = $oferta->photo;
        $oferta->title = $request['title'];
        $oferta->validate = $request['validate'];
        $oferta->describe = $request['describe'];
        $oferta->save();

        $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
        $ofertas_count = $ofertas->count();
        return view('parceiro.oferta')->with(["ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => '']);
    }
    
    public function storeOfertaManual(Request $request){
        try{

            $request->validate([
                'photo_oferta' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_oferta');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }



            $oferta = new Oferta();
            $oferta->profissional_id = Auth::user()->id;
            $imageName != NULL ? $oferta->photo = $photo : $oferta->photo = $oferta->photo;
            $oferta->title = $request['title'];
            $oferta->validate = $request['validate'];
            $oferta->describe = $request['describe'];
            $oferta->save();


            $ofertas = Oferta::where('profissional_id', Auth::user()->id)->get();
            $ofertas_count = $ofertas->count();
            return view('parceiro.oferta')->with(["ofertas"=>$ofertas, "ofertas_count"=>$ofertas_count, 'msg' => '']);}
        catch(Exception $ex){
            return view('parceiro.oferta')->with('msg', 'error');

        }
    }
}
