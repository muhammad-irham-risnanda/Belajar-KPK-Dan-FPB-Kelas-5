const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleButton = document.getElementById('toggleButton');
const materiButton = document.getElementById('materiButton');
const materiSubmenu = document.getElementById('materiSubmenu');
const videoButton = document.getElementById('videoButton');
const videoSubmenu = document.getElementById('videoSubmenu');
const latihanButton = document.getElementById('latihanButton');
const latihanSubmenu = document.getElementById('latihanSubmenu');
const quizButton = document.getElementById('quizButton');
const quizSubmenu = document.getElementById('quizSubmenu');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-open');
    content.classList.toggle('content-collapsed');
});

materiButton.addEventListener('click', () => {
    materiSubmenu.classList.toggle('submenu-open');

});
videoButton.addEventListener('click', () => {
    videoSubmenu.classList.toggle('submenu-open');
});
latihanButton.addEventListener('click', () => {
    latihanSubmenu.classList.toggle('submenu-open');
});
quizButton.addEventListener('click', () => {
    quizSubmenu.classList.toggle('submenu-open');
});