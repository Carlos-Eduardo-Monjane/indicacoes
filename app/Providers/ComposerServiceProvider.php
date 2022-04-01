<?php

namespace App\Providers;
use View;
use App\Cat_Profissional;
use App\SubCategory;
use App\Indicar;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){

            // Especialidades de Profissionais para o  REGISTRO
            $profissional_categories = Cat_Profissional::all();
            $profissional_subcategories = SubCategory::all();



            $seg = Carbon::now()->startOfWeek();
            $ter = $seg->copy()->addDay();
            $qua = $ter->copy()->addDay();
            $qui = $qua->copy()->addDay();
            $sex = $qui->copy()->addDay();
            $sab = $sex->copy()->addDay();
            $dom = $sab->copy()->addDay();

            
            // Profissional Dashboard
            if(Auth::check() ){

                
            $entidade = 'admin_id';
            if(Auth::user()->user_type_id == 2){
                $entidade = 'afiliado_id';
            }

            if(Auth::user()->user_type_id == 3){
                $entidade = 'profissional_id';
            }


            // Count de cada tipo de USER
            $usersAfiliados     = User::where('user_type_id',2)->get();
            $usersProfissionais = User::where('user_type_id',3)->get();


            $total_indicacoes = Indicar::where($entidade, Auth::user()->id)->get();
            $total_indicacoes_sem_contacto = Indicar::where($entidade, Auth::user()->id)->where('status','SEM CONTATO')->get();            
            $total_indicacoes_em_negociacao = Indicar::where($entidade, Auth::user()->id)->where('status','EM NEGOCIAÇÃO')->get();   
            $total_indicacoes_neg_fechado = Indicar::where($entidade, Auth::user()->id)->where('status','NEGÓCIO FECHADO')->get();   
            $total_indicacoes_sem_interesse = Indicar::where($entidade, Auth::user()->id)->where('status','NÃO TEVE INTERESSE')->get();   
            // $dayOfTheWeek = Carbon::now()->dayOfWeek;

            $now = Carbon::now();

            // relatorio semanal
            $rSegunda = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $seg)->get();
            $rTerca = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $ter)->get();
            $rQuarta = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $qua)->get();
            $rQuinta = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $qui)->get();
            $rSexta = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $sex)->get();
            $rSabado = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $sab)->get();
            $rDomingo = Indicar::where($entidade, Auth::user()->id)
            ->whereDate('created_at', $dom)->get();

            // relatorio anual
            $rJan = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '01')->get();
            $rFev = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '02')->get();
            $rMar = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '03')->get();
            $rAbr = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '04')->get();
            $rMai = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '05')->get();
            $rJun = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '06')->get();
            $rJul = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '07')->get();
            $rAgo = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '08')->get();
            $rSet = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '09')->get();
            $rOut = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '10')->get();
            $rNov = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '11')->get();
            $rDez = Indicar::where($entidade, Auth::user()->id)
            ->whereMonth('created_at', '12')->get();


        }else{
            // Sem impacto
                $total_indicacoes = Indicar::all();
                $total_indicacoes_sem_contacto = Indicar::where('status','SEM CONTATO')->get();            
                $total_indicacoes_em_negociacao = Indicar::where('status','EM NEGOCIAÇÃO')->get();   
                $total_indicacoes_neg_fechado = Indicar::where('status','NEGÓCIO FECHADO')->get(); 
                $total_indicacoes_sem_interesse =   Indicar::where('status','NÃO TEVE INTERESSE')->get(); 
                $rSegunda = Indicar::whereDate('created_at', $seg)->get();
            $rTerca = Indicar::whereDate('created_at', $ter)->get();
            $rQuarta = Indicar::whereDate('created_at', $qua)->get();
            $rQuinta = Indicar::whereDate('created_at', $qui)->get();
            $rSexta = Indicar::whereDate('created_at', $sex)->get();
            $rSabado = Indicar::whereDate('created_at', $sab)->get();
            $rDomingo = Indicar::whereDate('created_at', $dom)->get();

            // relatorio anual
            $rJan = Indicar::whereMonth('created_at', '01')->get();
            $rFev = Indicar::whereMonth('created_at', '02')->get();
            $rMar = Indicar::whereMonth('created_at', '03')->get();
            $rAbr = Indicar::whereMonth('created_at', '04')->get();
            $rMai = Indicar::whereMonth('created_at', '05')->get();
            $rJun = Indicar::whereMonth('created_at', '06')->get();
            $rJul = Indicar::whereMonth('created_at', '07')->get();
            $rAgo = Indicar::whereMonth('created_at', '08')->get();
            $rSet = Indicar::whereMonth('created_at', '09')->get();
            $rOut = Indicar::whereMonth('created_at', '10')->get();
            $rNov = Indicar::whereMonth('created_at', '11')->get();
            $rDez = Indicar::whereMonth('created_at', '12')->get();
                
            }
            
            // Count de cada tipo de USER
            $usersAfiliados     = User::where('user_type_id',2)->get();
            $usersProfissionais = User::where('user_type_id',3)->get();
   
            $view->with([
            'profissional_categories' => $profissional_categories,
            'profissional_subcategories' => $profissional_subcategories,
            'total_indicacoes' => $total_indicacoes->count(),
            'total_indicacoes_sem_contacto' => $total_indicacoes_sem_contacto->count(),
            'total_indicacoes_em_negociacao' => $total_indicacoes_em_negociacao->count(),
            'total_indicacoes_neg_fechado' => $total_indicacoes_neg_fechado->count(),
            'total_indicacoes_sem_interesse' => $total_indicacoes_sem_interesse->count(),
            
            'rSegunda'      => $rSegunda->count(),
            'rTerca'        => $rTerca->count(),
            'rQuarta'       => $rQuarta->count(),
            'rQuinta'       => $rQuinta->count(),
            'rSexta'        => $rSexta->count(),
            'rSabado'       => $rSabado->count(),
            'rDomingo'      => $rDomingo->count(),

            'rJan'      => $rJan->count(),
            'rFev'      => $rFev->count(),
            'rMar'        => $rMar->count(),
            'rAbr'       => $rAbr->count(),
            'rMai'       => $rMai->count(),
            'rJun'        => $rJun->count(),
            'rJul'       => $rJul->count(),
            'rAgo'      => $rAgo->count(),
            'rSet'      => $rSet->count(),
            'rOut'        => $rOut->count(),
            'rNov'       => $rNov->count(),
            'rDez'       => $rDez->count(),
            
            
            
            
            
            
            
            'usersAfiliados'      => $usersAfiliados->count(),
            'usersProfissionais' => $usersProfissionais->count(),
        ]);
        });
    }
}
