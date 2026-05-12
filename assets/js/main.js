const toggle = document.querySelector(".nav-toggle");
const nav = document.querySelector(".nav");
const icon = toggle?.querySelector("i");
const overlay = document.querySelector(".menu-overlay");

if (toggle && nav && icon && overlay) {
  toggle.addEventListener("click", () => {
    const isOpen = nav.classList.toggle("open");

    icon.classList.toggle("fa-bars", !isOpen);
    icon.classList.toggle("fa-xmark", isOpen);

    overlay.classList.toggle("active", isOpen);
    document.body.classList.toggle("no-scroll", isOpen);
  });

  overlay.addEventListener("click", () => {
    nav.classList.remove("open");
    overlay.classList.remove("active");
    document.body.classList.remove("no-scroll");

    icon.classList.add("fa-bars");
    icon.classList.remove("fa-xmark");
  });
}