const contactMap = document.querySelector('#contactMap');
const contactDirections = document.querySelector('#contactDirections');
const contactLocations = document.querySelectorAll('.contact-location');

contactLocations.forEach((location) => {
  location.addEventListener('click', () => {
    const query = location.dataset.mapQuery;
    if (!query || !contactMap || !contactDirections) return;
    contactLocations.forEach((item) => {
      const active = item === location;
      item.classList.toggle('active', active);
      item.setAttribute('aria-pressed', active ? 'true' : 'false');
    });
    const encoded = encodeURIComponent(query);
    contactMap.src = `https://maps.google.com/maps?q=${encoded}&z=15&output=embed`;
    contactMap.title = `Google Maps – Netmaster ${location.querySelector('h3')?.textContent || ''}`;
    contactDirections.href = `https://www.google.com/maps/dir/?api=1&destination=${encoded}`;
  });
});
