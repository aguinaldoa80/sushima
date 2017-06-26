<?php

namespace MeuProjeto\Entities;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserEntity
 *
 * @author master
 */
class ProdutoEntity {

    private $id;
    private $produto;
    private $descricao;
    private $preco;
    private $imagem;
    
    function getId() {
        return $this->id;
    }

    function getProduto() {
        return $this->produto;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

}
