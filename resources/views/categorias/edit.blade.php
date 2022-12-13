@extends('adminlte::page')

@section('title', config('adminlte.title')." - Editar Produto")

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Editar Categoria</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Cadastro</a></li>
            <li class="breadcrumb-item active">Categoria</li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card card-gray mb-0 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-pencil-alt mr-2"></i>
                Editar Categoria
            </h3>
        </div>
    </div>
    <form action={{ route('categorias.edit', $categoria->id) }} method="POST" enctype="multipart/form-data"
        class="form-fluid p-4 rounded shadow bg-white">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNomeCategoria">
                   <i class="fas fa-edit"></i> Nome
                </label>
                <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id="inputNomeCategoria" placeholder="Nome" name="name" value="{{$categoria->name}}">
            </div>

            <div class="form-group col-md-6">

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">

            </div>
            <div class="form-group col-md-6">

            </div>
        </div>

            <div class="form-row">
                <button type="submit" class="btn btn-secondary mt-2">Salvar</button>
                <a class="ml-3" href="{{ route('categorias.list')}}"><button type="button" class="btn btn-danger mt-2 ">Voltar</button></a>
            </div>


    </form>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script>
        $(".cnpj").mask('00.000.000/0000-00')
        $('.phone').mask('(00) 00000-0000');
    </script>

@stop
