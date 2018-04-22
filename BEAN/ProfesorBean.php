<?php

class ProfesorBean {
  
      public $id_docente;
      public $nombre_docente;
      public $apellido_docente;
      public $dni_docente;
      public $celular_docente;
      public $telefono_docente;
      public $cargo;
      public $domicilio_docente;
      public $distrito_docente;
      public $email_docente;
      public $curso_docente;
      public $id_grupo_docente;
      
      function getCargo() {
          return $this->cargo;
      }

      function setCargo($cargo) {
          $this->cargo = $cargo;
      }

            function getId_docente() {
          return $this->id_docente;
      }

      function getNombre_docente() {
          return $this->nombre_docente;
      }

      function getApellido_docente() {
          return $this->apellido_docente;
      }

      function getDni_docente() {
          return $this->dni_docente;
      }

      function getCelular_docente() {
          return $this->celular_docente;
      }

      function getTelefono_docente() {
          return $this->telefono_docente;
      }

      function getDomicilio_docente() {
          return $this->domicilio_docente;
      }

      function getDistrito_docente() {
          return $this->distrito_docente;
      }

      function getEmail_docente() {
          return $this->email_docente;
      }

      function getCurso_docente() {
          return $this->curso_docente;
      }

      function getId_grupo_docente() {
          return $this->id_grupo_docente;
      }

      function setId_docente($id_docente) {
          $this->id_docente = $id_docente;
      }

      function setNombre_docente($nombre_docente) {
          $this->nombre_docente = $nombre_docente;
      }

      function setApellido_docente($apellido_docente) {
          $this->apellido_docente = $apellido_docente;
      }

      function setDni_docente($dni_docente) {
          $this->dni_docente = $dni_docente;
      }

      function setCelular_docente($celular_docente) {
          $this->celular_docente = $celular_docente;
      }

      function setTelefono_docente($telefono_docente) {
          $this->telefono_docente = $telefono_docente;
      }

      function setDomicilio_docente($domicilio_docente) {
          $this->domicilio_docente = $domicilio_docente;
      }

      function setDistrito_docente($distrito_docente) {
          $this->distrito_docente = $distrito_docente;
      }

      function setEmail_docente($email_docente) {
          $this->email_docente = $email_docente;
      }

      function setCurso_docente($curso_docente) {
          $this->curso_docente = $curso_docente;
      }

      function setId_grupo_docente($id_grupo_docente) {
          $this->id_grupo_docente = $id_grupo_docente;
      }

}

?>
