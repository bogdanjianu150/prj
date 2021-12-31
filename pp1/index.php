<?php

require "Student.php";
require "Profesor.php";
require "Carte.php";


$profesor1 = new Profesor('Andrei', 9, '2022', 'Istorie');
//$profesor1->adaugaProfesor();

$profesor2 = new Profesor('Radu', 9, '2022', 'Istorie');
//$profesor2->adaugaProfesor();

$profesor3 = new Profesor('Ionut', 16, '2024', 'Franceza');
//$profesor3->adaugaProfesor();

$student1 = new Student('George', 11, '2023', 'ASE', '2');
//$student1->adaugaStudent();
$student2 = new Student('Alin', 18, '2022', 'Chimie', '2');
//$student2->adaugaStudent();

$student1->afiseazaStudenti();
//$student1->celMaiFidelCititor();
//$student1->afiseazaClienti();

$student3 = new Student ('Mihai', 18, '2022', 'Fizica', '1');
//$student3->adaugaStudent();

$student4 = new Student ('Alex', 18, '2022', 'Biologie', '1');
//$student4 ->adaugaStudent();

//$student2->celMaiFidelCititor();
$carte1 = new Carte('titlu1', 'autor1', 'gen1', 200);
//$carte1 -> adaugaCarte();

$carte2 = new Carte('titlu2', 'autor2', 'gen2', 225);
$carte3 = new Carte('titlu3', 'autor2', 'gen1', 600);

//$carte2 -> adaugaCarte();
//$carte3 -> adaugaCarte();

//$carte1->afiseazaCarte();

//$carte1->afiseazaCartiDisponibile();

//$carte1->cautaCarte('titlu1');

//$carte1->filtreazaCartiDupaGen();

//$carte1->imprumutaCarte('2020');

//$carte1->stergeCarte('titlu1');


/* intrebari

- print la ce afiseaza SQL?
- 2 instructiuni sql in aceeasi metoda?
- metode apelate fara obiect?
- aceeasi metoda in 2 clase -> Client trebuie sa afiseze si stundeti si profesori
- refresh sql?
- metode care folosesc atribute / getter/ setter din clasa fara sa fie in clasa?
- conectare la baza de date de fiecare data?

    protected () { .. m2}
       private m2() {}
*/