{% extends('layout/layout.php')%}
{% block panel %}

<div class="container">
    <div class="row">
         
        <div class="panel panel-info">
            <div class="panel-heading text-center"><strong>Área do administrador - Serviço Social.</strong><span style="font-size: 20px" class="fa fa-facebook-square"/></div>

            <div class="panel-body">
                <div>{{dados[0].id}} Voce esta logado</div>
            {% for dado in dados %}
            <div>Id da bota: {{ dado.produto}}</div>
            {% endfor %}
            <button type="button" class="btn btn-primary">Primary</button>

                <!-- Secondary, outline button -->
                <button type="button" class="btn btn-secondary">Secondary</button>

                <!-- Indicates a successful or positive action -->
                <button type="button" class="btn btn-success">Success <span class="glyphicon glyphicon-floppy-save"/></button>

                <!-- Contextual button for informational alert messages -->
                <button type="button" class="btn icon-next">Info <span class="glyphicon glyphicon-download-alt"/></button>

                <!-- Indicates caution should be taken with this action -->
                <button type="button" class="btn btn-warning">Warning <span class="glyphicon glyphicon-download"/></button>

                <!-- Indicates a dangerous or potentially negative action -->
                
                <button type="button" class="btn btn-danger">Danger <span class="glyphicon glyphicon-apple"/></button>
            </div>
        </div>
    </div>
</div>{% endblock %}
