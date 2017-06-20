<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PermissionEntity
 *
 * @author master
 */
class PermissionEntity {

    private $id;
    private $permission;

    public function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getPermission() {
        return $this->permission;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPermission($permission) {
        $this->permission = $permission;
    }

}
