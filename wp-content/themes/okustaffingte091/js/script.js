const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const overlay = document.querySelector('.overlay');

// Toggle the menu and overlay on hamburger click
hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  navLinks.classList.toggle('active');
  overlay.classList.toggle('active');
});

// Close the menu and overlay when clicking outside
overlay.addEventListener('click', () => {
  closeMenu();
});

// Close the menu when clicking a navigation link
document.querySelectorAll('.nav-links a').forEach(link => {
  link.addEventListener('click', () => {
    closeMenu();
  });
});

// Function to close the menu and overlay
function closeMenu() {
  hamburger.classList.remove('active');
  navLinks.classList.remove('active');
  overlay.classList.remove('active');
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Footer intersection observer logic
document.addEventListener("DOMContentLoaded", () => {
  const footer = document.getElementById("footer");
  const observerTarget = document.createElement("div");

  observerTarget.style.position = "absolute";
  observerTarget.style.bottom = "0";
  observerTarget.style.width = "100%";
  observerTarget.style.height = "1px";
  document.body.appendChild(observerTarget);

  const observer = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting) {
        footer.style.bottom = "0"; // Show footer
      } else {
        footer.style.bottom = "-100%"; // Hide footer
      }
    },
    { root: null, threshold: 0.1 }
  );

  observer.observe(observerTarget);
});
