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
  .getElementById("loginForm")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      const response = await fetch("/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify({ email, password }),
      });

      if (response.ok) {
        const token = await response.text();
        console.log("Token:", token); // Log the token
        localStorage.setItem("authToken", token); // Store the token
        window.location.href = "/berita"; // Redirect to home or another page
      } else {
        const error = await response.json();
        document.getElementById("error").textContent =
          error.message || "Login failed";
      }
    } catch (error) {
      console.error("Error:", error);
    }
  });
