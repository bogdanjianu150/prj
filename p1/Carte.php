<?php

class Carte
{

    protected $titlu;
    protected $autor;
    protected $gen ;
    protected $nrPagini;
    protected $disponibil = true;

    public function __construct($titlu, $autor, $gen, $nrPagini){
        $this->titlu = $titlu;
        $this->autor = $autor;
        $this->gen = $gen;
        $this->nrPagini=$nrPagini;
    }

    public function setTitlu($titlu){
        $this->titlu = $titlu;
    }

    public function getTitlu(){
        return $this->titlu;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setGen($gen){
        $this->gen = $gen;
    }

    public function getGen(){
        return $this->gen;

    }

    public function setNrPagini($nrPagini){
        $this->nrPagini = $nrPagini;
    }

    public function getNrPagini(){
        return $this->nrPagini;
    }

    public function setDisponibil($disponibil){
        $this->disponibil = $disponibil;
    }

    public function getDisponibil(){
        return $this->disponibil;
    }

    public function adaugaCarte()
    {
        $con = new db();
        $con->SetConectare();


        $query = "INSERT INTO carti (titlu, autor, gen,nr_pagini)
           VALUES ('$this->titlu', '$this->autor', '$this->gen', '$this->nrPagini')";

        $con->getConectare()->exec($query);
        echo 'Carte adaugata';
    }

    public function afiseazaCarte()
    {
        $con = new db();
        $con->SetConectare();

        $query = "SELECT titlu, autor, gen, nr_pagini 
        FROM carti ";
        $con->getConectare()->exec($query);

        echo 'Carti afisate';
    }

    public function afiseazaCartiDisponibile(){
        if ($this->disponibil){
            $con = new db();
            $con->SetConectare();

            $query = "SELECT titlu, autor, gen, nr_pagini 
        FROM carti ";
            $con->getConectare()->exec($query);

            echo 'Carti disponibile afisate';
        }
    }

    public function cautaCarte($titlu){
        if($titlu == $this->titlu){
            $con = new db();
            $con->SetConectare();

            $query = "SELECT autor, gen, nr_pagini 
        FROM carti ";
            $con->getConectare()->exec($query);

            echo 'Carti disponibile afisate';
        }
    }

    public function filtreazaCartiDupaGen($gen){
        $con = new db();
        $con->SetConectare();

        $query = "SELECT * FROM carti WHERE gen = '$gen'";
        $con->getConectare()->exec($query);

        echo 'Carti filtrate dupa gen';

    }

    public function imprumutaCarte($dataRetur){
        if($this->disponibil){
            echo 'carte imprumutata pana la' . $dataRetur;
            $this->disponibil = false;
        } else {
            throw new CarteIndisponibilaException();
        }
    }

    public function returneazaCarte(){
        $this->disponibil = true;
        echo 'Cartea a fost returnata';
    }

    public function stergeCarte($titlu){
        $con = new db();
        $con->SetConectare();
        $query = "DELETE FROM carti WHERE titlu = '$titlu'";
        $con->getConectare()->exec($query);

        echo 'Carte stearsa';


    }
}