<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shop;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class UserController extends Controller
{
    // Parceiro
  
    public function perfil(){
        $user = User::find(Auth::user()->id);
        $shop = Shop::where('id' ,'=',Auth::user()->shop_id)->first();
        if(!$shop) $shop = '';
        return view('users.perfil')->with(['shop'=>$shop, 'user'=>$user,'msg' => '']);
    }
    public function perfilCriarConta(){
        $user = User::find(Auth::user()->id);
        $shop = Shop::where('id' ,'=',Auth::user()->shop_id)->first();
        return view('users.perfil')->with(['shop'=>$shop, 'user'=>$user, 'msg' => 'criar_conta']);
    }
    public function storeConta(Request $request){
        try{
            $request->validate([
                'photo_perfil' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_perfil');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }


            $shop = new Shop();
            $shop->name = $request['name'];
            $shop->user_admin = $request['user_admin'];
            $shop->description = $request['description'];
            $shop->address = $request['address'];
            $shop->phone = $request['phone'];
            $shop->email = $request['email'];
            $imageName != NULL ? $shop->photo = $photo : $shop->photo = $shop->photo;
            $shop->category_id  = 1;
            $shop->save();

            $user = User::find(Auth::user()->id);
            $shop = Auth::user()->shop;
            // return view('users.perfil')->with(['user'=>$user, 'shop'=>$shop,'msg' => 'success']);
            return redirect()->action('UserController@perfil')->with(['user'=>$user, 'shop'=>$shop,'msg' => 'success']);
           }
        catch(Exception $ex){
            return view('users.perfil')->with('msg', 'error');

        }
    }

    public function updateShop(Request $request){
        try{

            $request->validate([
                'photo_shop' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_shop');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }


            $shop = Shop::find(Auth::user()->shop_id);
            $shop->name = $request['name'];
            $shop->user_admin = $request['user_admin'];
            $shop->description = $request['description'];
            $shop->address = $request['address'];
            $shop->phone = $request['phone'];
            $shop->email = $request['email'];
            $imageName != NULL ? $shop->photo = $photo : $shop->photo = $shop->photo;
            $shop->category_id  = 1;
            $shop->save();

            $user = User::find(Auth::user()->id);
            $shop = Auth::user()->shop;
            // return view('users.perfil')->with(['user'=>$user, 'shop'=>$shop,'msg' => 'success']);
            return redirect()->action('UserController@perfil')->with(['user'=>$user, 'shop'=>$shop,'msg' => 'success']);
           }
        catch(Exception $ex){
            return view('users.perfil')->with('msg', 'error');

        }
    }

    public function perfilEditarDados(){
        $user = User::find(Auth::user()->id);
        return view('users.perfil')->with(['shop'=>'', 'user'=>$user, 'msg' => 'editar_dados']);
    }

    public function perfilEditarConta(){
        $user = User::find(Auth::user()->id);
        $shop = Shop::where('id' ,Auth::user()->shop_id)->first();
        return view('users.perfil')->with(['shop'=>$shop, 'user'=>$user, 'msg' => 'editar_conta']);
    }

    public function updatePerfil(Request $request){
        try{
            $request->validate([
                'photo_perfil' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_perfil');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }


     

            $userAUX = User::find(Auth::user()->id);
            $userAUX->name = $request['name'];
            $userAUX->biography = $request['biography'];
            $userAUX->email = $request['email'];
            $userAUX->phone = $request['phone'];
            $userAUX->category_id = $request['category'];
            $userAUX->subcategory_id = $request['subcategory'];
            $imageName != NULL ? $userAUX->photo = $photo : $userAUX->photo = $userAUX->photo;
            $userAUX->save();

            $user = User::find(Auth::user()->id);
            $shop = Shop::where('id' ,'=',$user->shop_id)->first();
            // return view('users.perfil')->with(['user'=>$user, 'shop'=>$shop,'msg' => 'success']);
            return redirect()->action('UserController@perfil')->with(['user'=>$user, 'shop'=>$shop,'msg' => 'success']);
           }
        catch(Exception $ex){
            return view('users.perfil')->with('msg', 'error');

        }
    }


    // Profissional






}
