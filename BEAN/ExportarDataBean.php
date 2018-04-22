<?php

class ExportarDataBean {
   
    public $ExportarId;
    public $ExportarAnio;
    public $ExportarFecha;
    public $ExportarNombre;
    public $ExportarPadre;
    public $ExportarHijo;
    
    function getExportarId() {
        return $this->ExportarId;
    }

    function getExportarAnio() {
        return $this->ExportarAnio;
    }

    function getExportarFecha() {
        return $this->ExportarFecha;
    }

    function getExportarNombre() {
        return $this->ExportarNombre;
    }

    function getExportarPadre() {
        return $this->ExportarPadre;
    }

    function getExportarHijo() {
        return $this->ExportarHijo;
    }

    function setExportarId($ExportarId) {
        $this->ExportarId = $ExportarId;
    }

    function setExportarAnio($ExportarAnio) {
        $this->ExportarAnio = $ExportarAnio;
    }

    function setExportarFecha($ExportarFecha) {
        $this->ExportarFecha = $ExportarFecha;
    }

    function setExportarNombre($ExportarNombre) {
        $this->ExportarNombre = $ExportarNombre;
    }

    function setExportarPadre($ExportarPadre) {
        $this->ExportarPadre = $ExportarPadre;
    }

    function setExportarHijo($ExportarHijo) {
        $this->ExportarHijo = $ExportarHijo;
    }
    
}

?>
