function showPassword() {
    var passwordInput = document.getElementById("password");
    var configPasswordInput = document.getElementById("config-password");
    var checkbox = document.getElementById("check");

    passwordInput.type = checkbox.checked ? "text" : "password";
    configPasswordInput.type = checkbox.checked ? "text" : "password";
}