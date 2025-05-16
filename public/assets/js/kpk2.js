const totalQuestions = 5;
let questions = [];

function generateQuestions() {
    questions = [];
    const uniquePairs = new Set(); // Set untuk menyimpan pasangan angka unik
    while (uniquePairs.size < totalQuestions) {
        const num1 = Math.floor(Math.random() * 15) + 1; // Ubah rentang angka menjadi 1-15
        const num2 = Math.floor(Math.random() * 15) + 1;
        // Menyimpan pasangan angka dalam format string untuk memastikan keunikan
        if (num1 !== num2) { // Pastikan angka tidak sama
            uniquePairs.add(`${Math.min(num1, num2)},${Math.max(num1, num2)}`);
        }
    }
    questions = Array.from(uniquePairs).map(pair => pair.split(',').map(Number)); // Mengubah Set menjadi Array
    displayQuestions();
}

function displayQuestions() {
    const container = document.getElementById('questions-container');
    container.innerHTML = ''; // Clear previous questions
    questions.forEach((pair, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.className = 'question';
        questionDiv.innerHTML = `
            <h5>Soal ${index + 1}: Cari kelipatan persekutuan dari ${pair[0]} dan ${pair[1]}:</h5>
            <input type="text" class="input-box form-control d-inline" id="answer${index + 1}" placeholder="Masukkan kelipatan persekutuan">
        `;
        container.appendChild(questionDiv);
    });
}

function calculateCommonMultiples(a, b) {
    const multiples = [];
    for (let i = 1; i <= 10; i++) {
        multiples.push(a * i);
        multiples.push(b * i);
    }
    return multiples;
}

function evaluateAnswers() {
    let correctCount = 0;
    let resultText = '';
    let allAnswered = true; // Flag to check if all questions are answered

    questions.forEach((pair, index) => {
        const userAnswer = document.getElementById(`answer${index + 1}`).value.trim(); // Get user input and trim whitespace

        // Check if the answer is empty
        if (userAnswer === '') {
            allAnswered = false; // Set flag to false if any answer is empty
        } else {
            const commonMultiples = calculateCommonMultiples(pair[0], pair[1]);
            const userAnswersArray = userAnswer.split(',').map(Number); // Split and convert to numbers

            // Check if the user's answers are correct
            const isCorrect = userAnswersArray.length > 1 && userAnswersArray.every(answer => commonMultiples.includes(answer));
            if (isCorrect) {
                correctCount++;
            }
            resultText += `Soal ${index + 1}: ${isCorrect ? "Benar" : "Salah"}<br>`;
        }
    });

    // If not all questions are answered, show an alert
    if (!allAnswered) {
        alert("Silakan jawab semua soal sebelum menekan tombol 'Selesai'.");
        return; // Exit the function early
    }

    // Calculate score based on correct answers
    const score = correctCount * 20; // Each correct answer is worth 20 points
    document.getElementById('result').innerHTML = resultText;
    document.getElementById('score').innerHTML = `Nilai Anda: ${score} (Anda mendapatkan ${correctCount} dari ${totalQuestions} jawaban benar)`; // Display score
}

function resetQuiz() {
    generateQuestions();
    document.getElementById('result').innerHTML = '';
    document.getElementById('score').innerHTML = ''; // Reset nilai
}

// Generate questions on page load
window.onload = generateQuestions;