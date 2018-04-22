<?php


class UsuarioBean {
    
    public $usu_ID;
    public $usu_USERNAME;
    public $usu_PASSWORD;
    public $usu_NOMBRE;
    public $usu_TIPOUSU;
    public $usu_EMAIL;
   
    function getUsu_ID() {
        return $this->usu_ID;
    }

    function getUsu_USERNAME() {
        return $this->usu_USERNAME;
    }

    function getUsu_PASSWORD() {
        return $this->usu_PASSWORD;
    }

    function getUsu_NOMBRE() {
        return $this->usu_NOMBRE;
    }

    function getUsu_TIPOUSU() {
        return $this->usu_TIPOUSU;
    }

    function getUsu_EMAIL() {
        return $this->usu_EMAIL;
    }

    function setUsu_ID($usu_ID) {
        $this->usu_ID = $usu_ID;
    }

    function setUsu_USERNAME($usu_USERNAME) {
        $this->usu_USERNAME = $usu_USERNAME;
    }

    function setUsu_PASSWORD($usu_PASSWORD) {
        $this->usu_PASSWORD = $usu_PASSWORD;
    }

    function setUsu_NOMBRE($usu_NOMBRE) {
        $this->usu_NOMBRE = $usu_NOMBRE;
    }

    function setUsu_TIPOUSU($usu_TIPOUSU) {
        $this->usu_TIPOUSU = $usu_TIPOUSU;
    }

    function setUsu_EMAIL($usu_EMAIL) {
        $this->usu_EMAIL = $usu_EMAIL;
    }

}
