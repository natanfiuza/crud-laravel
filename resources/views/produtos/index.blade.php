@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Cadastrar Produto</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produtos.list') }}">Cadastro</a></li>
            <li class="breadcrumb-item active">Produtos</li>
        </ol>
    </div>
@stop


@section('content')
    <div class="">
        <div class="card card-gray mb-0 shadow-sm">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-file-alt mr-2 "></i>Formulário de Cadastro
                </h3>
            </div>
        </div>
        <form action={{ route('produtos.store') }} method="POST" class="form-fluid p-4 rounded shadow"
            style="background: white;">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNomeProduto">
                        <i class="fas fa-edit"></i>Nome da Produto
                    </label>
                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="inputNomeProduto" placeholder="Nome da Produto" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPrice">
                        <i class="fas fa-dollar-sign"></i> Preço
                    </label>
                    <input type="currency" class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}"
                        id="inputPrice" placeholder="0,00" name="email" value="{{ old('price') }}">
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
                    <label for="inputCategoria">
                        <i class="fas fa-tags"></i> Categoria
                    </label>

                    <select class="form-select form-control select2 select2-danger" data-dropdown-css-class="select2-danger"
                        id="categoria_id" name="categoria_id" style="width: 100%;">
                        <option selected="selected" disabled>Selecione uma categoria...
                        </option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('em') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputMarca">
                        <i class="fas fa-copyright"></i> Marca
                    </label>
                    <select class="form-select form-control select2 select2-danger" data-dropdown-css-class="select2-danger"
                        id="marca_id" name="marca_id" style="width: 100%;">
                        <option selected="selected" disabled>Selecione uma marca...
                        </option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ old('em') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('categoria_id') }}
                </div>
            </div>
            <div class="form-row">
                <div class="text-danger form-group col-md-6">
                    {{ $errors->first('marca_id') }}
                </div>
            </div>

            <div class="form-row">

                <button type="submit" class="btn btn-secondary btn-md">Cadastrar</button>


                <a class="ml-3" href="{{ route('produtos.list') }}"><button type="button"
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
