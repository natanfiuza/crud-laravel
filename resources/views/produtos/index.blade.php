<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Labore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/dashs/assets/images/icone_3.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- third party css -->
    <link href="{{ asset('assets/dashs/assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
        type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('assets/dashs/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/dashs/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('assets/dashs/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="dark-style">
    <link href="{{ asset('assets/dashs/assets/css/nav_user_labore.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">


</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php $leftside = 'layouts.' . $empresa->layout . '.leftside'; ?>
        <?php $navbar = 'layouts.' . $empresa->layout . '.navbar'; ?>
        <?php $rightside = 'layouts.' . $empresa->layout . '.rightside'; ?>

        @include($leftside)
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page" style="">
            <div class="content">
                <!-- Topbar Start -->
                @include($navbar)
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Usuários</h4>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card card-gray mb-0 shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <x-bi-file-text-fill class="mr-2 h1" style="width: 24px; height: 24px" />Formulário
                                    de Cadastro
                                </h3>
                            </div>
                        </div>

                        <form action="{{ route('empresas.store') }}" method="POST" class="form-fluid p-4 rounded shadow"
                            style="background: white;">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Atenção!!</strong> Temos alguns problemas com o seu
                                formulário.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputNomeEmpresa">
                                        <x-bi-folder-fill class="mr-2" />Nome da Empresa
                                    </label>
                                    <input type="text"
                                        class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="inputNomeEmpresa" placeholder="Nome da Empresa" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail">
                                        <x-bi-envelope-fill class="mr-2" />E-mail
                                    </label>
                                    <input type="email"
                                        class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        id="inputEmail" placeholder="email@gmail.com" name="email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail">
                                        <class="mr-2" />Layout
                                    </label>
                                    <input type="text"
                                        class="form-control  {{ $errors->has('layout') ? 'is-invalid' : '' }}"
                                        id="inputLayout" placeholder="layout" name="layout" value="{{ old('layout') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCNPJ">
                                        <x-bi-file-person-fill class="mr-2" />CNPJ
                                    </label>
                                    <input type="text"
                                        class="form-control cnpj {{ $errors->has('CNPJ') ? 'is-invalid' : '' }}"
                                        id="inputCNPJ" placeholder="00.000.000-0000/00" name="cnpj"
                                        value="{{ old('CNPJ') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTelefone">
                                        <x-bi-telephone-fill class="mr-2" />Telefone
                                    </label>
                                    <input type="text"
                                        class="form-control phone {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                                        id="telefone" placeholder="(00) 00000-0000" name="telefone"
                                        value="{{ old('telefone') }}" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputResponsável">
                                        <x-bi-person-fill class="mr-2" />Responsável
                                    </label>
                                    <input type="text"
                                        class="form-control responsavel {{ $errors->has('responsavel') ? 'is-invalid' : '' }}"
                                        id="responsavel" placeholder="Nome" name="responsavel"
                                        value="{{ old('responsavel') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputObs">
                                        <x-bi-chat-left-text-fill class="mr-2" />Observação
                                    </label>
                                    <textarea type="textarea" class="form-control" id="inputObs"
                                        placeholder="Observação" name="observacao">
                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-md">Cadastrar</button>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12 py-2">
                        </div> <!-- end col-->
                    </div><!-- end row -->
                </div><!-- end row -->
            </div><!-- end row -->
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <script>
                            document.write(new Date().getFullYear())
                            </script> -->
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">Sobre</a>
                                <a href="javascript: void(0);">Suporte</a>
                                <a href="javascript: void(0);">Contato</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div><!-- end row -->
    </div><!-- end row -->

    @include($rightside)

    <div class="rightbar-overlay"></div>

    <!-- bundle -->
    <script src="{{ asset('assets/dashs/assets/js/vendor.min.js')}}"></script>
    <script src="{{ asset('assets/dashs/assets/js/app.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{ asset('assets/dashs/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}">
    </script>
    <script src="{{ asset('assets/dashs/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}">
    </script>
    <!-- third party js ends -->

    <!-- demo app -->
    <!-- end demo js-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <script>
    $(".cnpj").mask('00.000.000/0000-00')
    $('.phone').mask('(00) 00000-0000');
    </script>

</body>

</html>