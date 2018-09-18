<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pessoa;
use App\Valor;
use App\Adm;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;



class LogInController extends Controller
{
  public function doLogin(Request $request)
  {
//logando no domínio GAPCG  - comentar este bloco caso não queira logar no domínio------------------------------------------------------
// Lembrar de alterar na view login o campo cpf para peslogin
    $srv = "10.152.16.174";
    $usr = $request->get('cpf');
    $pwd = $request->get('password');

    function valida_ldap($srv, $usr, $pwd){
      $ldap_server = $srv;
      $auth_user = $usr;
      $auth_pass = $pwd;

          // Tenta se conectar com o servidor
          if (!($connect = @ldap_connect($ldap_server))) {
          return FALSE;
          }

          // Tenta autenticar no servidor
          if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
          // se não validar retorna false
          return FALSE;
          } else {
          // se validar retorna true
          return TRUE;
          }

      }
      $server = "10.152.16.174"; //IP ou nome do servidor
      $dominio = "@gapcg.intraer"; //Dominio Ex: @gmail.com
      $user_r = $usr.$dominio;
      $pass = $pwd;

      if (!(valida_ldap($server, $user_r, $pass))) {
        Session::flash('mensagem_autentica', 'Não autenticado no domínio GAPCG. Tente novamente!');
        return redirect()->route('inicio');
      } else {

        $saram = DB::table('public'. "." .'tb_pessoas')
        ->select('pescodigo')
        ->where('pescpf', '=', $usr)
        ->get();
        $saram = $saram[0]->pescodigo;

// ------------------------------------------------------------------------------------
//lembrar de comentar o fechamento do else lá em baixo

    // verifica se é Adm
    //se não autenticar no domínio, comentar a linha de baixo e descomentar a próxima
    $adm1 = Adm::where('pescodigo', '=', $saram)->first();

    //$adm1 = Adm::where('pescodigo', '=', $request->get('pescodigo'))->first();
    $adm2='';
    if ($adm1) {
      $adm2 = $adm1->pescodigo;
    }

    if ($adm2) {
      $administrador='';
      Session::put('administrador', $adm2);
    }
    //--------------------------------------

    $usuario = User::where('pescodigo', '=', $saram)->first();

    //se não autentica no domínio, descomentar as linhas de baixo e comentar a de de cima
    //$usuario = User::where('pescodigo', '=', $request->get('pescodigo'))->first();
    //$senha = User::where('sasis_senha', '=', $request->get('password'))->first();
    $posto = DB::table('public'. "." .'tb_posto_graduacao')
    ->select('pgabrev')
    ->where('pgid', '=', $usuario->pespostograd)
    ->get();
    $posto = $posto[0]->pgabrev;

    if ($usuario->pesbanco == NULL) {
      Session::flash('mensagem_sembanco', 'Não existem dados bancários cadastrados no SIMS para o SARAM: '.$usuario->pescodigo.'. Entre em contado com a sua ajudância/secretaria para realizar o cadastro!');
      return redirect()->action('HomeController@index');
    }

    $valor1 = DB::table('diarias'. "." .'tb_valores_diaria')
    ->where([
      ['posto', '=', $posto],
      ['cidades', '=', 'val_br_am_rj']
      ])->get();
      $valor2 = DB::table('diarias'. "." .'tb_valores_diaria')
      ->where([
        ['posto', '=', $posto],
        ['cidades', '=', 'val_bh_fl_pa_rc_sl_sp']
        ])->get();
        $valor3 = DB::table('diarias'. "." .'tb_valores_diaria')
        ->where([
          ['posto', '=', $posto],
          ['cidades', '=', 'val_capitais']
          ])->get();
          $valor4 = DB::table('diarias'. "." .'tb_valores_diaria')
          ->where([
            ['posto', '=', $posto],
            ['cidades', '=', 'val_cidades']
            ])->get();

            //$valor1 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_br_am_rj');
            $val1_1 = $valor1[0]->valor;
            //$valor2 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_bh_fl_pa_rc_sl_sp');
            $val2_2 = $valor2[0]->valor;
            //$valor3 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_capitais');
            $val3_3 = $valor3[0]->valor;
            //$valor4 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_cidades');
            $val4_4 = $valor4[0]->valor;

            //Abrindo as seções

              $grad='';
              Session::put('grad', $posto);
              $pgrad = Session::get('grad');

              $val1='';
              Session::put('val1', $val1_1);
              $valor_1 = Session::get('val1');

              $val2='';
              Session::put('val2', $val2_2);
              $valor_2 = Session::get('val2');

              $val3='';
              Session::put('val3', $val3_3);
              $valor_3 = Session::get('val3');

              $val4='';
              Session::put('val4', $val4_4);
              $valor_4 = Session::get('val4');

              $peslogin='';
              Session::put('peslogin', $usuario->peslogin);
              $value = Session::get('peslogin');

              $pesncompleto='';
              Session::put('pesncompleto', $usuario->pesncompleto);
              $nomecompleto = Session::get('pesncompleto');

              $pescodigo='';
              Session::put('pescodigo', $usuario->pescodigo);
              $saram = Session::get('pescodigo');

              $pescpf='';
              Session::put('pescpf', $usuario->pescpf);
              $cpf = Session::get('pescpf');

              $pesbanco='';
              Session::put('pesbanco', $usuario->pesbanco);
              $banco = Session::get('pesbanco');

              $nm_banco = DB::table('tb_bancos')
              ->select('banconome')
              ->where('bancoid', '=', $usuario->pesbanco)
              ->get();
              $nm_banco = $nm_banco[0]->banconome;
              $nmbanco='';
              Session::put('nm_banco', $nm_banco);
              $nmbanco = Session::get('nm_banco');

              $nm_om = DB::table('tb_om')
              ->select('omdesc')
              ->where('omid', '=', $usuario->pesom)
              ->get();
              $nm_om = $nm_om[0]->omdesc;
              $nmom='';
              Session::put('nm_om', $nm_om);
              $nmom = Session::get('nm_om');

              $pesagencia='';
              Session::put('pesagencia', $usuario->pesagencia);
              $banco = Session::get('pesagencia');

              $pescontacorrente='';
              Session::put('pescontacorrente', $usuario->pescontacorrente);
              $banco = Session::get('pescontacorrente');

              $pesdn='';
              Session::put('pesdn', $usuario->pesdn);
              $datadenascimento = Session::get('pesdn');

              $pesemail='';
              Session::put('pesemail', $usuario->pesemail);
              $pemail = Session::get('pesemail');

              $pesidentidade='';
              Session::put('pesidentidade', $usuario->pesidentidade);
              $identidade = Session::get('pesidentidade');

              $pesfonetrabramal='';
              Session::put('pesfonetrabramal', $usuario->pesfonetrabramal);
              $ramal = Session::get('pesfonetrabramal');

              $pesnguerra='';
              Session::put('pesnguerra', $usuario->pesnguerra);
              $guerra = Session::get('pesnguerra');

              $dono='';
              Session::put('dono', $usuario->pescodigo);

              return view('dashboard.index', compact('usuario', 'posto', 'adm2', 'valor1', 'nmbanco'));
            //comentar a linha de baixo caso não queira fazer login no AD
          }
        }
          //-------------------------------------------------------------------------------------

          public function outro(Request $request)
          {

            Session::pull('grad');
            Session::pull('val1');
            Session::pull('val2');
            Session::pull('val3');
            Session::pull('val4');
            Session::pull('peslogin');
            Session::pull('pesncompleto');
            Session::pull('pescodigo');
            Session::pull('pescpf');
            Session::pull('pesbanco');
            Session::pull('pesdn');
            Session::pull('pesemail');
            Session::pull('pesidentidade');
            Session::pull('pesfonetrabramal');
            Session::pull('pesnguerra');
            Session::pull('nm_banco');
            Session::pull('nm_om');
            Session::pull('pesagencia');
            Session::pull('pescontacorrente');

            $usuario = User::where('pescodigo', '=', $request->get('outro_militar'))->first();

		if (!$usuario){
//			return Redirect::back();
//			return Redirect::back()->with('success', ['Usuário não cadastrado no SIMS']);
			session()->flash('msg', 'Usuário não cadastrado no SIMS.');
			    return redirect()->route('voltarPerfil');
		}

            $posto = DB::table('tb_posto_graduacao')
            ->select('pgabrev')
            ->where('pgid', '=', $usuario->pespostograd)
            ->get();
            $posto = $posto[0]->pgabrev;

            //echo $usuario->pescodigo;
            //echo $usuario->pesbanco;
            //var_dump($usuario);
            //exit;

            if ($usuario->pesbanco == NULL) {
              Session::flash('mensagem_sembanco', 'Não existem dados bancários cadastrados no SIMS para o SARAM: '.$usuario->pescodigo.'. Entre em contado com a sua ajudância/secretaria para realizar o cadastro!');
              //echo  '<script>alert("");</script>';
              return redirect()->action('LogInController@volta_perfil');
            }

            $valor1 = DB::table('diarias'. "." .'tb_valores_diaria')
            ->where([
              ['posto', '=', $posto],
              ['cidades', '=', 'val_br_am_rj']
              ])->get();
              $valor2 = DB::table('diarias'. "." .'tb_valores_diaria')
              ->where([
                ['posto', '=', $posto],
                ['cidades', '=', 'val_bh_fl_pa_rc_sl_sp']
                ])->get();
                $valor3 = DB::table('diarias'. "." .'tb_valores_diaria')
                ->where([
                  ['posto', '=', $posto],
                  ['cidades', '=', 'val_capitais']
                  ])->get();
                  $valor4 = DB::table('diarias'. "." .'tb_valores_diaria')
                  ->where([
                    ['posto', '=', $posto],
                    ['cidades', '=', 'val_cidades']
                    ])->get();

                    //$valor1 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_br_am_rj');
                    $val1_1 = $valor1[0]->valor;
                    //$valor2 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_bh_fl_pa_rc_sl_sp');
                    $val2_2 = $valor2[0]->valor;
                    //$valor3 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_capitais');
                    $val3_3 = $valor3[0]->valor;
                    //$valor4 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_cidades');
                    $val4_4 = $valor4[0]->valor;


                    $grad='';
                    Session::put('grad', $posto);
                    $pgrad = Session::get('grad');

                    $val1='';
                    Session::put('val1', $val1_1);
                    $valor_1 = Session::get('val1');

                    $val2='';
                    Session::put('val2', $val2_2);
                    $valor_2 = Session::get('val2');

                    $val3='';
                    Session::put('val3', $val3_3);
                    $valor_3 = Session::get('val3');

                    $val4='';
                    Session::put('val4', $val4_4);
                    $valor_4 = Session::get('val4');

                    $peslogin='';
                    Session::put('peslogin', $usuario->peslogin);
                    $value = Session::get('peslogin');

                    $pesncompleto='';
                    Session::put('pesncompleto', $usuario->pesncompleto);
                    $nomecompleto = Session::get('pesncompleto');

                    $pescodigo='';
                    Session::put('pescodigo', $usuario->pescodigo);
                    $saram = Session::get('pescodigo');

                    $pescpf='';
                    Session::put('pescpf', $usuario->pescpf);
                    $cpf = Session::get('pescpf');

                    $pesbanco='';
                    Session::put('pesbanco', $usuario->pesbanco);
                    $banco = Session::get('pesbanco');

                    $nm_banco = DB::table('tb_bancos')
                    ->select('banconome')
                    ->where('bancoid', '=', $banco)
                    ->get();
                    $nm_banco = $nm_banco[0]->banconome;
                    $nmbanco='';
                    Session::put('nm_banco', $nm_banco);
                    $nmbanco = Session::get('nm_banco');

                    $nm_om = DB::table('tb_om')
                    ->select('omdesc')
                    ->where('omid', '=', $usuario->pesom)
                    ->get();
                    $nm_om = $nm_om[0]->omdesc;
                    $nmom='';
                    Session::put('nm_om', $nm_om);
                    $nmom = Session::get('nm_om');

                                  $pesagencia='';
                                  Session::put('pesagencia', $usuario->pesagencia);
                                  $banco = Session::get('pesagencia');

                                  $pescontacorrente='';
                                  Session::put('pescontacorrente', $usuario->pescontacorrente);
                                  $banco = Session::get('pescontacorrente');

                    $pesdn='';
                    Session::put('pesdn', $usuario->pesdn);
                    $datadenascimento = Session::get('pesdn');

                    $pesemail='';
                    Session::put('pesemail', $usuario->pesemail);
                    $pemail = Session::get('pesemail');

                    $pesidentidade='';
                    Session::put('pesidentidade', $usuario->pesidentidade);
                    $identidade = Session::get('pesidentidade');

                    $pesfonetrabramal='';
                    Session::put('pesfonetrabramal', $usuario->pesfonetrabramal);
                    $ramal = Session::get('pesfonetrabramal');

                    $pesnguerra='';
                    Session::put('pesnguerra', $usuario->pesnguerra);
                    $guerra = Session::get('pesnguerra');

                    return view('dashboard.index', compact('usuario', 'posto', 'dono', 'nmbanco'));
                  }

                  //-------------------------------------------------------------------------------------
                  // Quando o usuário quer voltar para seu perfil novamente
                  public function volta_perfil(Request $request)
                  {
                    Session::pull('grad');
                    Session::pull('val1');
                    Session::pull('val2');
                    Session::pull('val3');
                    Session::pull('val4');
                    Session::pull('peslogin');
                    Session::pull('pesncompleto');
                    Session::pull('pescodigo');
                    Session::pull('pescpf');
                    Session::pull('pesbanco');
                    Session::pull('pesdn');
                    Session::pull('pesemail');
                    Session::pull('pesidentidade');
                    Session::pull('pesfonetrabramal');
                    Session::pull('pesnguerra');
                    Session::pull('nm_banco');
                    Session::pull('nm_om');
                    Session::pull('pesagencia');
                    Session::pull('pescontacorrente');

                    $eu = Session::get('dono');
                    $usuario = User::where('pescodigo', '=', $eu)->first();
                    $posto = DB::table('tb_posto_graduacao')
                    ->select('pgabrev')
                    ->where('pgid', '=', $usuario->pespostograd)
                    ->get();
                    $posto = $posto[0]->pgabrev;


                    $adm1 = Adm::where('pescodigo', '=', $eu)->first();

                    //$adm1 = Adm::where('pescodigo', '=', $request->get('pescodigo'))->first();
                    $adm2='';
                    if ($adm1) {
                      $adm2 = $adm1->pescodigo;
                    }

                    if ($adm2) {
                      $administrador='';
                      Session::put('administrador', $adm2);
                    }

                    $valor1 = DB::table('diarias'. "." .'tb_valores_diaria')
                    ->where([
                      ['posto', '=', $posto],
                      ['cidades', '=', 'val_br_am_rj']
                      ])->get();
                      $valor2 = DB::table('diarias'. "." .'tb_valores_diaria')
                      ->where([
                        ['posto', '=', $posto],
                        ['cidades', '=', 'val_bh_fl_pa_rc_sl_sp']
                        ])->get();
                        $valor3 = DB::table('diarias'. "." .'tb_valores_diaria')
                        ->where([
                          ['posto', '=', $posto],
                          ['cidades', '=', 'val_capitais']
                          ])->get();
                          $valor4 = DB::table('diarias'. "." .'tb_valores_diaria')
                          ->where([
                            ['posto', '=', $posto],
                            ['cidades', '=', 'val_cidades']
                            ])->get();

                            //$valor1 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_br_am_rj');
                            $val1_1 = $valor1[0]->valor;
                            //$valor2 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_bh_fl_pa_rc_sl_sp');
                            $val2_2 = $valor2[0]->valor;
                            //$valor3 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_capitais');
                            $val3_3 = $valor3[0]->valor;
                            //$valor4 = Valor::where('posto', '=', $posto)->where('cidades', '=', 'val_cidades');
                            $val4_4 = $valor4[0]->valor;

                            $grad='';
                            Session::put('grad', $posto);
                            $pgrad = Session::get('grad');

                            $val1='';
                            Session::put('val1', $val1_1);
                            $valor_1 = Session::get('val1');

                            $val2='';
                            Session::put('val2', $val2_2);
                            $valor_2 = Session::get('val2');

                            $val3='';
                            Session::put('val3', $val3_3);
                            $valor_3 = Session::get('val3');

                            $val4='';
                            Session::put('val4', $val4_4);
                            $valor_4 = Session::get('val4');

                            $peslogin='';
                            Session::put('peslogin', $usuario->peslogin);
                            $value = Session::get('peslogin');

                            $pesncompleto='';
                            Session::put('pesncompleto', $usuario->pesncompleto);
                            $nomecompleto = Session::get('pesncompleto');

                            $pescodigo='';
                            Session::put('pescodigo', $usuario->pescodigo);
                            $saram = Session::get('pescodigo');

                            $pescpf='';
                            Session::put('pescpf', $usuario->pescpf);
                            $cpf = Session::get('pescpf');

                            $pesbanco='';
                            Session::put('pesbanco', $usuario->pesbanco);
                            $banco = Session::get('pesbanco');

                            $nm_banco = DB::table('tb_bancos')
                            ->select('banconome')
                            ->where('bancoid', '=', $usuario->pesbanco)
                            ->get();
                            $nm_banco = $nm_banco[0]->banconome;
                            $nmbanco='';
                            Session::put('nm_banco', $nm_banco);
                            $nmbanco = Session::get('nm_banco');

                            $nm_om = DB::table('tb_om')
                            ->select('omdesc')
                            ->where('omid', '=', $usuario->pesom)
                            ->get();
                            $nm_om = $nm_om[0]->omdesc;
                            $nmom='';
                            Session::put('nm_om', $nm_om);
                            $nmom = Session::get('nm_om');


                                          $pesagencia='';
                                          Session::put('pesagencia', $usuario->pesagencia);
                                          $banco = Session::get('pesagencia');

                                          $pescontacorrente='';
                                          Session::put('pescontacorrente', $usuario->pescontacorrente);
                                          $banco = Session::get('pescontacorrente');

                            $pesdn='';
                            Session::put('pesdn', $usuario->pesdn);
                            $datadenascimento = Session::get('pesdn');

                            $pesemail='';
                            Session::put('pesemail', $usuario->pesemail);
                            $pemail = Session::get('pesemail');

                            $pesidentidade='';
                            Session::put('pesidentidade', $usuario->pesidentidade);
                            $identidade = Session::get('pesidentidade');

                            $pesfonetrabramal='';
                            Session::put('pesfonetrabramal', $usuario->pesfonetrabramal);
                            $ramal = Session::get('pesfonetrabramal');

                            $pesnguerra='';
                            Session::put('pesnguerra', $usuario->pesnguerra);
                            $guerra = Session::get('pesnguerra');

                            $dono='';
                            Session::put('dono', $usuario->pescodigo);

                            return view('dashboard.index', compact('usuario', 'posto', 'nmbanco'));

                          }
                          //-------------------------------------------------------------------------------------
                          //-------------------------------------------------------------------------------------


                          public function getSignOut() {
                            Session::flush();
                            $dono = '';
                            return view('home');
                          }

                        }
