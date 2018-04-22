<?php
    
class PagosBean {
    
    public $IdPago;
    public $IdMatricula;
    public $IdTipoPago;
    public $FechaPago;
    public $MontoPago;
    public $NumeroLiquidacion;
    public $NumeroDocumento;
    public $CalculoNuevaDeuda;
    public $AlumnoDni;
    
    public $PeriodoCurso;
    public $Periodo;
    
    function getPeriodoCurso() {
        return $this->PeriodoCurso;
    }

    function getPeriodo() {
        return $this->Periodo;
    }

    function setPeriodoCurso($PeriodoCurso) {
        $this->PeriodoCurso = $PeriodoCurso;
    }

    function setPeriodo($Periodo) {
        $this->Periodo = $Periodo;
    }
    
    function getCalculoNuevaDeuda() {
        return $this->CalculoNuevaDeuda;
    }

    function setCalculoNuevaDeuda($CalculoNuevaDeuda) {
        $this->CalculoNuevaDeuda = $CalculoNuevaDeuda;
    }

        
    function getAlumnoDni() {
        return $this->AlumnoDni;
    }

    function setAlumnoDni($AlumnoDni) {
        $this->AlumnoDni = $AlumnoDni;
    }

    function getIdPago() {
        return $this->IdPago;
    }

    function getIdMatricula() {
        return $this->IdMatricula;
    }

    function getIdTipoPago() {
        return $this->IdTipoPago;
    }

    function getFechaPago() {
        return $this->FechaPago;
    }

    function getMontoPago() {
        return $this->MontoPago;
    }

    function getNumeroLiquidacion() {
        return $this->NumeroLiquidacion;
    }

    function getNumeroDocumento() {
        return $this->NumeroDocumento;
    }

    function setIdPago($IdPago) {
        $this->IdPago = $IdPago;
    }

    function setIdMatricula($IdMatricula) {
        $this->IdMatricula = $IdMatricula;
    }

    function setIdTipoPago($IdTipoPago) {
        $this->IdTipoPago = $IdTipoPago;
    }

    function setFechaPago($FechaPago) {
        $this->FechaPago = $FechaPago;
    }

    function setMontoPago($MontoPago) {
        $this->MontoPago = $MontoPago;
    }

    function setNumeroLiquidacion($NumeroLiquidacion) {
        $this->NumeroLiquidacion = $NumeroLiquidacion;
    }

    function setNumeroDocumento($NumeroDocumento) {
        $this->NumeroDocumento = $NumeroDocumento;
    }
  
}

?>
