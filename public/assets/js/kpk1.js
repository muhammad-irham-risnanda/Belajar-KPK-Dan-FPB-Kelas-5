const totalQuestions = 5;
let questions = [];

function generateQuestions() {
    questions = [];
    const uniqueNumbers = new Set(); // Set untuk menyimpan angka unik
    while (uniqueNumbers.size < totalQuestions) {
        const randomNumber = Math.floor(Math.random() * 20) + 1;
        uniqueNumbers.add(randomNumber);
    }
    questions = Array.from(uniqueNumbers); // Mengubah Set menjadi Array
    displayQuestions();
}

function displayQuestions() {
    const container = document.getElementById('questions-container');
    container.innerHTML = ''; // Clear previous questions
    questions.forEach((number, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.className = 'question';
        questionDiv.innerHTML = `
                    <h5>Soal ${index + 1}: Cari kelipatan dari ${number}:</h5>
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}1" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}2" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}3" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}4" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}5" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}6" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}7" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}8" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}9" maxlength="3">
                    <input type="text" class="input-box form-control d-inline" id="answer${index + 1}10" maxlength="3">
                `;
        container.appendChild(questionDiv);
    });
}

function evaluateAnswers() {
    let correctCount = 0;
    let resultText = '';
    let allAnswered = true; // Flag to check if all questions are answered

    questions.forEach((number, index) => {
        const correctAnswers = [];
        for (let i = 1; i <= 10; i++) {
            correctAnswers.push(number * i);
        }

        const userAnswers = [];
        for (let i = 1; i <= 10; i++) {
            const answer = document.getElementById(`answer${index + 1}${i}`).value;
            userAnswers.push(parseInt(answer));
            // Check if the answer is empty
            if (answer === '') {
                allAnswered = false; // Set flag to false if any answer is empty
            }
        }

        const isCorrect = userAnswers.every((answer, idx) => answer === correctAnswers[idx]);
        if (isCorrect) {
            correctCount++;
        }
        resultText += `Soal ${index + 1}: ${isCorrect ? "Benar" : "Salah"}<br>`;
    });

    if (!allAnswered) {
        alert("Silakan jawab semua soal sebelum menekan tombol 'Selesai'.");
        return; // Exit the function if not all questions are answered
    }

    // Nilai langsung berdasarkan jumlah jawaban yang benar
    const score = correctCount * 20; // Setiap jawaban benar bernilai 20
    document.getElementById('result').innerHTML = resultText;
    document.getElementById('score').innerHTML = `Nilai Anda: ${score} (Anda mendapatkan ${correctCount} dari ${totalQuestions} jawaban benar)`; // Menampilkan nilai di bawah
}

function resetQuiz() {
    generateQuestions();
    document.getElementById('result').innerHTML = '';
    document.getElementById('score').innerHTML = ''; // Reset nilai
}

// Generate questions on page load
window.onload = generateQuestions;