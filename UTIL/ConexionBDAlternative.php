<?php

class ConexionBDAlternative {
  
    const SERVER = "localhost";
     const USER = "root";
     const PASS = "";
     const DATABASE = "bd_ceups";
     
     private $cn = null;
     
             public function getConexionBDAlternativo()
             {
               try
                {
                   $this->cn = mysqli_connect(self::SERVER, self::USER, self::PASS, self::DATABASE);
                   $this->cn->set_charset("utf8");
    		}
                
                catch(Exception $e)
                {
                }  
                return $this->cn;
             }
    
}

?>
