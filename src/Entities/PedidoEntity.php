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
class PedidoEntity {

    private $id;
    private $idServer;
    private $formapgto;
    private $dataPedido;
    private $create_at;
    private $update_at;
    private $cliente;
    private $status;
    
    function getIdServer() {
        return $this->idServer;
    }

    function setIdServer($idServer) {
        $this->idServer = $idServer;
    }

        function getCreate_at() {
        return $this->create_at;
    }

    function getUpdate_at() {
        return $this->update_at;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getStatus() {
        return $this->status;
    }

    function setCreate_at($create_at) {
        $this->create_at = $create_at;
    }

    function setUpdate_at($update_at) {
        $this->update_at = $update_at;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        
    function getId() {
        return $this->id;
    }

    function getFormapgto() {
        return $this->formapgto;
    }

    function getDataPedido() {
        return $this->dataPedido;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFormapgto($formapgto) {
        $this->formapgto = $formapgto;
    }

    function setDataPedido($dataPedido) {
        $this->dataPedido = $dataPedido;
    }


}
