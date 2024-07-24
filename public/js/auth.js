document.addEventListener("DOMContentLoaded", function () {
  const token = localStorage.getItem("authToken");
  console.log("Retrieved Token:", token); 

  fetch("/api/protected", {
    method: "GET",
    headers: {
      Authorization: `Bearer ${token}`,
      Accept: "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("content").innerHTML = `<h1>${data.message}</h1>`;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
