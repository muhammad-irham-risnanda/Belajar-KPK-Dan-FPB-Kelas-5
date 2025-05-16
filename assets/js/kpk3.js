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
            <h5>Soal ${index + 1}: Cari KPK dari ${pair[0]} dan ${pair[1]}:</h5>
            <input type="text" class="input-box form-control d-inline" id="answer${index + 1}" placeholder="Masukkan KPK">
        `;
        container.appendChild(questionDiv);
    });
}

function calculateLCM(a, b) {
    const gcd = (x, y) => y === 0 ? x : gcd(y, x % y); // Fungsi untuk menghitung GCD
    return (a * b) / gcd(a, b); // Menghitung KPK
}

function evaluateAnswers() {
    let correctCount = 0;
    let resultText = '';
    let allAnswered = true; // Flag to check if all questions are answered

    questions.forEach((pair, index) => {
        const userAnswer = parseInt(document.getElementById(`answer${index + 1}`).value); // Mengambil jawaban pengguna

        // Check if the answer is empty
        if (isNaN(userAnswer)) {
            allAnswered = false; // Set flag to false if any answer is empty
        } else {
            const correctAnswer = calculateLCM(pair[0], pair[1]); // Menghitung KPK yang benar

            // Memastikan jawaban pengguna benar
            const isCorrect = userAnswer === correctAnswer;
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