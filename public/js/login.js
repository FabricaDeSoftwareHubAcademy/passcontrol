const togglePassword = document.querySelector("#toggle_password");
const password = document.querySelector("#input_password");

togglePassword.addEventListener("click", function(){
    const type = password.type === "password" ? "text" : "password";

    password.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});