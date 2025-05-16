const targetNumbersDiv = document.getElementById('target-numbers');
const factorsDiv = document.getElementById('factors');
const draggableNumbersDiv = document.getElementById('draggable-numbers');
const resetButton = document.getElementById('reset-button');
const messageDiv = document.getElementById('message');
const answersDiv = document.getElementById('answers');

let targetNumbers, commonFactors, foundFactors;

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

function setupGame() {
  targetNumbers = generateRandomNumbers();
  commonFactors = calculateCommonFactors(targetNumbers[0], targetNumbers[1]);
  foundFactors = [];

  targetNumbersDiv.textContent = `Cari faktor persekutuan dari: ${targetNumbers[0]} dan ${targetNumbers[1]}`;
  factorsDiv.innerHTML = '';
  draggableNumbersDiv.innerHTML = '';
  messageDiv.textContent = '';
  answersDiv.textContent = 'Jawaban: ';

  for (let i = 0; i < commonFactors.length; i++) {
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

  if (commonFactors.includes(number) && !foundFactors.includes(number)) {
    foundFactors.push(number);
    event.target.classList.remove('droppable');
    event.target.style.backgroundColor = 'lightgreen';

    answersDiv.textContent = 'Jawaban: ' + foundFactors.sort((a, b) => a - b).join(', ');

    if (foundFactors.length === commonFactors.length) {
      messageDiv.textContent = 'Selamat! Semua faktor persekutuan ditemukan!';
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