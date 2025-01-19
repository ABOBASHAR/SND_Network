const passwordField = document.getElementById('password');
const togglePassword = document.getElementById('toggle-password');
const eyeIcon = document.getElementById('eyeIcon');

// SVG paths for "eye" and "eye-slash"
const eyeSVG = `
    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm0-10a4 4 0 100 8 4 4 0 000-8z"/>
`;
const eyeSlashSVG = `
    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"/>
    <line x1="3" y1="3" x2="21" y2="21" stroke="#888" stroke-width="2" />
`;

togglePassword.addEventListener('click', function () {
    // Toggle the type attribute
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;

    // Change the SVG icon
    eyeIcon.innerHTML = type === 'password' ? eyeSVG : eyeSlashSVG;
});
