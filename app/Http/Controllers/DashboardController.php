<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diaria;
use App\User;
use App\Chefe;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Html;

use App\Pessoa;
use App\Trecho;
use App\Valor;
use App\Adm;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;

class DashboardController extends Controller
{
  private $diaria;
  private $pessoa;

  public function __construct(Diaria $diaria, Pessoa $pessoa, Valor $valor, Chefe $chefe)
  {
    $this->diaria = $diaria;
    $this->pessoa = $pessoa;
    $this->valor = $valor;
    $this->chefe = $chefe;
  }
  public function dash(){
    $sar = Session::get('dono');
    $usuario = User::where('pescodigo', '=', $sar)->first();
    return view('dashboard.index', compact('usuario'));
  }

  public function store(Request $request){

    $diaria = Diaria::create($request->all());

    //Salvar com relacionamento de trechos
    //$tr = $request->all();
    //  foreach($tr['tr'] as $values)
    //  {
    //    $diaria->trechos()->create($values);
    // teste de branch
    //  }

    Session::flash('mensagem_create', 'Ordem de serviço para o Sr. ' .$request->pnome. ' foi adicionada com sucesso!');

    return redirect()->route('ficha.index');

  }
// Retirado aprovação do chefe imediato 18/09/2018
/*  public function aprova()
  {
    $sar = Session::get('dono');
    $diaria = DB::table('diarias')
    ->where('chefe_im', '=', $sar)
    ->paginate(10000);
    //$diaria = Diaria::orderBy('id', 'DESC')->paginate(5);
    return view('adm.aprova',compact('diaria'));

  }
*/
  public function index()
  {

    $sar = Session::get('dono');

    $diaria = Diaria::where('dono', '=', $sar)->paginate(1000);
    //$diaria = Diaria::orderBy('id', 'DESC')->paginate(5);
    return view('ficha.index',compact('diaria'));

  }

  public function admin()
  {
    $url_edita = $_SERVER['PHP_SELF'];

    $diaria = Diaria::orderBy('id', 'DESC')->paginate(1000);
    //$diaria = Diaria::orderBy('id', 'DESC')->paginate(5);
    return view('adm.adms',compact('diaria', 'url_edita'));

  }

  public function tcu()
  {

    //$diaria = Diaria::orderBy('id', 'DESC')->where('concluido', '=', 'SIM')->get();
    $diaria = DB::table('diarias')
    ->where('concluido', '=', 'SIM')
    ->paginate(10000);
    //$diaria = Diaria::orderBy('id', 'DESC')->paginate(5);
    return view('tcu.tcu',compact('diaria'));

  }

  public function create()
  {
    $pessoa = $this->pessoa->all();

    $pgrad = Session::get('grad').' '.Session::get('pesncompleto');
    $login = Session::get('peslogin');
    $saram = Session::get('pescodigo');
    $cpf = Session::get('pescpf');
    $banco = Session::get('pesbanco');
    $nome_banco = Session::get('nm_banco');
    $nome_om = Session::get('nm_om');
    $agencia = Session::get('pesagencia');
    $contacorrente = Session::get('pescontacorrente');
    $datadenascimento = Session::get('pesdn');
    $pemail = Session::get('pesemail');
    $identidade = Session::get('pesidentidade');
    $ramal = Session::get('pesfonetrabramal');
    $administrador = Session::get('administrador');

    $posto = DB::table('public'. "." .'tb_pessoas')
    ->whereIn('pespostograd', [9, 10, 11, 4, 5, 8, 24, 27, 1, 3, 7, 2, 6])
    ->where('pessituacao', '=', '4')
    ->orderBy('pespostograd', 'ASC')
    ->orderBy('pesnguerra', 'ASC')
    ->get();

    $select = [];
    foreach ($posto as $postos) {
      $p = DB::table('public'. "." .'tb_posto_graduacao')
      ->select('pgabrev')
      ->where('pgid', '=', $postos->pespostograd)
      ->get();
      $p = $p[0]->pgabrev;
      $select[$postos->pescodigo] = $p. ' ' .$postos->pesnguerra. ' - ' .$postos->pesncompleto ;
    }
        return view('ficha.create', compact('administrador', 'nome_om', 'nome_banco', 'pessoa', 'pgrad', 'login', 'saram', 'cpf', 'datadenascimento', 'pemail', 'identidade', 'ramal', 'agencia', 'contacorrente', 'select'));
  }

/*  public function edit($id, Request $request){

    if(!($diaria = Diaria::find($id))) {

      throw new ModelNotFoundException("Ordem de serviço não encontrada!");

    }
    $administrador = Session::get('administrador');

    if (str_contains(Request::url(), 'apresenta')) {
      echo "apresenta";
    }else{
      echo "editando";
    };
    exit;

    return view('ficha.edit', compact('diaria', 'administrador', 'url'));
  }
*/
  public function edita($id, Request $request){

    if(!($diaria = Diaria::find($id))) {

      throw new ModelNotFoundException("Ordem de serviço não encontrada!");

    }
    $url_adm = $request->url;

    $administrador = Session::get('administrador');

    $apresenta = $request->apresenta;

    $posto = DB::table('public'. "." .'tb_pessoas')
    ->whereIn('pespostograd', [9, 10, 11, 4, 5, 8, 24, 27, 1, 3, 7, 2, 6])
    ->where('pessituacao', '=', '4')
    ->orderBy('pespostograd', 'ASC')
    ->orderBy('pesnguerra', 'ASC')
    ->get();

    $select = [];
    foreach ($posto as $postos) {
      $p = DB::table('public'. "." .'tb_posto_graduacao')
      ->select('pgabrev')
      ->where('pgid', '=', $postos->pespostograd)
      ->get();
      $p = $p[0]->pgabrev;
      $select[$postos->pescodigo] = $p. ' ' .$postos->pesnguerra. ' - ' .$postos->pesncompleto ;
    }

    $chefe = User::where('pescodigo', '=', $diaria->chefe_im)->first();
    $nome_chefe = $chefe->pesncompleto;

    $p_chefe = DB::table('public'. "." .'tb_posto_graduacao')
    ->select('pgabrev')
    ->where('pgid', '=', $chefe->pespostograd)
    ->first();
    $posto_chefe = $p_chefe->pgabrev;


    return view('ficha.edit', compact('diaria', 'administrador', 'apresenta', 'select', 'posto_chefe', 'nome_chefe', 'url_adm'));

  }

