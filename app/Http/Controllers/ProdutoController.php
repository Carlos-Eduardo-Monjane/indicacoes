<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Cat_Product;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use File;

class ProdutoController extends Controller
{
    
    public function index(Request $request){
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => '']);

    }

    public function createCategoria(Request $request){
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();

        // return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'modal_categories']);

        return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'modal_categories']);
           
    }

    


    public function storeCategpria(Request $request){
        try{
            $categoria = new Cat_Product();
            $categoria->name = $request['name'];
            $categoria->shop_id = $request['shop_id'];
            $categoria->save();

            $categorias = Cat_Product::where('shop_id' ,'=',$request['shop_id'])->get();
            $produtos   = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
            return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'success']);
           }
        catch(Exception $ex){
            return view('parceiro.produtos')->with('msg', 'error');

        }
    }

    public function createProduto(Request $request){
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'modal_cad_produto']);

    }
    public function storeProduto(Request $request){
        try{

             $request->validate([
                'photo_product' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_product');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }



            $produto = new Produto();
            $produto->name     = $request['name'];
            $produto->shop_id  = $request['shop_id'];
            $produto->code     = $request['code'];
            $produto->price    = $request['price'];
            $produto->photo    = $photo;
            $produto->quantity = $request['quantity'];
            $produto->product_category_id = $request['idC'];
            $produto->product_type_id  = 1;//produto fisico
            $produto->save();

            $categorias = Cat_Product::where('shop_id' ,'=',$request['shop_id'])->get();
            $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
            return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'success']);
           }
        catch(Exception $ex){
            return view('parceiro.produtos')->with('msg', 'error');

        }
    }

    //produto apagar
    public function confirmdelete(Request $request){
        $produto = Produto::find($request['idproduto']);
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with(['produto'=>$produto, "categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'modal_delete_produto']);

    }

    public function confirmEditarProdutos(Request $request){
        $produto = Produto::find($request['idproduto']);
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with(['produto'=>$produto, "categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'modal_editar_produto']);
    }

    public function updateProduto(Request $request){
        try{

                    $request->validate([
                'photo_product' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = $request->file('photo_product');

            if($imageName != NULL){
                $extension = $imageName->getClientOriginalExtension();
                Storage::disk('public')->put(time().'.'.$imageName->getFilename().'.'.$extension,  File::get($imageName));
    
                $photo = time().'.'.$imageName->getFilename().'.'.$extension;  
            }



            $produto = Produto::find($request['idproduto']);
            $produto->name = $request['name'];
            $produto->shop_id = $request['shop_id'];
            $produto->code = $request['code'];
            $produto->price = $request['price'];
            $produto->photo    = $photo;
            $produto->quantity = $request['quantity'];
            $produto->product_category_id = $request['idC'];
            $produto->save();

            $categorias = Cat_Product::where('shop_id' ,'=',$request['shop_id'])->get();
            $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
            return view('parceiro.produtos')->with(["categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'success']);
           }
        catch(Exception $ex){
            return view('parceiro.produtos')->with('msg', 'error');

        }
    }


    public function destroyProduto(Request $request){
        $produto = Produto::find($request['idproduto']);
        $produto->delete();
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with([ "categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'success']);

    }

     //produto apagar
     public function confirmdeleteCategoria(Request $request){
        $categoria = Cat_Product::find($request['idcategoria']);
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with(['categoria'=>$categoria, "categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'modal_delete_categoria']);

    }

    public function destroyCategoria(Request $request){
        $categoria = Cat_Product::find($request['idcategoria']);
        $categoria->delete();
        $categorias = Cat_Product::where('shop_id','=',$request['shop_id'])->get();
        $produtos = Produto::where('shop_id' ,'=',$request['shop_id'])->get();
        return view('parceiro.produtos')->with(['categoria'=>$categoria, "categorias"=>$categorias,"produtos"=>$produtos,'msg' => 'success']);

    }


   




}
