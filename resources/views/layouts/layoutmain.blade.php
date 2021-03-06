<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Projeto Scrum - Online</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/styles.css">
    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script> 
    <script type="text/javascript">
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
    </script>
</head>

<body>
    <?php
        $user = Auth::user();
    ?>


    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Fechar navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/logado">Projeto Scrum</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i><?php echo $user['email'] ?></a>
                        </li>
                        <li>
                            <a href="#" class="meusdados" urlajax="/editarcadastro"><i class="fa fa-gear fa-fw"></i> Meus dados</a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="/sair"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/logado"><i class="fa fa-file-text-o"></i> Meus Projetos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="newproject" urlajax="/project/new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Novo Projeto</a>
                                </li>

                                <li>
                                    <a class="listproject" urlajax="project/list" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Editar Projetos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="/logado"><i class="fa fa-calendar"></i><span class="fa arrow"></span> Minhas sprints</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="newproject" urlajax="/project/new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Nova Sprint</a>
                                </li>

                                <li>
                                    <a class="listproject" urlajax="project/list" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Editar Sprints</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="/logado"><i class="fa fa fa-calendar-check-o"></i><span class="fa arrow"></span> Tarefas</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="newproject" urlajax="/project/new" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Nova tarefa</a>
                                </li>

                                <li>
                                    <a class="listproject" urlajax="project/list" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Editar Sprints</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
            </div>

        </nav>

        <div id="page-wrapper" style="min-height: 938px;">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>

            </div>
        </div>

    </div>

    <script src="https://use.fontawesome.com/56303a30c7.js"></script>
    <script src="/js/jquery.fancybox.pack.js"></script>
    <!-- Bootstrap Core JavaScript --> 
    <script src="/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
