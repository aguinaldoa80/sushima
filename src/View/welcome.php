{% extends('layout/layout.php')%}
{% block panel %}
<div class="container">
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading text-center"><strong>Área do administrador - Serviço Social.</strong><span style="font-size: 20px" class="fa fa-facebook-square"/></div>

            <div class="panel-body">
                <button class="btn btn-primary btn-lg btn-new" data-toggle="modal" data-target="#agregarPunto">
                    Nueva Ronda
                </button>
                <div  style="display: none;"  id="agregarPunto" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" method="POST" action="/login">
                                    <div class="form-group {{errors['email'] ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="email"
                                                   value="{{dados['email']}}" autofocus>
                                            <span class="help-block">
                                                <strong>{{errors['email'] ? errors['email'][0] :''  }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group {{errors['senha'] ? ' has-error' : '' }}">
                                        <label for="senha" class="col-md-4 control-label">Senha</label>
                                        <div class="col-md-6">
                                            <input id="senha" type="password" class="form-control" name="senha"
                                                   value="{{dados['senha']}}" autofocus>
                                            <span class="help-block">
                                                <strong>{{errors['senha'] ? errors['senha'][0] :''  }}</strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Entrar
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary">Crear ronda</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Primary</button>

                <!-- Secondary, outline button -->
                <button type="button" class="btn btn-secondary">Secondary</button>

                <!-- Indicates a successful or positive action -->
                <button type="button" class="btn btn-success">Success <span class="glyphicon glyphicon-floppy-save"/></button>

                <!-- Contextual button for informational alert messages -->
                <button type="button" class="btn icon-next">Info <span class="glyphicon glyphicon-download-alt"/></button>

                <!-- Indicates caution should be taken with this action -->
                <button type="button" class="btn btn-warning">Warning <span class="glyphicon glyphicon-download"/></button>

                <!-- Indicates a dangerous or potentially negative action -->
                <form id="form"action="/create" method="post">
                    <input type="search" name="nome">
                    <input type="text" name="rua">
                    <input type="text" name="telefone">
                    <input type="text" name="cpf">
                    <button type="submit" class="btn btn-danger">Enviar <span class="glyphicon glyphicon-apple"/></button>
                </form>
            </div>
        </div>
        <button type="button" class="btn btn-warning">dentro da row <span class="glyphicon glyphicon-download"/></button>
    </div>
    <button type="button" class="btn btn-warning">depois da row <span class="glyphicon glyphicon-download"/></button>
</div>
<button type="button" class="btn btn-warning">depois do container <span class="glyphicon glyphicon-download"/></button>
{% endblock %}

