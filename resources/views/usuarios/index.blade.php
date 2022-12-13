@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Cadastrar Usuário</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produtos.list') }}">Cadastro</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
    </div>
@stop


@section('content')
    <div class="">
        <div class="card card-gray mb-0 shadow-sm">
            <div class="card-header">
                <h3 class="card-title">
                    <x-bi-file-text-fill class="mr-2 h1" style="width: 24px; height: 24px" />Formulário de Cadastro
                </h3>
            </div>
        </div>
        <form action={{ route('produtos.store') }} method="POST" class="form-fluid p-4 rounded shadow"
            style="background: white;">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNomeProduto">
                        <x-bi-folder-fill class="mr-2" />Nome
                    </label>
                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="inputNomeProduto" placeholder="Nome da Produto" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">
                        <x-bi-envelope-fill class="mr-2" />Preço
                    </label>
                    <input type="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        id="inputEmail" placeholder="email@gmail.com" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('name') }}
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCNPJ">
                        <x-bi-file-person-fill class="mr-2" />CNPJ
                    </label>
                    <input type="text" class="form-control cnpj {{ $errors->has('CNPJ') ? 'is-invalid' : '' }}"
                        id="inputCNPJ" placeholder="00.000.000-0000/00" name="CNPJ" value="{{ old('CNPJ') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTelefone">
                        <x-bi-telephone-fill class="mr-2" />Telefone
                    </label>
                    <input type="text" class="form-control phone {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                        id="telefone" placeholder="(00) 00000-0000" name="telefone" value="{{ old('telefone') }}" />
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('CNPJ') }}
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('telefone') }}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputObs">
                        <x-bi-chat-left-text-fill class="mr-2" />Observação
                    </label>
                    <textarea type="textarea" class="form-control" id="inputObs" placeholder="Observação" name="observacao">
                    </textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary btn-md">Cadastrar</button>
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
