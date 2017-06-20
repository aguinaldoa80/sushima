<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        {% block head %}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MeuProjeto</title>

        <!-- Styles -->
        <link href="/css/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <link href="/css/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        
        <script src="/js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <!--<script src="/js/jquery.dataTables.js" type="text/javascript"></script>-->
        <script src="/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap-select.min.js" type="text/javascript"></script>
        <link href="/css/estilo.css" rel="stylesheet" type="text/css"/>
        <!--<script src="/js/dataTables.editor.min.js" type="text/javascript"></script>-->
        <!--<script src="/js/dataTables.buttons.min.js" type="text/javascript"></script>-->
        <!--<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
        {% endblock %}
        {% block scripthead %}
        {% endblock %}
    </head>
    <body>

        <div>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Branding Image -->
                        <a class="navbar-brand fa-lg aguinaldo" href="/">
                            {{ 'CotaTudo' }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            {% if AuthUser() %}
                            
                            <li class="dropdown" ><a data-toggle="dropdown" role="button" class="fa-lg" aria-hidden="false"><span id="notificao" class="fa fa-bell-o"><label id="qtdeNotificacao" class="bellAguinaldo" style="font-size: 0.8em">2</label></span></a></li>
                            <li class="dropdown">    
                                <a href="#" class="notification dropdown-toggle fa fa-user-circle-o fa-lg" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    <span class="aguinaldo">{{ AuthUser().username }}</span>
                                    <span class=" fa fa-caret-down fa-lg"></span>
                                </a>
                                <ul class="dropdown-menu " role="menu">
                                    <li>
                                        <a href="/logout"
                                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" class="fa-lg">
                                            Sair <span class="fa fa-sign-out"/>
                                        </a>
                                        <form id="logout-form" action="/logout" method="POST"
                                              style="display: none;">

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            {% else %}
                            <li><a href="/login" class="fa-lg">Login <span class="fa fa-user"/></a></li>
                            <li><a href="/cadastro" class="fa-lg">Cadastre-se <span class="fa fa-sign-in"/></a></li>
                            {% endif %}

                        </ul>
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            {% if AuthUser() %}
                            <li><a href="#" class="fa-lg" role="button" aria-expanded="false"><i class="fa fa-shopping-basket fa-lg"></i> Cotações</a></li>
                            <li><a href="#" class="aguinaldo fa-lg" role="button" aria-expanded="false"><i class="fa fa-group fa-lg"></i> Fornecedores</a></li>
                            <li><a href="#" class="fa-lg aguinaldo" role="button" aria-expanded="false"><i class="fa fa-pie-chart"></i> Relatórios</a></li>
                            {% endif %}
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
        {% block panel %}
        {% endblock %}

        {% block scripts%}
        {% endblock %}
    </body>
</html>
