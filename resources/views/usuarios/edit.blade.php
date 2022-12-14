@extends('adminlte::page')

@section('title', config('adminlte.title')." - Editar Usuários")

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Editar Usuário</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Cadastro</a></li>
            <li class="breadcrumb-item active">Usuário</li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card card-gray mb-0 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-pencil-alt mr-2"></i>
                Editar Usuário
            </h3>
        </div>
    </div>
    <form action={{ route('usuarios.edit', $user->id) }} method="POST" enctype="multipart/form-data"
        class="form-fluid p-4 rounded shadow bg-white">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNome">
                   <i class="fas fa-edit"></i> Nome
                </label>
                <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id="inputNome" placeholder="Nome" name="name">
            </div>

            <div class="form-group col-md-6">
                <label for="inputEmail">
                   <i class="far fa-envelope"></i> E-mail
                </label>
                <input type="text" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    id="inputEmail" placeholder="E-mail" name="email">
            </div>
        </div>
       <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword">
                         <i class="fas fa-fingerprint"></i> Senha
                    </label>
                    <input type="password" class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        id="inputPassword"  name="password" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">
                        <i class="fas fa-fingerprint"></i> Confirma
                    </label>
                    <input type="password" class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                        id="inputEmail"  name="password_confirmation" >
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('password') }}
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('password_confirmation') }}
                </div>
            </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">
                   <i class="fas fa-fw fa-user-tag"></i> Tipo de usuario
                </label>

                                                        <select class="form-select form-control select2 select2-danger"
                                                            data-dropdown-css-class="select2-danger" id="typeuser_id"
                                                            name="typeuser_id" style="width: 100%;">
                                                            <option selected="selected" disabled>Selecione um tipo de usuário...
                                                            </option>
                                                            @foreach ($typeusers as $typeuser)
                                                            <option value="{{$typeuser->id}}"
                                                                {{ old('em') == $typeuser->id ? 'selected' : ''}}>
                                                                {{$typeuser->name}}</option>
                                                            @endforeach
                                                        </select>
            </div>
            <div class="form-group col-md-6">

            </div>
        </div>

            <div class="form-row">
                <button type="submit" class="btn btn-secondary mt-2">Salvar</button>
                <a class="ml-3" href="{{ route('usuarios.list')}}"><button type="button" class="btn btn-danger mt-2 ">Voltar</button></a>
            </div>


    </form>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script>
        $(".cnpj").mask('00.000.000/0000-00')
        $('.phone').mask('(00) 00000-0000');
    </script>

@stop
