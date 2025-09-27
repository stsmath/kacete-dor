(() => {
  // scripts/menu.js
  function menuOpenClose() {
    const buttonOpen = document.querySelector(".botao-abrir-menu");
    const buttonClose = document.querySelector(".botao-fechar-menu");
    buttonOpen.addEventListener("click", (ev) => {
      ev.preventDefault();
      document.querySelector(".mobile-menu").classList.add("active");
    });
    buttonClose.addEventListener("click", (ev) => {
      ev.preventDefault();
      document.querySelector(".mobile-menu").classList.remove("active");
    });
  }
  menuOpenClose();
})();
