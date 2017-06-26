{% extends('layout/layout.php')%}

{% block panel %}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center fa-lg" style="font-family: sans-serif;"><strong>Cadastro de produtos</strong></div>
                <div class="panel-body">
                    
                    <form id = "frmProduto" class="form-horizontal" role="form">
                        <input type="hidden" id ="id" value='{{ produto[0].id }}'/>
                        <div id = "verifyerros" class="form-group">
                            <!--<div class="row col-md-12">-->
                            <div id=verifyImagem" class="col-md-4">
                                <img id="imagemproduto" src='{{ produto[0].imagem }}' alt="Selecione uma imagem" class="img img-responsive" style="height: 200px; width: 200px" />    
                                <input id="path" type='file' class="form-control" onchange="readUrlFromImage(this);" />
                                <span class="help-block">
                                    <strong id="erroimagem"></strong>
                                </span>
                            </div>
                            
                            <div id="verifyProduto" class="col-md-8">
                                <label for="produto" class="control-label">Produto</label>
                                <input id="produto" value="{{ produto[0].produto }}" type="text" class="form-control" name="produto" maxlength="150" autofocus>
                                <span class="help-block">
                                    <strong id="erroproduto"></strong>
                                </span>
                            </div>

                            <div id="verifyDescricao" class="col-md-8">
                                <label for="descricao" class="control-label">Descreva o produto</label>
                                <textarea rows="4" cols="50" id="descricao" class="form-control" name="descricao">{{ produto[0].descricao }}</textarea>
                                <span class="help-block">
                                    <strong id="errodescricao"></strong>
                                </span>
                            </div>

                            <div id="verifyPreco" class="col-md-2">
                                <label for="preco" class="control-label">Preço</label>
                                <input id="preco" value="{{ produto[0].preco }}" type="text" class="form-control" name="preco" maxlength="9" autofocus>
                                <span class="help-block">
                                    <strong id="erropreco"></strong>
                                </span>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="button"  name="btnCadastrar" id="btnCadastrar" class="btn btn-success fa-lg"><i class="fa fa-save"></i> Salvar</button>
                                        <a id="btnCancelar" href="/admin/produtos" class="btn btn-danger fa-lg"><i class="fa fa-close"></i> Cancelar</a>
                                        <p class="sucesso"></p>
                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {% endblock %}
    {% block scripts%}
    <script src="/js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="/js/produtos.js" type="text/javascript"></script>

    {% endblock %}