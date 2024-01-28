console.log('working fine from script.js');


let Person = {
    name: "Jakub",
    surname: "Lektor",
    fullname: this.name + this.surname,
    age: 30,
    isMarried: true,
    hasKids: true,
    employer: {
        name: "",
        employees: [1, 2, 3, 4, 5],
    }
}

Person.name;
Person.employer.name;

let message1 = "Toto je zpráva";
let message2 = "Jsem zprává z message2";

let number = 1;
let number2 = "1";


number != number2;
number !== number2;


if (1 === 1) {
    console.log('pravdivá podmínka');
} else {
    console.log('nepravdivápravdivá podmínka');
}

console.log('pokračování programu');

let date = new Date();
console.log(date.getMonth() + 1);



let todo = document.querySelector('#todo_input');
let todoValue = todo.getAttribute('value');


function validate() {
    if (!todoValue.contains('@')) {
        todo.classList.add('input--error');
    }
}

todo.addEventListener('change', validate);


todo.addEventListener('click', function(){
    if (!todoValue.contains('@')) {
        todo.classList.add('input--error');
    }
});

$('#todo_input').click(function(){
    if (!todoValue.contains('@')) {
        todo.classList.add('input--error');
    }
});