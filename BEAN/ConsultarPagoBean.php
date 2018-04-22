<?php

class ConsultarPagoBean {

    public $IdPago;
    public $NombreCurso;
    
    function getIdPago() {
        return $this->IdPago;
    }

    function getNombreCurso() {
        return $this->NombreCurso;
    }

    function setIdPago($IdPago) {
        $this->IdPago = $IdPago;
    }

    function setNombreCurso($NombreCurso) {
        $this->NombreCurso = $NombreCurso;
    }
  
}

?>
