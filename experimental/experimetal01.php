<?php

define('METHOD','AES-256-CBC');
define('SECRET_KEY', '$MARTIN@2018sv');
define('SECRET_IV', '101712');

class SED {  
    public static function Encryption($String)
            {       
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0,16);
        $output = openssl_encrypt($String, METHOD, $key,0,$iv); 
        $output = base64_encode($output);
        return $output;      
            }           
    public static function Decryption($String)
            {       
        $key= hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($String), METHOD, $key,0,$iv);   
        return $output;          
            }    
}

