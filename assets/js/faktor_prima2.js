const questions = [
    { type: 'KPK', numbers: [12, 15], answer: "60" },
    { type: 'KPK', numbers: [8, 12], answer: "24" },
    { type: 'KPK', numbers: [5, 10], answer: "30" },
    { type: 'FPB', numbers: [24, 36], answer: "12" },
    { type: 'FPB', numbers: [18, 27], answer: "9" },
    { type: 'FPB', numbers: [15, 25], answer: "5" },
    { type: 'KPK', numbers: [9, 6], answer: "18" },
    { type: 'KPK', numbers: [14, 28], answer: "28" },
    { type: 'KPK', numbers: [10, 25], answer: "50" },
    { type: 'FPB', numbers: [30, 45], answer: "15" },
    { type: 'FPB', numbers: [48, 60], answer: "12" },
    { type: 'FPB', numbers: [36, 60], answer: "12" },
    { type: 'KPK', numbers: [20, 30], answer: "60" },
    { type: 'FPB', numbers: [42, 56], answer: "14" },
    { type: 'KPK', numbers: [16, 24], answer: "48" }
];

let selectedQuestions = [];

function getRandomQuestions(num) {
    const shuffled = questions.sort(() => 0.5 - Math.random());
    return shuffled.slice(0, num);
}

function displayQuestions() {
    selectedQuestions = getRandomQuestions(10); // Mengambil 10 soal secara acak
    const questionsDiv = document.getElementById("questions");
    questionsDiv.innerHTML = '';

    selectedQuestions.forEach((q, index) => {
        const questionDiv = document.createElement("div");
        questionDiv.className = "question";
        questionDiv.innerHTML = `
            <label for="answer${index + 1}">${index + 1}. Tentukan ${q.type} dari ${q.numbers.join(' dan ')}:</label><br>
            <textarea id="answer${index + 1}" class="form-control" rows="2"></textarea>
        `;
        questionsDiv.appendChild(questionDiv);
    });
}

function checkAnswers() {
    let score = 0;
    let allAnswered = true;

    selectedQuestions.forEach((q, index) => {
        const userAnswer = document.getElementById(`answer${index + 1}`).value.trim();
        if (userAnswer === q.answer) {
            score++;
        }
        if (userAnswer === "") {
            allAnswered = false; // Jika ada jawaban yang kosong
        }
    });

    if (!allAnswered) {
        alert("Pastikan semua jawaban diisi sebelum menyelesaikan!");
        return; // Hentikan eksekusi jika ada jawaban yang kosong
    }

    let finalScore = (score / selectedQuestions.length) * 100; // Menghitung nilai berdasarkan jumlah soal
    document.getElementById("result").innerText = `Nilai Anda: ${Math.floor(finalScore)} (Jumlah Soal Benar: ${score} dari ${selectedQuestions.length})`;

    // Menonaktifkan textarea setelah selesai
    selectedQuestions.forEach((_, index) => {
        document.getElementById(`answer${index + 1}`).disabled = true;
    });
}

function resetAnswers() {
    displayQuestions();
    document.getElementById("result").innerText = '';
}

// Menampilkan soal saat halaman dimuat
displayQuestions();

const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleButton = document.getElementById('toggleButton');
const materiButton = document.getElementById('materiButton');
const materiSubmenu = document.getElementById('materiSubmenu');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-open');
    content.classList.toggle('content-collapsed');
});

materiButton.addEventListener('click', () => {
    materiSubmenu.classList.toggle('submenu-open');
});
