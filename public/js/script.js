// Navigation Menu
function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

// Carousel
document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector(".slider");
  const slides = document.querySelectorAll(".slider img");
  const navLinks = document.querySelectorAll(".slider-nav a");

  let currentIndex = 0;
  const totalSlides = slides.length;
  const intervalTime = 5000;

  function goToSlide(index) {
    slider.scrollTo({
      left: slides[index].offsetLeft,
      behavior: "smooth",
    });

    currentIndex = index;

    navLinks.forEach((link, i) => {
      if (i === currentIndex) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });
  }

  function autoSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    goToSlide(currentIndex);
  }

  let slideInterval = setInterval(autoSlide, intervalTime);

  navLinks.forEach((link, index) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      clearInterval(slideInterval);
      goToSlide(index);
      slideInterval = setInterval(autoSlide, intervalTime);
    });
  });

  goToSlide(currentIndex);
});
