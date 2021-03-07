<?php

class Validation {

static function val_action($action) {

    if (!isset($action)) {
        return true;
    }
    else{
        return false;
    }
}

static function val_pseudo($champ) {   
    if((preg_match("/[^a-zA-Z0-9]/",$champ) || $champ=="")){
        
        return false;
    }
    else{
        return true;
    }    
}

static function val_isVide($champ){
    if($champ==""){
        return true;
    }
    else{
        return false;
    }
}
  
static function val_int($champ) {
    if ($champ<=0){
        return true;
    }
    else{
        return false;
    }
}


static function nettoyerString($champ): string{
    
    return filter_var($champ, FILTER_SANITIZE_STRING);
        
}

static function nettoyerInt($champ): int{
    
    return filter_var($champ, FILTER_SANITIZE_NUMBER_INT); 
        
}



}
?>      