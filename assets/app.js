const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));

document.querySelectorAll('#mainNav a').forEach((link) => {
  link.addEventListener('click', () => {
    if (link.classList.contains('dropdown-toggle')) return;
    const nav = document.querySelector('#mainNav');
    if (nav.classList.contains('show') && window.bootstrap) {
      bootstrap.Collapse.getOrCreateInstance(nav).hide();
    }
  });
});

const locationMap = document.querySelector('#locationMap');
document.querySelectorAll('footer .footer-main').forEach((footer) => {
  const en = location.pathname.startsWith('/en');
  const it = location.pathname.startsWith('/it');
  const r = en ? {home:'/en',about:'/en/about-us',franchise:'/en/franchising',services:'/en/services',contact:'/en/contact',jobs:'/en/careers'} : it ? {home:'/it',about:'/it/chi-siamo',franchise:'/it/franchising',services:'/it/servizi',contact:'/it/contatti',jobs:'/it/carriere'} : {home:'/',about:'/ueber-uns',franchise:'/franchising',services:'/dienstleistungen',contact:'/kontakt',jobs:'/stellenangebote'};
  const l = en ? {office:'Head office Zurich',about:'About us',services:'Services',contact:'Contact',jobs:'Careers'} : it ? {office:'Sede principale Zurigo',about:'Chi siamo',services:'Servizi',contact:'Contatti',jobs:'Carriere'} : {office:'Hauptsitz Zürich',about:'Über uns',services:'Dienstleistungen',contact:'Kontakt',jobs:'Stellenangebote'};
  footer.innerHTML = `<div class="footer-logo"><a class="brand brand-light" href="${r.home}"><img src="/assets/images/logo.png" alt="Netmaster"></a></div><div class="footer-office"><h3>${l.office}</h3><address>Netmaster (Schweiz) AG<br>Zugerstrasse 162<br>CH–8820 Wädenswil<br><a href="mailto:info@netmaster.ch">info@netmaster.ch</a><br><a href="tel:+41445424747">+41 (0) 44 542 47 47</a></address></div><nav class="footer-navigation"><h3>Navigation</h3><a href="${r.home}">Home</a><a href="${r.about}">${l.about}</a><a href="${r.franchise}">Franchising</a><a href="${r.services}">${l.services}</a><a href="${r.contact}">${l.contact}</a><div class="footer-languages"><a href="/it">It</a><a href="/en">En</a><a href="/">De</a></div><a class="footer-jobs" href="${r.jobs}">${l.jobs}</a></nav>`;
});

const mapDirections = document.querySelector('#mapDirections');
const locationOptions = document.querySelectorAll('.location-option');

locationOptions.forEach((option) => {
  option.addEventListener('click', () => {
    const query = option.dataset.mapQuery;
    if (!query || !locationMap || !mapDirections) return;

    locationOptions.forEach((item) => {
      const selected = item === option;
      item.classList.toggle('active', selected);
      item.setAttribute('aria-pressed', selected ? 'true' : 'false');
    });

    const encodedQuery = encodeURIComponent(query);
    locationMap.src = `https://maps.google.com/maps?q=${encodedQuery}&z=15&output=embed`;
    locationMap.title = `Google Maps – Netmaster ${option.querySelector('strong')?.textContent || ''}`;
    mapDirections.href = `https://www.google.com/maps/dir/?api=1&destination=${encodedQuery}`;
  });
});

document.querySelectorAll('.dropdown-item[href="https://propertymaster.ch"]').forEach((link) => {
  link.href = window.location.pathname.startsWith('/en') ? '/en/propertymaster'
    : window.location.pathname.startsWith('/it') ? '/it/propertymaster' : '/propertymaster.php';
});

document.querySelectorAll('.dropdown-item[href="https://jobsmaster.ch"]').forEach((link) => {
  link.href = window.location.pathname.startsWith('/en') ? '/en/jobsmaster'
    : window.location.pathname.startsWith('/it') ? '/it/jobsmaster' : '/jobsmaster.php';
});

