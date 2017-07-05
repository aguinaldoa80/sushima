{% extends('layout/layout.php')%}
{% block scripthead %}
<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/js/validaLogin.js" type="text/javascript"></script>
{% endblock %}
{% block panel %}
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center fa-lg" style="font-family: sans-serif;"><strong>Login</strong></div>
                <div class="panel-body">
                    <form id="formLogin" class="form-horizontal" role="form">
                        <div id="errologin" class="">
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">E-Mail</label>
                                <div class="col-md-8">
                                    <input id="name" type="email" class="form-control" name="email"
                                           value="" maxlength="80" minlength="10">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="senha" class="col-md-3 control-label">Senha</label>
                                <div class="col-md-8">
                                    <input id="senha" type="password" class="form-control" name="senha"
                                           value="">
                                    <span class="help-block display">
                                        <strong id="retorno"></strong>
                                    </span>
                                </div>

                            </div>


                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-3">
                                <button type="button"  name="btnLogin" id="btnLogin" class="btn btn-primary">Entrar</button>
                                <!--<a  name="btnCadastrar" id="btnCadastrar" href="/cadastro" class="btn btn-success">Quero me cadastrar</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
{% endblock %}
{% block scripts%}
{% endblock %}
