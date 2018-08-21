@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Logout</div>

                <div class="panel-body">
                  <div class="col-md-2">
                    <img src="/bst/brasao.png" class="img-responsive" alt="" height="70em" width="70em" />
                  </div>
                    Você saiu do sistema ATRIX! <br><br>
                    Ir para página do <a href="http://10.152.16.203/gapcg">GAP-CG</a> ou <a href="http://10.152.16.203/ala5">NuALA5</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
