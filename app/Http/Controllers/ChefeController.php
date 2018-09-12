<?php

namespace App\Http\Controllers;

use App\Chefe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Html;

class ChefeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(Chefe $chefe)
     {
       $this->chefe = $chefe;
     }
    public function index()
    {
      //$sar = Session::get('dono');

      $chefe = Chefe::all();
      //$diaria = Diaria::orderBy('id', 'DESC')->paginate(5);
      return view('chefe.index',compact('chefe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chefe  $chefe
     * @return \Illuminate\Http\Response
     */
    public function show(Chefe $chefe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chefe  $chefe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $chefe = Chefe::find($id);
        return view('chefe.edit', compact('chefe'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chefe  $chefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

      $chefe = Chefe::find($id);

      $data = $request->all();
      $chefe->fill($data)->save();
      Session::flash('mensagem_edit', "Cargo editado com Sucesso!");
      return redirect()->route('chefe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chefe  $chefe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chefe $chefe)
    {
        //
    }
}
