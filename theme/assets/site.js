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
  const form = document.querySelector('.contact-form');
  form?.addEventListener('submit', event => {
    event.preventDefault();
    if (!form.reportValidity()) return;
    const data = new FormData(form);
    const body = `Name: ${data.get('name')}\nEmail: ${data.get('email')}\nPhone: ${data.get('phone')}\nService: ${data.get('service')}\n\n${data.get('message')}`;
    const subject = `Project enquiry: ${data.get('service')}`;
    window.location.href = `mailto:${encodeURIComponent(form.dataset.recipient)}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    form.querySelector('.form-note').textContent = 'Your email app was requested. Send the prepared draft there, or use the Email our team link.';
  });
  const serviceCarousel = document.querySelector('[data-service-carousel]');
  if (serviceCarousel) {
    const serviceCards = Array.from(serviceCarousel.querySelectorAll('[data-service-card]'));
    let serviceIndex = serviceCards.findIndex(card => card.classList.contains('is-active'));
    if (serviceIndex < 0) serviceIndex = 0;
    const serviceCount = document.querySelector('[data-service-count]');
    const showService = nextIndex => {
      serviceIndex = (nextIndex + serviceCards.length) % serviceCards.length;
      serviceCards.forEach((card, index) => card.classList.toggle('is-active', index === serviceIndex));
      if (serviceCount) serviceCount.textContent = `${String(serviceIndex + 1).padStart(2, '0')} / ${String(serviceCards.length).padStart(2, '0')}`;
    };
    document.querySelector('[data-service-prev]')?.addEventListener('click', () => showService(serviceIndex - 1));
    document.querySelector('[data-service-next]')?.addEventListener('click', () => showService(serviceIndex + 1));
  }
  const slides = Array.from(document.querySelectorAll('.quote-slide'));
  let active = 0;
  document.querySelectorAll('[data-quote]').forEach(button => button.addEventListener('click', () => {
    active = (active + Number(button.dataset.quote) + slides.length) % slides.length;
    slides.forEach((slide, index) => { slide.hidden = index !== active; });
    document.querySelector('.quote-count').textContent = `${String(active + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;
  }));
})();
