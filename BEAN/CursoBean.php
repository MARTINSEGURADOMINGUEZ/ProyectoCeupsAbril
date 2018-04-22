<?php

class CursoBean {
  
    public $periodo_curso;
    public $id_curso;
    public $nombre_curso;
    public $id_tipocurso;
    public $fecha_inicio;
    public $fecha_fin;
    public $id_docente;
    public $horas_curso;
    public $creditos_curso;
    public $nota_minima;
    public $costo_general;
    public $costo_publicogeneral;
    public $costo_ceups_eupg;
    public $costo_pregrado;
    public $costo_docente_admin;
    public $taller_curso;
    public $cantidad_participante;
    
    function getCantidad_participante() {
        return $this->cantidad_participante;
    }

    function setCantidad_participante($cantidad_participante) {
        $this->cantidad_participante = $cantidad_participante;
    }
    
    function getPeriodo_curso() {
        return $this->periodo_curso;
    }

    function setPeriodo_curso($periodo_curso) {
        $this->periodo_curso = $periodo_curso;
    }
    
    function getNota_minima() {
        return $this->nota_minima;
    }

    function setNota_minima($nota_minima) {
        $this->nota_minima = $nota_minima;
    }
    
    function getId_curso() {
        return $this->id_curso;
    }

    function getNombre_curso() {
        return $this->nombre_curso;
    }

    function getId_tipocurso() {
        return $this->id_tipocurso;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function getId_docente() {
        return $this->id_docente;
    }

    function getHoras_curso() {
        return $this->horas_curso;
    }

    function getCreditos_curso() {
        return $this->creditos_curso;
    }

    function getCosto_general() {
        return $this->costo_general;
    }

    function getCosto_publicogeneral() {
        return $this->costo_publicogeneral;
    }

    function getCosto_ceups_eupg() {
        return $this->costo_ceups_eupg;
    }

    function getCosto_pregrado() {
        return $this->costo_pregrado;
    }

    function getCosto_docente_admin() {
        return $this->costo_docente_admin;
    }

    function getTaller_curso() {
        return $this->taller_curso;
    }

    function setId_curso($id_curso) {
        $this->id_curso = $id_curso;
    }

    function setNombre_curso($nombre_curso) {
        $this->nombre_curso = $nombre_curso;
    }

    function setId_tipocurso($id_tipocurso) {
        $this->id_tipocurso = $id_tipocurso;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    function setId_docente($id_docente) {
        $this->id_docente = $id_docente;
    }

    function setHoras_curso($horas_curso) {
        $this->horas_curso = $horas_curso;
    }

    function setCreditos_curso($creditos_curso) {
        $this->creditos_curso = $creditos_curso;
    }

    function setCosto_general($costo_general) {
        $this->costo_general = $costo_general;
    }

    function setCosto_publicogeneral($costo_publicogeneral) {
        $this->costo_publicogeneral = $costo_publicogeneral;
    }

    function setCosto_ceups_eupg($costo_ceups_eupg) {
        $this->costo_ceups_eupg = $costo_ceups_eupg;
    }

    function setCosto_pregrado($costo_pregrado) {
        $this->costo_pregrado = $costo_pregrado;
    }

    function setCosto_docente_admin($costo_docente_admin) {
        $this->costo_docente_admin = $costo_docente_admin;
    }

    function setTaller_curso($taller_curso) {
        $this->taller_curso = $taller_curso;
    }

}

?>
