console.log("je vois ma fonction dans le fichier burger-menu.js");

document.addEventListener("DOMContentLoaded", function () {
  const burgerMenu = document.querySelector(".burger-menu");
  const nav = document.querySelector(".nav");

  burgerMenu.addEventListener("click", function () {
    nav.classList.toggle("show");
  });
});

// Fermer le menu lorsqu'un lien est cliqué (optionnel)
// const navLinks = document.querySelectorAll(".nav a");
// navLinks.forEach(function (link) {
//   link.addEventListener("click", function () {
//     nav.classList.remove("show");
//   });
// });
