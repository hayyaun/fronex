(() => {
  'use strict';
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !reducedMotion.matches) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08 });
    reveals.forEach(el => { el.classList.add('will-reveal'); observer.observe(el); });
    reducedMotion.addEventListener('change', event => {
      if (event.matches) reveals.forEach(el => el.classList.add('is-visible'));
    });
  }
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.primary-nav');
  const closeMenu = () => { toggle.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); };
  toggle?.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') !== 'true';
    toggle.setAttribute('aria-expanded', String(open));
    nav.classList.toggle('is-open', open);
  });
  nav?.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && toggle?.getAttribute('aria-expanded') === 'true') { closeMenu(); toggle.focus(); }
  });
  window.matchMedia('(min-width: 901px)').addEventListener('change', event => { if (event.matches && toggle) closeMenu(); });
  const services = document.querySelectorAll('.service');
  services.forEach(service => service.addEventListener('toggle', () => {
    if (service.open) services.forEach(other => { if (other !== service) other.open = false; });
  }));
  const slides = Array.from(document.querySelectorAll('.quote-slide'));
  let active = 0;
  document.querySelectorAll('[data-quote]').forEach(button => button.addEventListener('click', () => {
    active = (active + Number(button.dataset.quote) + slides.length) % slides.length;
    slides.forEach((slide, index) => { slide.hidden = index !== active; });
    document.querySelector('.quote-count').textContent = `${String(active + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;
  }));
})();
