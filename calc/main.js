const calc = document.getElementById('calc');
//const buttons = document.querySelectorAll('.button');
const buttons = Array.from(document.getElementsByClassName('button'));
buttons.map(button => {
    button.addEventListener('click', (e) => {
        //let apasat = e.target.innerText;
        //let afisat = calc.innerText;
        switch( e.target.innerText) {
            case 'C':
                calc.innerText = '';
                break;
            case '<=':
                calc.innerText = calc.innerText.slice(0, -1);
                break;
            case '=':
                calc.innerText = eval(calc.innerText);
                break;
            default:
                calc.innerText += e.target.innerText;
        }
    });
})