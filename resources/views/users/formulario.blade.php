@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-10 order-1">
                <div class="card card-primary ">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 d-flex justify-content-start">
                                    <h4>Altere as Informações do Usuário</h4>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                    <a class='pull-right text-white' href="/"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">Listar Usuários</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user,['method'=>'PATCH', 'url'=>'users/atualizar/'.$user->id, 'enctype'=>'multipart/form-data']) !!}
                            {!! Form::label('name', 'Nome')!!}
                            {!! Form::input('text', 'name', null, ['required', 'class'=>'form-control','placeholder'=>'Nome do Usuário']) !!}

                            {!! Form::label('foto', 'Foto')!!}
                            {!! Form::input('file', 'foto', null, ['accept'=>'image/jpeg', 'class'=>'form-control']) !!}             
                            
                            {!! Form::label('email', 'E-mail')!!}
                            {!! Form::input('text', 'email', null, ['required', 'class'=>'form-control','placeholder'=>'E-mail']) !!}
                  
                            {!! Form::label('telefone', 'Telefone')!!}
                            {!! Form::input('number', 'telefone', null, ['maxlength'=>'12', 'class'=>'form-control','placeholder'=>'(XX)XXXXX-XXXX']) !!}

                            {!! Form::label('cargo', 'Cargo')!!}

                            <select class="custom-select" name="select_role">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" id="{{$role->name}}">{{ $role->name}}</option>
                                @endforeach
                            </select>             

                            {!! Form::label('dt_nascto', 'Data de Nascimento')!!}
                            {!! Form::input('date', 'dt_nascto', null, ['class'=>'form-control','placeholder'=>'DD\MM\AAAA']) !!}                                                     

                            {!! Form::label('salario', 'Salário')!!}
                            {!! Form::input('number', 'salario', null, ['step'=>'.01', 'class'=>'form-control']) !!}

                            <br>
                            {!! Form::submit('Salvar',['class'=>'btn btn-success']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection