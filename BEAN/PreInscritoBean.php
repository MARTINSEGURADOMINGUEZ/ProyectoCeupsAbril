<?php

class PreInscritoBean{
    
    public $curso;
    public $tipoalumno;
    public $alumno;
    public $fecha;
    public $fechacont;
    public $difucion;
    public $observacion;
    
    function getFechacont() {
        return $this->fechacont;
    }

    function setFechacont($fechacont) {
        $this->fechacont = $fechacont;
    }
    
    function getCurso() {
        return $this->curso;
    }

    function getTipoalumno() {
        return $this->tipoalumno;
    }

    function getAlumno() {
        return $this->alumno;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getDifucion() {
        return $this->difucion;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setTipoalumno($tipoalumno) {
        $this->tipoalumno = $tipoalumno;
    }

    function setAlumno($alumno) {
        $this->alumno = $alumno;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setDifucion($difucion) {
        $this->difucion = $difucion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
  
}

?>