document.querySelectorAll('.nav-item.dropdown').forEach((dropdown) => {
  const toggle = dropdown.querySelector(':scope > .dropdown-toggle');
  if (!toggle) return;

  const isServicesMenu = toggle.textContent.includes('Dienstleistungen')
    || toggle.textContent.includes('Services')
    || toggle.textContent.includes('Servizi')
    || toggle.getAttribute('href') === '/dienstleistungen'
    || toggle.getAttribute('href') === '/en/services'
    || toggle.getAttribute('href') === '/it/servizi';

  if (!isServicesMenu) return;

  const servicesRoute = window.location.pathname.startsWith('/en') ? '/en/services'
    : window.location.pathname.startsWith('/it') ? '/it/servizi' : '/dienstleistungen';

  toggle.href = servicesRoute;
  toggle.addEventListener('click', (event) => {
    event.preventDefault();
    if (window.matchMedia('(max-width: 991px)').matches) {
      event.stopPropagation();
      const menu = dropdown.querySelector(':scope > .dropdown-menu');
      if (dropdown.classList.contains('show')) {
        window.location.href = servicesRoute;
        return;
      }
      document.querySelectorAll('#mainNav .nav-item.dropdown.show').forEach((item) => {
        if (item !== dropdown) {
          item.classList.remove('show');
          item.querySelector(':scope > .dropdown-menu')?.classList.remove('show');
          item.querySelector(':scope > .dropdown-toggle')?.setAttribute('aria-expanded', 'false');
        }
      });
      dropdown.classList.add('show');
      menu?.classList.add('show');
      toggle.setAttribute('aria-expanded', 'true');
      return;
    }
    event.stopImmediatePropagation();
    window.location.href = servicesRoute;
  }, true);
});

const englishRoutes = {
  '/': '/en',
  '/ueber-uns': '/en/about-us',
  '/franchising': '/en/franchising',
  '/dienstleistungen': '/en/services',
  '/kontakt': '/en/contact',
  '/stellenangebote': '/en/careers',
  '/login': '/en/login',
  '/register': '/en/register',
  '/marketingmaster.php': '/en/marketingmaster',
  '/salesmaster.php': '/en/salesmaster',
  '/callmaster': '/en/callmaster',
  '/propertymaster.php': '/en/propertymaster',
  '/jobsmaster.php': '/en/jobsmaster',
  '/it': '/en', '/it/chi-siamo': '/en/about-us', '/it/franchising': '/en/franchising',
  '/it/servizi': '/en/services', '/it/contatti': '/en/contact', '/it/carriere': '/en/careers',
  '/it/login': '/en/login', '/it/registrazione': '/en/register',
  '/it/marketingmaster': '/en/marketingmaster', '/it/salesmaster': '/en/salesmaster',
  '/it/callmaster': '/en/callmaster', '/it/propertymaster': '/en/propertymaster',
  '/it/jobsmaster': '/en/jobsmaster'
};

const italianRoutes = {
  '/': '/it', '/ueber-uns': '/it/chi-siamo', '/franchising': '/it/franchising',
  '/dienstleistungen': '/it/servizi', '/kontakt': '/it/contatti',
  '/stellenangebote': '/it/carriere', '/login': '/it/login', '/register': '/it/registrazione',
  '/marketingmaster.php': '/it/marketingmaster', '/salesmaster.php': '/it/salesmaster',
  '/callmaster': '/it/callmaster', '/propertymaster.php': '/it/propertymaster',
  '/jobsmaster.php': '/it/jobsmaster',
  '/it': '/it', '/it/chi-siamo': '/it/chi-siamo', '/it/franchising': '/it/franchising',
  '/it/servizi': '/it/servizi', '/it/contatti': '/it/contatti', '/it/carriere': '/it/carriere',
  '/it/login': '/it/login', '/it/registrazione': '/it/registrazione',
  '/it/marketingmaster': '/it/marketingmaster', '/it/salesmaster': '/it/salesmaster',
  '/it/callmaster': '/it/callmaster', '/it/propertymaster': '/it/propertymaster',
  '/it/jobsmaster': '/it/jobsmaster',
  '/en': '/it', '/en/about-us': '/it/chi-siamo', '/en/franchising': '/it/franchising',
  '/en/services': '/it/servizi', '/en/contact': '/it/contatti', '/en/careers': '/it/carriere',
  '/en/login': '/it/login', '/en/register': '/it/registrazione',
  '/en/marketingmaster': '/it/marketingmaster', '/en/salesmaster': '/it/salesmaster',
  '/en/callmaster': '/it/callmaster', '/en/propertymaster': '/it/propertymaster',
  '/en/jobsmaster': '/it/jobsmaster'
};

const normalizedPath = window.location.pathname.replace(/\/$/, '') || '/';
document.querySelectorAll('.dropdown-item').forEach((link) => {
  if (link.textContent.trim() !== 'English') return;
  link.href = englishRoutes[normalizedPath] || '/en';
});

document.querySelectorAll('.dropdown-item').forEach((link) => {
  if (link.textContent.trim() !== 'Italiano') return;
  link.href = italianRoutes[normalizedPath] || '/it';
});
