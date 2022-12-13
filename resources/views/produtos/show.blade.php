<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LumeTec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <link href="{{ asset('assets/dashs/assets/css/nav_user_lume.css')}}" rel="stylesheet" type="text/css">
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
                                <h4 class="page-title">Empresas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <a href={{ route('empresas.create')}}
                                            class="btn btn-success col fileinput-button dz-clickable">
                                            <i class="fas fa-plus"></i>
                                            <span>Novo</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-responsive table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">
                                                    Id
                                                </th>
                                                <th style="width: 20%">
                                                    Nome
                                                </th>
                                                <th style="width: 20%">
                                                    CNPJ
                                                </th>
                                                <th style="width: 20%">
                                                    E-mail
                                                </th>
                                                <th style="width: 20%">
                                                    Ações
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empresas as $empresa)
                                            <tr>
                                                <td>
                                                    {{ $empresa->id }}
                                                </td>
                                                <td>
                                                    {{ $empresa->name }}

                                                </td>
                                                <td>
                                                    {{ $empresa->cnpj }}
                                                </td>
                                                <td class="project_progress">
                                                    {{ $empresa->email }}
                                                </td>
                                                <td class="project-actions">
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('empresas.edit', $empresa->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end page title -->
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
    <script src="{{ asset('assets/dashs/assets/js/usuario.js')}}"></script>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>
    $('#tabela_user').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        }
    });
    </script>


</body>

</html>