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
class UserEntity {

    private $id;
    private $nome;
    private $email;
    private $password;
    private $active;
    private $documento;
    private $endereco;
    private $cidade;
    private $estado;
    private $cep;
    private $telefone;
    private $plano;
    
    private $permissions;

    public function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getActive() {
        return $this->active;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCep() {
        return $this->cep;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getPlano() {
        return $this->plano;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setPlano($plano) {
        $this->plano = $plano;
    }
    function getPermissions() {
        return $this->permissions;
    }

    function setPermissions($permissions) {
        $this->permissions = $permissions;
    }


}
