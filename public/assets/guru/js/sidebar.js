$(document).ready(function () {
    // Toggle submenu visibility
    $('#guru_dan_siswaDropdown').on('click', function () {
        $('#guru_dan_siswasMenu').toggleClass('hidden');
    });

    $('#soalsDropdown').on('click', function () {
        $('#soalsMenu').toggleClass('hidden');
    });

    $('#nilaisDropdown').on('click', function () {
        $('#nilaisMenu').toggleClass('hidden');
    });

    // Toggle sidebar visibility
    $('#toggleSidebar').on('click', function () {
        $('#sidebar').toggleClass('sidebar-hidden');
        // Hide all submenus when sidebar is closed
        $('#guru_dan_siswasMenu').addClass('hidden');
        $('#soalsMenu').addClass('hidden');
        $('#nilaisMenu').addClass('hidden');
    });
});