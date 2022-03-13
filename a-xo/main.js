window.addEventListener('DOMContentLoaded', () => {
    const cs = Array.from(document.querySelectorAll('.c'));
    const tura = document.querySelector('.tura');
    const reset = document.querySelector('#reset');
    const afisare = document.querySelector('.anunt');

    let t = ['', '', '', '', '', '', '', '', ''];
    let turaCurenta = 'X';
    let activ = true;

    const castigaX = 'castigaX';
    const castigaO = 'castigaO';
    const egalitate = 'egalitate';

 // cs - lista de casute de joc; c - casuta
    // t - tabla de joc
    // activ - verific daca jocul e terminat sau nu
    
    /*
        9 elemente

        0 1 2
        3 4 5
        6 7 8
    */

    const matriceCastig = [ //combinatiile castigatoare in functie de matricea de mai sus
        [0, 1, 2], // [ - - -] linia 1
        [3, 4, 5], // [ - - -] linia 2
        [6, 7, 8], // [- - - ] linia 3
        [0, 3, 6], // [ | | |] coloana 1
        [1, 4, 7], // [ | | |] coloana 2
        [2, 5, 8], // [ | | |] coloana 3
        [0, 4, 8], // [\ \ \] diagonala principala
        [2, 4, 6] // [/ / /] diagonala secundara
    ];

    function proceseazaJoc() {
        let castigaTura = false;
        for (let i = 0; i <= 7; i++) {
            const mutareCastigatoare = matriceCastig[i];
            const a = t[mutareCastigatoare[0]];
            const b = t[mutareCastigatoare[1]];
            const c = t[mutareCastigatoare[2]];
            if (a === '' || b === '' || c === '') {
                continue;
            }
            if (a === b && b === c) {
                castigaTura = true;
                break;
            }
        }

        if (castigaTura) {
            afiseaza(turaCurenta === 'X' ? castigaX : castigaO);
            activ = false;
            return;
        }

        if (!t.includes(''))
            afiseaza(egalitate);
    }

    const afiseaza = (type) => {
        switch(type){
            case castigaO:
                afisare.innerHTML = 'Castigator: <span class="playerO">O</span> ';
                break;
            case castigaX:
                afisare.innerHTML = 'Castigator: <span class="playerX">X</span> ';
                break;
            case egalitate:
                afisare.innerText = 'egalitate';
        }
        afisare.classList.remove('hide');
    };

    const Validare = (c) => {
        if (c.innerText === 'X' || c.innerText === 'O'){
            return false;
        }

        return true;
    };

    const actualizare =  (i) => {
        t[i] = turaCurenta;
    }

    const schimbaTura = () => {
        tura.classList.remove(`player${turaCurenta}`);
        turaCurenta = turaCurenta === 'X' ? 'O' : 'X';
        tura.innerText = turaCurenta;
        tura.classList.add(`player${turaCurenta}`);
    }

    const joaca = (c, i) => {
        if(Validare(c) && activ) {
            c.innerText = turaCurenta;
            c.classList.add(`player${turaCurenta}`);
            actualizare(i);
            proceseazaJoc();
            schimbaTura();
        }
    }

    const reseteazaJoc = () => {
        t = ['', '', '', '', '', '', '', '', ''];
        activ = true;
        afisare.classList.add('hide');

        if (turaCurenta === 'O') {
            schimbaTura();
        }

        cs.forEach(c => {
            c.innerText = '';
            c.classList.remove('playerX');
            c.classList.remove('playerO');
        });
    }

    cs.forEach( (c, i) => {
        c.addEventListener('click', () => joaca(c, i));
    });

    reset.addEventListener('click', reseteazaJoc);
});