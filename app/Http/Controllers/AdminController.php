<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shop;
use App\Indicar;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

class AdminController extends Controller
{
                    // Minha Conta (ADMIN)
                    public function indexMyPerfil(){
                        $user = User::find(Auth::user()->id);
            $shop = Shop::where('id' ,'=',Auth::user()->shop_id)->first();
            if(!$shop) $shop = '';
            return view('users.perfil')->with(['shop'=>$shop, 'user'=>$user,'msg' => '']);
                    }


    // Buscar a tabela de clientes
    public function indexAfiliado(){
        $afiliados = User::where('user_type_id',2)->get();
        return view('admin.users')->with(["lista"=>$afiliados,"user_type"=>"Lista de Afiliados","msg" => 'afiliado']);

    }
        // Buscar a tabela de Profissionais
        public function indexProfissionais(){
            $pro = User::where('user_type_id',3)->get();
            return view('admin.users')->with(["lista"=>$pro,"user_type"=>"Lista de Profissionais","msg" => 'pro']);
    
        }
            // Buscar a tabela de Parceiros
    public function indexIndicacoes(){
        $indicacoes = Indicar::orderBy('created_at', 'DESC')->get();
        return view('admin.users')->with(["lista"=>$indicacoes,"user_type"=>"Lista de Indicações","msg" => 'indicar']);

    }

                // Bloquear User
                public function blockUser(Request $request){

                    $user = User::find($request['id_user']);
                    $user->status == 'nao-autorizado'? $user->status = 'autorizado' : $user->status = 'nao-autorizado';
                    $user->save();

                    $users = User::where('user_type_id',$request['id_user_type'])->get();
                    return view('admin.users')->with(["users"=>$users,"user_type"=>"Lista de usuários","msg" => 'success']);
            
                }

                // Delete User
                public function deleteUser(Request $request){

                    $user = User::find($request['id_user']);
                    $user->delete();

                    $users = User::where('user_type_id',$request['id_user_type'])->get();

                    return view('admin.users')->with(["users"=>$users,"user_type"=>"Lista de usuários","msg" => 'success']);
            
                }
                
    //NEWS
                
                // Delete News
    public function deleteNews(Request $request){
    
    $new = News::find($request['id_news']);
    $new->delete();
    
    $news = News::all();
    
    return view('main')->with(["news"=>$news, 'msg'=> 'success']);
    
    }
    
                    // Add News 
    public function storeNews(Request $request){
        
                    $request->validate([
                'photo_news' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_news');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }
                        
        
    
    $news =  new News();
$news->title = $request['title'];
$news->message = $request['message'];
$imageName != NULL ? $news->photo = $photo : $news->photo = NULL;
$news->save();
    
    
    
    $news = News::all();
    
    return view('main')->with(["news"=>$news,'msg'=> 'success']);
    
    }
    
    public function modalStoreNews(Request $request){
            $news = News::all();
    
    return view('main')->with(["news"=>$news, 'msg' => 'modal_store_news']);

    }

    public function modalDeleteNews(Request $request){
        
        $new = News::find($request['id_news']);
        
            $news = News::all();
    
    return view('main')->with(["news"=>$news, 'msg' => 'modal_delete_news', 'new'=> $new]);

    }

    public function modalEditNews(Request $request){
        
        $new = News::find($request['id_news']);
        
            $news = News::all();
    
    return view('main')->with(["news"=>$news, 'msg' => 'modal_edit_news', 'new'=> $new]);

    }

    public function updateNews(Request $request){
        try{
                    $request->validate([
                'photo_news' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_news');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }

    $news = News::find($request['id_news']);
$news->title = $request['title'];
$news->message = $request['message'];
$imageName != NULL ? $news->photo = $photo : $news->photo = $news->photo;
$news->save();
    
    
    
    $news = News::all();
    
    return view('main')->with(["news"=>$news, 'msg'=> 'success']);

           }
        catch(Exception $ex){
                $news = News::all();

            return view('main')->with(["news"=>$news, 'msg'=>'error']);

        }
    }

}