  public function show($id)
  {
    if(!($diaria = Diaria::find($id))) {

      throw new ModelNotFoundException("Ordem de serviço não encontrada!");

    }
    return view('ficha.show', compact('diaria'));

  }

  public function print($id){

    if(!($diaria = Diaria::find($id))) {

      throw new ModelNotFoundException("Ordem de serviço não encontrada!");

    }
    $chefe = User::where('pescodigo', '=', $diaria->chefe_im)->first();
    $nome_chefe = $chefe->pesncompleto;

    $p_chefe = DB::table('public'. "." .'tb_posto_graduacao')
    ->select('pgabrev')
    ->where('pgid', '=', $chefe->pespostograd)
    ->first();
    $posto_chefe = $p_chefe->pgabrev;

    $cmt_ala =  Chefe::where('cargo', '=', 'COMANDANTE DA ALA-5')->first();
    $ch_gap =  Chefe::where('cargo', '=', 'CHEFE DO GAP-CG')->first();
    $ordenador =  Chefe::where('cargo', '=', 'ORDENADOR DE DESPESAS')->first();
    $cmt_escg =  Chefe::where('cargo', '=', 'COMANDANTE DO ESCG')->first();

    Session::flash('mensagem_print', 'Ordem de serviço enviada a impressora!');
    return view('ficha.impressao', compact('diaria', 'posto_chefe', 'nome_chefe', 'cmt_ala', 'ch_gap', 'ordenador', 'cmt_escg'));
  }

  public function print_verso($id){

    if(!($diaria = Diaria::find($id))) {

      throw new ModelNotFoundException("Ordem de serviço não encontrada!");

    }
    $chefe = User::where('pescodigo', '=', $diaria->chefe_im)->first();
    $nome_chefe = $chefe->pesncompleto;

    $p_chefe = DB::table('public'. "." .'tb_posto_graduacao')
    ->select('pgabrev')
    ->where('pgid', '=', $chefe->pespostograd)
    ->first();
    $posto_chefe = $p_chefe->pgabrev;

    $cmt_ala =  Chefe::where('cargo', '=', 'COMANDANTE DA ALA-5')->first();
    $ch_gap =  Chefe::where('cargo', '=', 'CHEFE DO GAP-CG')->first();
    $ordenador =  Chefe::where('cargo', '=', 'ORDENADOR DE DESPESAS')->first();
    $cmt_escg =  Chefe::where('cargo', '=', 'COMANDANTE DO ESCG')->first();

    Session::flash('mensagem_print', 'Ordem de serviço enviada a impressora!');
    return view('ficha.impressao_verso', compact('diaria', 'posto_chefe', 'nome_chefe', 'cmt_ala', 'ch_gap', 'ordenador', 'cmt_escg'));
  }


  public function update(Request $request, $id){

    if (!($diaria = Diaria::find($id))){
      throw new ModelNotFoundException("OS não encontrada!");
    }

    $url_recebida = $request->caminho;

    $data = $request->all();
    $diaria->fill($data)->save();
    Session::flash('mensagem_edit', "Ordem de Serviço editada com Sucesso!");
    if ($url_recebida ==  '/index.php/verTodasOs') {
      return redirect()->route('verTodasOs');
    }
    return redirect()->route('ficha.index');
  }

  public function destroy($id){

    if (!($diaria = Diaria::find($id))){
      throw new ModelNotFoundException("OS não encontrada!");
    }

    $diaria->delete();
    Session::flash('mensagem_del', "Ordem de Serviço deletada com Sucesso!");
    return redirect()->route('ficha.index');

  }
}
