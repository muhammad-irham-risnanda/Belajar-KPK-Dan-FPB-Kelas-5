const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleButton = document.getElementById('toggleButton');
const materiButton = document.getElementById('materiButton');
const targetNumbersDiv = document.getElementById('target-numbers');
const draggableNumbersDiv = document.getElementById('draggable-numbers');
const answerBox = document.getElementById('answer-box');
const answerSpan = document.getElementById('answer');
const resetButton = document.getElementById('reset-button');
const messageDiv = document.getElementById('message');

let targetNumbers, actualFPB;

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-open');
    content.classList.toggle('content-collapsed');
});

materiButton.addEventListener('click', () => {
    const materiSubmenu = document.getElementById('materiSubmenu');
    materiSubmenu.classList.toggle('submenu-open');
});

function generateRandomNumbers() {
    const num1 = Math.floor(Math.random() * (30 - 15 + 1)) + 15;
    const num2 = Math.floor(Math.random() * (30 - 15 + 1)) + 15;
    return [num1, num2];
}

function calculateCommonFactors(num1, num2) {
    const factors1 = calculateFactors(num1);
    const factors2 = calculateFactors(num2);
    return factors1.filter(factor => factors2.includes(factor));
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

function calculateFPB(num1, num2) {
    const commonFactors = calculateCommonFactors(num1, num2);
    return Math.max(...commonFactors);
}

function setupGame() {
    targetNumbers = generateRandomNumbers();
    actualFPB = calculateFPB(targetNumbers[0], targetNumbers[1]);
    targetNumbersDiv.textContent = `Cari FPB dari: ${targetNumbers[0]} dan ${targetNumbers[1]}`;
    draggableNumbersDiv.innerHTML = '';
    answerSpan.textContent = '';
    messageDiv.textContent = '';

    for (let i = 1; i <= 30; i++) {
        const numberDiv = document.createElement('div');
        numberDiv.textContent = i;
        numberDiv.className = 'draggable';
        numberDiv.setAttribute('draggable', true);
        numberDiv.addEventListener('dragstart', dragStart);
        draggableNumbersDiv.appendChild(numberDiv);
    }

    answerBox.addEventListener('drop', drop);
    answerBox.addEventListener('dragover', dragOver);
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
    answerSpan.textContent = draggedNumber;

    const selectedNumber = parseInt(draggedNumber);

    if (selectedNumber === actualFPB) {
        messageDiv.textContent = 'Selamat! Anda menemukan FPB yang benar!';
        answerBox.removeEventListener('drop', drop);
        answerBox.removeEventListener('dragover', dragOver);
    } else {
        messageDiv.textContent = 'Salah! Coba lagi.';
        answerBox.removeEventListener('drop', drop);
        answerBox.removeEventListener('dragover', dragOver);
    }
}

resetButton.addEventListener('click', () => {
    setupGame();
});

document.addEventListener('DOMContentLoaded', () => {
    setupGame();
});