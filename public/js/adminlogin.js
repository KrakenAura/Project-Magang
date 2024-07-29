document.addEventListener("DOMContentLoaded", function () {
  // Login functionality
  // document
  //   .querySelector(".login form")
  //   .addEventListener("submit", async function (event) {
  //     event.preventDefault();

  //     const email = document.getElementById("email").value;
  //     const password = document.getElementById("password").value;
  //     const token = document
  //       .querySelector('meta[name="csrf-token"]')
  //       .getAttribute("content");
  //     console.log(email, password, token);
  //     try {
  //       const response = await fetch("/api/admin/login", {
  //         method: "POST",
  //         headers: {
  //           "Content-Type": "application/json",
  //           "X-CSRF-TOKEN": token,
  //         },
  //         body: JSON.stringify({ email, password }),
  //       });
  //       console.log(response);

  //       if (response.ok) {
  //         alert("Login successful!");
  //         window.location.href = "/";
  //       } else {
  //         const errorData = await response.json();
  //         alert("Login failed: " + errorData.message);
  //       }
  //     } catch (error) {
  //       console.error("Error during login:", error);
  //       alert("An error occurred. Please try again.");
  //     }
  //   });

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
        const response = await fetch("/api/admin/login", {
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
          window.location.href = "admin/dashboard";
        } else {
          const errorData = await response.json();
          alert("Login failed: " + errorData.message);
        }
      } catch (error) {
        console.error("Error during login:", error);
        alert("An error occurred. Please try again.");
      }
    });

  // Register functionality
  document
    .querySelector(".signup form")
    .addEventListener("submit", async function (event) {
      event.preventDefault();

      const name = this.querySelector('input[name="txt"]').value;
      const email = this.querySelector('input[name="email"]').value;
      const password = this.querySelector('input[name="pswd"]').value;
      const token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

      try {
        const response = await fetch("/api/admin/register", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token,
          },
          body: JSON.stringify({ name, email, password }),
        });

        if (response.ok) {
          alert("Registration successful!");
          // window.location.href = "/dashboard";
        } else {
          const errorData = await response.json();
          alert("Registration failed: " + errorData.message);
        }
      } catch (error) {
        console.error("Error during registration:", error);
        alert("An error occurred. Please try again.");
      }
    });
});
