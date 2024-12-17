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
                    "X-CSRF-TOKEN": token,
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                }),
            });

            if (response.ok) {
                const data = await response.json();
                alert("Login successful!");
                window.location.href = "/";
            } else {
                const errorData = await response.json();
                alert("Login failed: " + errorData.message);
            }
        } catch (error) {
            console.error("Error during login:", error);
            alert("An error occurred. Please try again.");
        }
    });

document
    .getElementById("regis-form")
    .addEventListener("submit", async function (event) {
        event.preventDefault();

        // Get form field values
        const name = this.querySelector('input[name="name"]').value;
        const email = this.querySelector('input[name="email-regis"]').value;
        const password = this.querySelector(
            'input[name="password-regis"]'
        ).value;
        const token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        try {
            // Send POST request to the visitor registration route
            const response = await fetch("/api/visitor/register", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token,
                },
                body: JSON.stringify({ name, email, password }),
            });

            // Handle response
            if (response.ok) {
                alert("Registration successful!");
                window.location.href = "/"; // Redirect to homepage or desired page
            } else {
                const errorData = await response.json();
                alert("Registration failed: " + errorData.message);
            }
        } catch (error) {
            console.error("Error during registration:", error);
            alert("An error occurred. Please try again.");
        }
    });
