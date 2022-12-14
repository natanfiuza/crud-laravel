@extends('adminlte::page')

@section('title', config('adminlte.title')." - Editar Produto")

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Editar Produto</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Cadastro</a></li>
            <li class="breadcrumb-item active">Produto</li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card card-gray mb-0 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-pencil-alt mr-2"></i>
                Editar Produto
            </h3>
        </div>
    </div>
    <form action={{ route('produtos.edit', $produto->id) }} method="POST" enctype="multipart/form-data"
        class="form-fluid p-4 rounded shadow bg-white">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNomeProduto">
                   <i class="fas fa-edit"></i> Nome
                </label>
                <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id="inputNomeProduto" placeholder="Nome" name="name">
            </div>

            <div class="form-group col-md-6">
                <label for="inputPrice">
                   <i class="fas fa-dollar-sign"></i> Preço
                </label>
                <input type="text" class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }} price"
                    id="inputPrice" placeholder="Preço do produto" name="price" value="{{$produto->price}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCategoria">
                   <i class="fas fa-tags"></i> Categoria
                </label>

                                                        <select class="form-select select2 select2-danger"
                                                            data-dropdown-css-class="select2-danger" id="categoria_id"
                                                            name="categoria_id" style="width: 100%;">
                                                            <option selected="selected" disabled>Selecione uma categoria...
                                                            </option>
                                                            @foreach ($categorias as $categoria)
                                                            <option value="{{$categoria->id}}"
                                                                {{ old('em') == $categoria->id ? 'selected' : ''}}>
                                                                {{$categoria->name}}</option>
                                                            @endforeach
                                                        </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMarca">
                   <i class="fas fa-copyright"></i> Marca
                </label>
                        <select class="form-select select2 select2-danger"
                                                            data-dropdown-css-class="select2-danger" id="marca_id"
                                                            name="marca_id" style="width: 100%;">
                                                            <option selected="selected" disabled>Selecione uma marca...
                                                            </option>
                                                            @foreach ($marcas as $marca)
                                                            <option value="{{$marca->id}}"
                                                                {{ old('em') == $marca->id ? 'selected' : ''}}>
                                                                {{$marca->name}}</option>
                                                            @endforeach
                                                        </select>
            </div>
        </div>

            <div class="form-row">
                <button type="submit" class="btn btn-secondary mt-2">Salvar</button>
                <a class="ml-3" href="{{ route('produtos.list')}}"><button type="button" class="btn btn-danger mt-2 ">Voltar</button></a>
            </div>


    </form>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script>

        $('.price').mask('000,00');
    </script>

@stop
