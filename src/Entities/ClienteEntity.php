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
class ClienteEntity {

    private $id;
    private $nome;
    private $endereco;
    private $telefone;
    private $email;
    private $create_at;
    private $update_at;
    
    function getCreate_at() {
        return $this->create_at;
    }

    function getUpdate_at() {
        return $this->update_at;
    }

    function setCreate_at($create_at) {
        $this->create_at = $create_at;
    }

    function setUpdate_at($update_at) {
        $this->update_at = $update_at;
    }

        
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

        function getId() {
        return $this->id;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
