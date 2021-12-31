<?php



abstract class Client
{
    protected $nume;
    protected $cartiImprumutate;
    protected $dataRetur;
    protected $poateImprumuta = true;

    public function __construct($nume, $cartiImprumutate, $dataRetur){
        $this->nume = $nume;
        $this->cartiImprumutate = $cartiImprumutate;
        $this->dataRetur = $dataRetur;

    }

    public function setNume($nume){
        $this->nume = $nume;
    }

    public function getNume(){
        return $this->nume;
    }

    public function setDataRetur($dataRetur){
        $this->dataRetur = $dataRetur;
    }

    public function getDataRetur(){
        return $this->dataRetur;
    }

    public function setPoateImprumuta($poateImprumuta){
        $this->poateImprumuta = $poateImprumuta;
    }

    public function getPoateImprumuta(){
        return $this->poateImprumuta;
    }


    public function afiseazaClienti()
    {
        $con = new db();
        $con->SetConectare();

        $query = "SELECT nume, carti_imprumutate, data_retur, facultate
        FROM studenti UNION SELECT nume, carti_imprumutate, data_retur, materie FROM profesori  ";
        $con->getConectare()->exec($query);
        //$query1 = "SELECT nume, carti_imprumutate, data_retur, materie
         //    FROM profesori ";
        //$con->getConectare()->exec($query1);
        echo 'Clienti afisati';
    }

    public function celMaiFidelCititor(){
        $con = new db();
        $con->SetConectare();
        $gcon = $con->getConectare();
        $query ="SELECT MAX(carti_imprumutate) 
                FROM (SELECT carti_imprumutate  FROM studenti UNION SELECT carti_imprumutate  from profesori) as M ;";
        //$con->getConectare()->exec($query);
        $st = $gcon->prepare($query);
        $vdup = $st->execute();
        echo 'Cel mai fidel cititor afisat';
        return $st->fetch();


    }


}