<?php

class Profesor extends Client
{
    protected $materie;

    public function __construct($nume, $cartiImprumutate, $dataRetur,  $materie)
    {
        parent::__construct($nume, $cartiImprumutate, $dataRetur);
        $this->materie = $materie;

    }

    public function setMaterie($materie)
    {
        $this->materie = $materie;
    }

    public function getMaterie()
    {
        return $this->materie;
    }

    public function verificaNume($nume)
    {
        $con = new db();
        $con->SetConectare();
        $gcon = $con->getConectare();
        //$dup = "SELECT EXISTS(SELECT * FROM studenti WHERE nume = '{$nume}') ";
        $dup = "SELECT * FROM profesori WHERE nume = '{$nume}' ";
        $st = $gcon->prepare($dup);
        $vdup = $st->execute();

        return $st->rowCount();

    }

    public function adaugaProfesor()
    {
        $con = new db();
        $con->SetConectare();


        if (!$this->verificaNume($this->nume)) {
            $query = "INSERT INTO profesori (nume, carti_imprumutate, data_retur,materie)
           VALUES ('$this->nume', '$this->cartiImprumutate', '$this->dataRetur', '$this->materie')";

            $con->getConectare()->exec($query);
            echo 'Profesor adaugat';
        } else {
            throw new  NumeDejaExistentException();
        }

    }
}