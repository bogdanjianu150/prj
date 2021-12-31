<?php

class db
{
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = 'p';
    protected $dbname = 'biblioteca';
    protected $conectare;
    public function SetConectare()
    {

        $this->conectare = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $this->conectare->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    public function getConectare(){
        return $this->conectare;
}
}
