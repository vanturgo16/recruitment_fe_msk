class PasswordToggler {
  constructor(passwordClass, togglerClass) {
    this.passwordElements = document.getElementsByClassName(passwordClass);
    this.togglerElements = document.getElementsByClassName(togglerClass);
    this.attachEventListeners();
  }

  attachEventListeners() {
    for (let i = 0; i < this.togglerElements.length; i++) {
      this.togglerElements[i].addEventListener("click", () => {
        this.showHidePassword(i);
      });
    }
  }

  showHidePassword(index) {
    const passwordElement = this.passwordElements[index];
    const togglerElement = this.togglerElements[index];

    if (passwordElement.type === "password") {
      passwordElement.setAttribute("type", "text");
      togglerElement.classList.add("bi-eye");
      togglerElement.classList.remove("bi-eye-slash");
    } else {
      togglerElement.classList.remove("bi-eye");
      togglerElement.classList.add("bi-eye-slash");
      passwordElement.setAttribute("type", "password");
    }
  }
}

// Initialize the password toggler
const passwordToggler = new PasswordToggler("fakePassword", "passwordToggler");
function validatePhone(input) {
    // Only allow digits
    input.value = input.value.replace(/[^0-9]/g, '');

    // Custom logic (optional): Mark invalid if too short
    const minLength = 10; // customize as needed
    const maxLength = 15; // optional limit
    if (input.value.length < minLength || input.value.length > maxLength) {
      input.classList.add('is-invalid');
      input.classList.remove('is-valid');
    } else {
      input.classList.remove('is-invalid');
      input.classList.add('is-valid');
    }
}

const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");
function validatePasswordMatch() {
    if (confirmPassword.value === "") return; // don't validate if confirm is empty

    if (confirmPassword.value !== password.value) {
        confirmPassword.classList.add("is-invalid");
        confirmPassword.classList.remove("is-valid");
    } else {
        confirmPassword.classList.remove("is-invalid");
        confirmPassword.classList.add("is-valid");
    }
}
password.addEventListener("input", validatePasswordMatch);
confirmPassword.addEventListener("input", validatePasswordMatch);

// Remove invalid feedback and classes when clicking outside
document.addEventListener("click", function (event) {
    // Check if the clicked target is inside the form
    if (!event.target.closest(".mb-3")) {
        // Hide invalid feedback
        const invalidFeedback = document.querySelectorAll(".invalid-feedback");
        invalidFeedback.forEach((feedback) => feedback.style.display = "none");
    }
});