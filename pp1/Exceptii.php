<?php

class NumeDejaExistentException extends Exception{
    protected $mesage = 'Numele deja exista';

    public function getMesaj(){
        return $this->mesage;
    }
}

class CarteIndisponibilaException extends Exception{
    protected $mesage = 'Cartea este indisponibila';
    public function getMesaj(){
        return $this->mesage;
    }
}
