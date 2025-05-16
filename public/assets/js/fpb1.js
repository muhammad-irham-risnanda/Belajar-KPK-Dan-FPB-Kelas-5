const targetNumber = document.getElementById('target-number');
const factorsDiv = document.getElementById('factors');
const draggableNumbersDiv = document.getElementById('draggable-numbers');
const resetButton = document.getElementById('reset-button');
const messageDiv = document.getElementById('message');
const answersDiv = document.getElementById('answers');

let target, factors, foundFactors;

function generateRandomNumber() {
    return Math.floor(Math.random() * (30 - 20 + 1)) + 20;
}

function calculateFactors(num) {
    const factors = [];
    for (let i = 1; i <= num; i++) {
        if (num % i === 0) {
            factors.push(i);
        }
    }
    return factors;
}

function setupGame() {
    target = generateRandomNumber();
    factors = calculateFactors(target).sort((a, b) => a - b);
    foundFactors = [];

    targetNumber.textContent = `Cari faktor dari: ${target}`;
    factorsDiv.innerHTML = '';
    draggableNumbersDiv.innerHTML = '';
    messageDiv.textContent = '';
    answersDiv.textContent = 'Jawaban: ';

    for (let i = 0; i < factors.length; i++) {
        const factorDiv = document.createElement('div');
        factorDiv.className = 'factor droppable';
        factorsDiv.appendChild(factorDiv);
    }

    for (let i = 1; i <= 30; i++) {
        const numberDiv = document.createElement('div');
        numberDiv.textContent = i;
        numberDiv.className = 'draggable';
        numberDiv.setAttribute('draggable', true);
        numberDiv.addEventListener('dragstart', dragStart);
        draggableNumbersDiv.appendChild(numberDiv);
    }
}

function dragStart(event) {
    event.dataTransfer.setData('text/plain', event.target.textContent);
}

function dragOver(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();
    const draggedNumber = event.dataTransfer.getData('text/plain');
    const number = parseInt(draggedNumber);

    if (factors.includes(number) && !foundFactors.includes(number)) {
        foundFactors.push(number);
        event.target.classList.remove('droppable');
        event.target.style.backgroundColor = 'lightgreen';

        answersDiv.textContent = 'Jawaban: ' + foundFactors.sort((a, b) => a - b).join(', ');

        if (foundFactors.length === factors.length) {
            messageDiv.textContent = 'Selamat! Semua faktor ditemukan!';
        }
    } else if (foundFactors.includes(number)) {
        messageDiv.textContent = 'Angka ini sudah dimasukkan!';
    } else {
        messageDiv.textContent = 'Salah! Permainan selesai.';
        endGame();
    }
}

function endGame() {
    const droppableElements = document.querySelectorAll('.droppable');
    droppableElements.forEach(element => {
        element.removeEventListener('dragover', dragOver);
        element.removeEventListener('drop', drop);
    });
}

resetButton.addEventListener('click', () => {
    setupGame();
    const droppableElements = document.querySelectorAll('.droppable');
    droppableElements.forEach(element => {
        element.classList.add('droppable');
        element.style.backgroundColor = '';
        element.addEventListener('dragover', dragOver);
        element.addEventListener('drop', drop);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    setupGame();
    const droppableElements = document.querySelectorAll('.droppable');
    droppableElements.forEach(element => {
        element.addEventListener('dragover', dragOver);
        element.addEventListener('drop', drop);
    });
});