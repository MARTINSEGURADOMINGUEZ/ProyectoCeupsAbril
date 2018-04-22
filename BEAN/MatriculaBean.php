<?php

    class MatriculaBean
    {
        public $IdMatricula;
        public $NombreCurso;
        public $IdDocumento;
        public $IdCurso;
        public $IdEstudiante;
        public $IdTipoEstudiante;
        public $Observación;
        public $TipoPago;
        public $FechaPago;
        public $FechaRegistro;
        public $DocumentoPago;
        public $MontoPago;
        public $Deuda;
        public $RegocioCertificado;
        public $DescCorporativo;
        public $NotaFinal;
        public $SituacionFinal;
        public $matricula;
        public $listar;
           
        function getMatricula() {
            return $this->matricula;
        }

        function getListar() {
            return $this->listar;
        }

        function setMatricula($matricula) {
            $this->matricula = $matricula;
        }

        function setListar($listar) {
            $this->listar = $listar;
        }
        
        function getFechaRegistro() {
            return $this->FechaRegistro;
        }

        function setFechaRegistro($FechaRegistro) {
            $this->FechaRegistro = $FechaRegistro;
        }
        
        function getRegocioCertificado() {
            return $this->RegocioCertificado;
        }

        function getDescCorporativo() {
            return $this->DescCorporativo;
        }

        function getNotaFinal() {
            return $this->NotaFinal;
        }

        function getSituacionFinal() {
            return $this->SituacionFinal;
        }

        function setRegocioCertificado($RegocioCertificado) {
            $this->RegocioCertificado = $RegocioCertificado;
        }

        function setDescCorporativo($DescCorporativo) {
            $this->DescCorporativo = $DescCorporativo;
        }

        function setNotaFinal($NotaFinal) {
            $this->NotaFinal = $NotaFinal;
        }

        function setSituacionFinal($SituacionFinal) {
            $this->SituacionFinal = $SituacionFinal;
        }
        
        function getDeuda() {
            return $this->Deuda;
        }

        function setDeuda($Deuda) {
            $this->Deuda = $Deuda;
        }
        
        function getIdDocumento() {
            return $this->IdDocumento;
        }

        function setIdDocumento($IdDocumento) {
            $this->IdDocumento = $IdDocumento;
        }
        
        function getNombreCurso() {
            return $this->NombreCurso;
        }

        function setNombreCurso($NombreCurso) {
            $this->NombreCurso = $NombreCurso;
        }
        
        function getIdMatricula() {
            return $this->IdMatricula;
        }

        function getIdCurso() {
            return $this->IdCurso;
        }

        function getIdEstudiante() {
            return $this->IdEstudiante;
        }

        function getIdTipoEstudiante() {
            return $this->IdTipoEstudiante;
        }

        function getObservación() {
            return $this->Observación;
        }

        function getTipoPago() {
            return $this->TipoPago;
        }

        function getFechaPago() {
            return $this->FechaPago;
        }

        function getDocumentoPago() {
            return $this->DocumentoPago;
        }

        function getMontoPago() {
            return $this->MontoPago;
        }

        function setIdMatricula($IdMatricula) {
            $this->IdMatricula = $IdMatricula;
        }

        function setIdCurso($IdCurso) {
            $this->IdCurso = $IdCurso;
        }

        function setIdEstudiante($IdEstudiante) {
            $this->IdEstudiante = $IdEstudiante;
        }

        function setIdTipoEstudiante($IdTipoEstudiante) {
            $this->IdTipoEstudiante = $IdTipoEstudiante;
        }

        function setObservación($Observación) {
            $this->Observación = $Observación;
        }

        function setTipoPago($TipoPago) {
            $this->TipoPago = $TipoPago;
        }

        function setFechaPago($FechaPago) {
            $this->FechaPago = $FechaPago;
        }

        function setDocumentoPago($DocumentoPago) {
            $this->DocumentoPago = $DocumentoPago;
        }

        function setMontoPago($MontoPago) {
            $this->MontoPago = $MontoPago;
        }
       
    }
    
?>
