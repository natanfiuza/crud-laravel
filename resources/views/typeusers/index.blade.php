@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Cadastrar Tipo de Usuário</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('marcas.list') }}">Cadastro</a></li>
            <li class="breadcrumb-item active">Tipo de Usuários</li>
        </ol>
    </div>
@stop
@vite('resources/js/app.js')

@section('content')
    <div class="">
        <div class="card card-gray mb-0 shadow-sm">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-file-alt mr-2 "></i> Formulário de Cadastro
                </h3>
            </div>
        </div>
        <form action={{ route('typeusers.store') }} method="POST" class="form-fluid p-4 rounded shadow"
            style="background: white;">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">
                        <i class="fas fa-edit"></i> Nome
                    </label>
                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="inputNome" placeholder="Nome" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">

                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('name') }}
                </div>
            </div>
            <div class="form-row">

                    <button type="submit" class="btn btn-secondary btn-md">Cadastrar</button>


                    <a class="ml-3" href="{{ route('typeusers.list') }}"><button type="button"
                            class="btn btn-danger btn-md ">Voltar</button></a>

            </div>
    </div>
    </form>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script>
        $(".cnpj").mask('00.000.000/0000-00')
        $('.phone').mask('(00) 00000-0000');
    </script>

@stop
