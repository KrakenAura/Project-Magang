const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

document
  .getElementById("login-form")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const token = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");

    try {
      const response = await fetch("/api/visitor/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": token, // Correctly include the CSRF token
        },
        body: JSON.stringify({
          email: email,
          password: password,
        }),
      });

      if (response.ok) {
        const data = await response.json();
        alert("Login successful!");
        window.location.href = "/"; // Redirect to home page
      } else {
        const errorData = await response.json();
        alert("Login failed: " + errorData.message);
      }
    } catch (error) {
      console.error("Error during login:", error);
      alert("An error occurred. Please try again.");
    }
  });
