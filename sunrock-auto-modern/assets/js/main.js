(function () {
  const header = document.querySelector('.site-header');
  const toggle = document.querySelector('[data-nav-toggle]');
  const nav = document.querySelector('[data-nav]');

  function onScroll() {
    if (!header) return;
    header.classList.toggle('is-scrolled', window.scrollY > 6);
  }

  function closeNav() {
    if (!nav || !toggle) return;
    nav.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Close on outside click.
    document.addEventListener('click', function (e) {
      if (!nav.classList.contains('is-open')) return;
      const target = e.target;
      if (!(target instanceof Element)) return;
      if (nav.contains(target) || toggle.contains(target)) return;
      closeNav();
    });

    // Close on escape.
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeNav();
    });
  }
})();

