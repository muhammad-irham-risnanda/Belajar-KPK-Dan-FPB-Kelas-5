    const questions = [
            { number: 12, answer: "2 × 2 × 3" },
            { number: 24, answer: "2 × 2 × 2 × 3" },
            { number: 30, answer: "2 × 3 × 5" },
            { number: 40, answer: "2 × 2 × 2 × 5" },
            { number: 45, answer: "3 × 3 × 5" },
            { number: 60, answer: "2 × 2 × 3 × 5" },
            { number: 70, answer: "2 × 5 × 7" },
            { number: 90, answer: "2 × 3 × 3 × 5" },
            { number: 50, answer: "2 × 5 × 5" }
        ];

        let selectedQuestions = [];

        function getRandomQuestions() {
            const shuffled = questions.sort(() => 0.5 - Math.random());
            return shuffled.slice(0, 5);
        }

        function displayQuestions() {
            selectedQuestions = getRandomQuestions();
            const questionsDiv = document.getElementById("questions");
            questionsDiv.innerHTML = '';

            selectedQuestions.forEach((q, index) => {
                const questionDiv = document.createElement("div");
                questionDiv.className = "question";
                questionDiv.innerHTML = `
                                    <label for="answer${index + 1}">${index + 1}. Tentukan faktorisasi prima dari ${q.number}:</label><br>
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

            let finalScore = score * 20;
            document.getElementById("result").innerText = "Nilai Anda: " + finalScore;

            // Menonaktifkan textarea setelah selesai
            selectedQuestions.forEach((_, index) => {
                document.getElementById(`answer${index + 1}`).disabled = true;
            });
        }

        function resetAnswers() {
            displayQuestions();
            document.getElementById("result").innerText = '';
        }

        displayQuestions();