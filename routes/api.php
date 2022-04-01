<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\News;
use App\Produto;
use App\Cat_Profissional;


/* Setup CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Config para o Aplicativo */

// LOGIN CLIENTE : CHECKED
Route::post('login', function (Request $request) {
    
    if($request->input('email') == null 
    || $request->input('password') == null ) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha todos campos!",
            'code' => 401,
                                ], 401);
    }
    
    
    
    
    $user = User::where('email',$request->input('email'))->first();
    
    if($user != null){
        
            if($user->user_type_id != 4){// 4 é cliente
                
                                            return response()->json([
            'status' => 'error',
            'message' => "Não tem permissão ao aplicativo!",
            'code' => 401,
                                ], 401);
            }
            else if($user->status != 'autorizado'){// 4 é cliente
                
                        return response()->json([
        'status' => 'error',
        'message' => "Não tem permissão ao aplicativo!",
        'code' => 401,
        ], 401);
        }
            // SUCESSO 
            else if(Hash::check($request->input('password'), $user->password)){
                
                // $historico = Historico::where('iduser',$user->id)->orderBy('created_at', 'desc')->get();
                // $conta = Conta::where('iduser',$user->id)->first();
                
                        return response()->json([
            'status' => 'success',
            'message' => 'Perfil do usuario',
            'perfil' => $user,
        //     'historico' => $historico,
        //     'carteira' => $conta,
            'code' => 200,
                                ], 200);
            }
            
            else{
                                return response()->json([
            'status' => 'error',
            'message' => "Senha inválida!",
            'code' => 401,
                                ], 401);
            }

    
    } else{
                return response()->json([
        'status' => 'error',
        'message' => "Usuário não encontrado!",
        'code' => 401,
                            ], 401);
        
    }
    
});

// REGISTRO CLIENTE : CHECKED
Route::post('register', function (Request $request) {
    
    if($request->input('email') == null 
    || $request->input('password') == null 
    || $request->input('name') == null 
        || $request->input('phone') == null 
        || $request->input('state') == null
            || $request->input('city') == null) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha todos campos!",
            'code' => 401,
                                ], 401);
    }
    
        $user_exists = User::where('email',$request->input('email'))->first();
        if($user_exists != null){
                return response()->json([
            'status' => 'error',
            'message' => "Este email já foi usado por outro usuário!",
            'code' => 401,
                                ], 401);
        }
        
    
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
                        $user->state = $request['state'];
                                    $user->city = $request['city'];
                                      $user->address = $request['address'];
            $user->phone = $request['phone'];
            $user->password = bcrypt($request['password']);
            $user->status = "autorizado";
            $user->user_type_id = 4;

            if($user->save()){
                
                return response()->json([
        'status' => 'success',
        'message' => 'Registrado com sucesso! Agora pode fazer o login.',
        'perfil' => $user,
        'code' => 200,
                            ], 200);
            } else {
                return response()->json([
        'status' => 'error',
        'message' => "Erro ao registrar!",
        'code' => 401,
                            ], 401);
            }
            
    
});

// GET ALL USER EXCEPT ADMIN MASTER AND CLIENTS USER'S : CHECKED
Route::get('users', function (Request $request) {
    
    
        $users = User::where('user_type_id', 2)->orWhere('user_type_id', 3)->where('status','!=', 'nao-autorizado')->get();


        return response()->json([
        'status' => 'success',
        'message' => 'Parceiros e Profissionais',
        'users' => $users,
        'code' => 200,
                            ], 200);
  
});

// GET ALL PROFISSIONAL USER'S : CHECKED
Route::get('profissional_users', function (Request $request) {
    
    
        $users = User::with('specialty')->where('user_type_id', 2)->where('status','!=', 'nao-autorizado')->get();


        return response()->json([
        'status' => 'success',
        'message' => 'Profissionais',
        'users' => $users,
        'code' => 200,
                            ], 200);
  
});

// GET ALL NEWS : CHECKED
Route::get('news', function (Request $request) {
    
        $news = News::all();

        return response()->json([
        'status' => 'success',
        'message' => 'Noticias',
        'news' => $news,
        'code' => 200,
                            ], 200);
  
});

