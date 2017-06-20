{% extends('layout/layout.php')%}

{% block panel %}
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center fa-lg"><strong>Cadastro</strong></div>
                <div class="panel-body">
                   
                    <form id = "formCadastro" class="form-horizontal" role="form">

                        <div id = "verifynome" class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome/Razão Social</label><i  id="load2" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="nome" type="text" class="form-control" name="nome" maxlength="50" autofocus>
                                <div id='load'></div>
                                <span class="help-block">
                                    <strong id="erronome"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifyemail" class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label><i  id="loadEmail" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email" maxlength="100" autofocus>
                                <div id='load'></div>
                                <span class="help-block">
                                    <strong id="erroemail"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifydocumento" class="form-group">
                            <label for="documento" class="col-md-4 control-label">
                            <!--<label for="documento" class="col-md-2 control-label">CPF/CNPJ</label><i  id="loadDocumento" style='color: green' class='fa' aria-hidden='true'></i>-->
                                <select id="selectDocumento"name="tipoDocumento">
                                    <option value="cpf">Pessoa Física</option>
                                    <option value="cnpj">Pessoa Jurídica</option>
                                </select>
                            </label><i  id="loadDocumento" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="documento" type="text" class="form-control" name="documento" autofocus>
                                <div id='loadDocumentoDiv'></div>
                                <span class="help-block">
                                    <strong id="errodocumento"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifyendereco" class="form-group">
                            <label for="endereco" class="col-md-4 control-label">Endereço</label><i  id="loadEndereco" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="endereco" type="text" class="form-control" name="endereco" maxlength="150" autofocus>
                                <div id='loadEnderecoDiv'></div>
                                <span class="help-block">
                                    <strong id="erroendereco"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifycidade" class="form-group">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label><i  id="loadCidade" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="cidade" type="text" class="form-control" name="cidade" maxlength="100" autofocus>
                                <div id='loadCidadeDiv'></div>
                                <span class="help-block">
                                    <strong id="errocidade"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifyestado" class="form-group">
                            <label for="estado" class="col-md-4 control-label">Estado</label><i  id="loadEstado" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <select name="idestados" id="idestados">
                                    <option value="escolha">Escolha o Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goias</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraiba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantis</option>
                                </select>
                                <div id='loadEstadoDiv'></div>
                                <span class="help-block">
                                    <strong id="erroestado"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifycep" class="form-group">
                            <label for="cep" class="col-md-4 control-label">Cep</label><i  id="loadCep" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="cep" type="text" class="form-control" name="cep" maxlength="20" autofocus>
                                <div id='loadCepDiv'></div>
                                <span class="help-block">
                                    <strong id="errocep"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifytelefone" class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label><i  id="loadTelefone" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="telefone" type="text" class="form-control" name="telefone" maxlength="30" autofocus>
                                <div id='loadTelefoneDiv'></div>
                                <span class="help-block">
                                    <strong id="errotelefone"></strong>
                                </span>
                            </div>
                        </div>
                        <div id = "verifysenha" class="form-group">
                            <label for="senha" class="col-md-4 control-label">Senha</label><i  id="loadSenha" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="senha" type="password" class="form-control" name="senha" maxlength="16" autofocus>
                                <div id='loadSenhaDiv'></div>
                            </div>
                            <label for="resenha" class="col-md-4 control-label">Repita a senha</label><i  id="loadReSenha" style='color: green' class='fa' aria-hidden='true'></i>
                            <div class="col-md-7">
                                <input id="resenha" type="password" class="form-control" name="resenha" maxlength="16" autofocus>
                                <div id='loadReSenhaDiv'></div>
                                <span class="help-block">
                                    <strong id="errosenha"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button"  name="btnCadastrar" id="btnCadastrar" class="btn btn-success fa-lg">Cadastrar</button>
                                <a id="btnCancelar" href="/" class="btn btn-danger fa-lg" value="Cancelar">Cancelar</a>
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
<script src="/js/jquery.mask.min.js" type="text/javascript"></script>
<script src="/js/validaCadastro.js" type="text/javascript"></script>
<script>
//$(document).ready(function () {
//
//
//    $("form").on('submit', function (e) {
//        e.preventDefault();
//    });
//    $("#butao").on('click',function() {
//        var cx = $("#nome").val();
//        if(cx.length > 1)
//        console.log(cx);
//})
//});
</script>
{% endblock %}