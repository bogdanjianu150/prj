<?php
require "Client.php";
require "db.php";
require "Exceptii.php";

class Student extends Client
{
    protected $facultate;
    protected $anStudiu;


    public function __construct($nume, $cartiImprumutate, $dataRetur,  $facultate, $anStudiu)
    {
        parent::__construct($nume, $cartiImprumutate, $dataRetur);
        $this->facultate = $facultate;
        $this->anStudiu = $anStudiu;
    }

    public function setFacultate($facultate){
        $this->facultate = $facultate;
    }

    public function getFacultate(){
        return $this->facultate;
    }

    public function setAnStudiu($anStudiu){
        $this->anStudiu = $anStudiu;
    }

    public function getAnStudiu(){
        return $this->anStudiu;
    }



    public function verificaNume($nume){
        $con = new db();
        $con->SetConectare();
        $gcon = $con->getConectare();
        //$dup = "SELECT EXISTS(SELECT * FROM studenti WHERE nume = '{$nume}') ";
        $dup = "SELECT * FROM studenti WHERE nume = '{$nume}' ";
        $st = $gcon->prepare($dup);
        $vdup = $st->execute();



        return $st->rowCount();


    }

    public function adaugaStudent()
    {
        $con = new db();
        $con->SetConectare();


        if (!$this->verificaNume($this->nume)) {
            $query = "INSERT INTO studenti (nume, carti_imprumutate, data_retur,facultate,  an_studiu)
           VALUES ('$this->nume', '$this->cartiImprumutate', '$this->dataRetur', '$this->facultate','$this->anStudiu')";

            $con->getConectare()->exec($query);
            echo 'Student adaugat';
        } else {
            throw new  NumeDejaExistentException();
        }
    }



        public function afiseazaStudenti()
        {
            $con = new db();
            $con->SetConectare();
            $gcon = $con->getConectare();
            $query = "SELECT nume, carti_imprumutate, data_retur, facultate, an_studiu 
        FROM studenti ";

            $st = $gcon->prepare($query);
            $response = $st->execute();
            //echo 'Studenti afisati';
             $st->setFetchMode(PDO::FETCH_ASSOC);
            var_dump( $st->fetchAll());
        }






}