// GET ALL Cat_Profissionais : CHECKED
Route::get('cat_profissional', function (Request $request) {
    
        $cat_profissional = Cat_Profissional::all();

        return response()->json([
        'status' => 'success',
        'message' => 'Categoria de Profissionais',
        'cat_profissional' => $cat_profissional,
        'code' => 200,
                            ], 200);
  
});

// GET ALL SHOP'S WITH RESPECTIVES ADMIN'S (PARCEIRO) AND PRODUTCS : CHECKED
Route::get('shops', function (Request $request) {
    
        // $shops = Cat_Profissional::all();

        $shops = User::with('shop.products')->where('shop_id','!=',NULL)->get();

        return response()->json([
        'status' => 'success',
        'message' => 'Lojas com o administrador e os respectivos produtos',
        'body' => $shops,
        'code' => 200,
                            ], 200);
  
});

// SEARCH PROFISSIONAL WITH (specialty, state, city)
Route::post('search/profissional', function (Request $request) {
    
        if($request->input('specialty_id') == null 
        && $request->input('state') == null 
        && $request->input('city') == null ) 
        {
                return response()->json([
                'status' => 'error',
                'message' => "Sem nenhum paramétro de pesquisa!",
                'code' => 401,
                                    ], 401);
        } else{
                $users = User::with('specialty')->where('specialty_id','!=',NULL);

        if($request->input('specialty_id') != null ) $users = $users->where('specialty_id',$request->input('specialty_id'));
        if($request->input('state')        != null ) $users = $users->where('state',$request->input('state'));
        if($request->input('city')         != null ) $users = $users->where('city',$request->input('city'));


                $users = $users->get();
                $count = $users->count();


                return response()->json([
                        'status' => 'success',
                        'message' => 'Pesquisa feita com sucesso',
                        'perfil' => $users,
                        'count' => $count,
                        'code' => 200,
                                            ], 200);

        }


                  
                
                
        
    });




// CARTEIRA OU CONTA E HISTORICO - EXTRATO POR INTERVALO DE DATA
Route::post('extrairPorIntervalo', function (Request $request) {
    
$from = $request['dataDe'];
$to = $request['dataAte'];
                $historico= Historico::where('iduser',$request['id'])->whereBetween('created_at', [$from.' 00:00:00',$to.' 23:59:59'])->orderBy('created_at', 'desc')
        ->get();
                $conta = Conta::where('iduser',$request['id'])->first();


        return response()->json([
        'status' => 'success',
        'message' => 'Carteira e Historico Por Intervalo de Datas',
        'historico' => $historico,
        'carteira' => $conta,
        'code' => 200,
                            ], 200);

            
    
});

// SOLICITAR SAQUE OU DEPOSITO
Route::post('pedirSaqueOuDeposito', function (Request $request) {
    
        if($request->input('valor') == null) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha todos campos!",
            'code' => 401,
                                ], 401);
    }
    
            $note = new Notification();

            $note->iduser = $request['id'];
            $note->assunto = $request['assunto'];
            $note->valor = $request['valor'];
            $note->estado = '0';
            $note->nome = $request['nome'];
            $note->save();


        return response()->json([
        'status' => 'success',
        'message' => 'Solicitação feita com sucesso! Brevemente entraremos em contato consigo.',
        'code' => 200,
                            ], 200);

});

// GUARDAR DEVICE TOKEN
Route::post('setarDeviceToken', function (Request $request) {
    
                $user = User::find($request['id']);
                $user->device_token = $request['device_token'];
                $user->save();


        return response()->json([
        'status' => 'success',
        'message' => 'Device Token Setado - FCM', 
        'code' => 200,
                            ], 200);

            
    
});

// ACTUALIZAR PERFIL
Route::post('updatePerfil', function (Request $request) {
    
            if($request->input('valor') == null) 
    {
            return response()->json([
            'status' => 'error',
            'message' => "Preecha o campo!",
            'code' => 401,
                                ], 401);
    }
    
                $user = User::find($request['id']);
                $variavel = $request['atributo'];
                
                $user->$variavel = $request['valor'];
                
                
                

        if($user->save()){
             $user = User::where('id',$request->input('id'))->first();
                    return response()->json([
        'status' => 'success',
        'message' => 'Actualizado com sucesso', 
        'perfil' => $user,
        'code' => 200,
                            ], 200);
        } else {
                    return response()->json([
        'status' => 'error',
        'message' => 'Erro ao actualizar', 
        'code' => 401,
                            ], 401);
        }



            
    
});






