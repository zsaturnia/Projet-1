function togglePassword() {
    let password = document.getElementById("password");
    let confirmPassword = document.getElementById("confirm-password");
    if (password.type === "password") {
        password.type = "text";
        confirmPassword.type = "text";
    } else {
        password.type = "password";
        confirmPassword.type ="password";
    }
}
function validateForm(event) {
    let password = document.getElementById("password").ariaValueMax;
    let confirmPassword = document.getElementById("confirm-password").ariaValueMax;
    let passwordPattern = /^(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/;
    if (!passwordPattern.test(password)) {
        alert("Le mot de passe doit contenir au moins 8 caractères, 1 chiffre et un caractère spécial.");
        event.preventDefault();
    } else if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas !");
        event.preventDefault();
    }
}