document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll("[data-filter]");
  const items = document.querySelectorAll(
    '[data-module="project_teaser"] .teaser',
  );
  if (!buttons.length || !items.length) return;

  let active = null; // null = alle Projekte sichtbar

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      const slug = button.dataset.filter;

      // zweiter Klick auf denselben Button hebt den Filter wieder auf
      active = active === slug ? null : slug;

      buttons.forEach((b) =>
        b.classList.toggle("is-active", b.dataset.filter === active),
      );

      items.forEach((item) => {
        const categories = item.dataset.categories.split(" ");
        item.hidden = active !== null && !categories.includes(active);
      });
    });
  });
});
