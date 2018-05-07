@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-start">
                        <h4 class="text-center font-weight-bold">Usuários</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        @can('isAdmin')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">Novo Usuário</button>
                        @endcan
                        
                    </div>
                </div>
            </div>
            <div class="card-body col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Nascimento</th>
                            <th scope="col">Salário</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)                        
                        <tr>
                            <td>
                                <img class="img-thumbnail img-profile" src="{{ asset('imagens/' . $user->foto)}}" alt="Foto Usuário">
                            </td>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->cargo}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td class="align-middle">{{$user->telefone}}</td>
                            <td class="align-middle">{{$user->dt_nascto}}</td>
                            <td class="align-middle">{{$user->salario}}</td>
                            <td class="align-middle">
                                @can('isAdmin')
                                    <a class="btn btn-warning btn-sm"  href="/users/{{$user->id}}/editar">Editar</a>
                                    <a class="btn btn-danger btn-sm"   href="/users/{{$user->id}}/excluir">Excluir</a>
                                @endcan
                                
                                @can('isModerator')
                                    <a class="btn btn-warning btn-sm"  href="/users/{{$user->id}}/editar">Editar</a>
                                @endcan

                                @can('isEditor')
                                    <a class="btn btn-warning btn-sm"  href="/users/{{$user->id}}/editar">Editar</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal para cadastro de novo usuário --}}
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="Modal de Cadastro" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="container-fluid">
                  
                        {!! Form::open(['url'=>'users/salvar', 'enctype'=>'multipart/form-data']) !!}
                            {!! Form::label('name', 'Nome')!!}
                            {!! Form::input('text', 'name', null, ['required', 'class'=>'form-control','placeholder'=>'Nome do Usuário']) !!}

                            {!! Form::label('foto', 'Foto')!!}
                            {!! Form::input('file', 'foto', null, ['accept'=>'image/jpeg', 'class'=>'form-control']) !!}             
                            
                            {!! Form::label('email', 'E-mail')!!}
                            {!! Form::input('text', 'email', null, ['required', 'class'=>'form-control','placeholder'=>'E-mail']) !!}

                            {!! Form::label('password', 'Senha')!!}
                            {!! Form::input('password', 'password', null, ['required', 'class'=>'form-control','placeholder'=>'Senha']) !!}
                    
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
@endsection