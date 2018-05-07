@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-center">Você está logado!</h4>
                    <a href="/">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Listar Usuários</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
