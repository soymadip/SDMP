// Redirect to a link after a delay
function redirect(url, delay) {
  setTimeout(() => {
    window.location.href = url;
  }, delay);
}

// Redirect to a link after a delay and a message
function redirectWithMessage(url, delay, message = null) {
  if (message) {
    const messageContainer = document.getElementById("message-container");
    if (messageContainer) {
      messageContainer.innerText = message;
    }
  }
  setTimeout(() => {
    window.location.href = url;
  }, delay);
}

// Show/hide password toggle
function togglePassword() {
  var passwordField = document.getElementById("password");
  var toggleIcon = document.getElementById("togglePassword").firstElementChild;
  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggleIcon.classList.remove("fa-eye");
    toggleIcon.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    toggleIcon.classList.remove("fa-eye-slash");
    toggleIcon.classList.add("fa-eye");
  }
}

// forgot pass button
function submitForgotPassword() {
  const form = document.getElementById("authForm");
  form.action = "src/auth.php?action=fgtpass";
}

// Add custom back button url
function SetPrevPage(redirectUrl) {
  window.onpopstate = function (event) {
    window.location.href = redirectUrl;
  };

  history.pushState(null, null, location.href);
}

// Check for empty fields in the signup form
function validateSignup() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  if (username === "" || password === "") {
    var alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
    alertModal.show();
    return false;
  }
  showUserTypeModal();
}

// Show user type modal
function showUserTypeModal() {
  var userTypeModal = new bootstrap.Modal(
    document.getElementById("userTypeModal")
  );
  userTypeModal.show();
}

document.addEventListener("DOMContentLoaded", function () {
  var element = document.querjSelector("#togglePassword");
  if (element) {
    element.addEventListener("click", togglePassword);
  }
});
