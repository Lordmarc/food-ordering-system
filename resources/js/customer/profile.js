document.addEventListener('DOMContentLoaded', () => {
  const wrapper = document.getElementById('profile-wrapper');
  const dropdown = document.getElementById('profile-dropdown');

  // Profile elements
  const content = document.getElementById('content');

  const profileBtn = document.getElementById('profile-btn');
  const profileToggle = document.getElementById('profile-toggle');

  wrapper.addEventListener('mouseenter', () => {
    dropdown.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
    dropdown.classList.remove('opacity-0', 'translate-y-[-10px]', 'pointer-events-none');
  });

  wrapper.addEventListener('mouseleave', () => {
      dropdown.classList.add('opacity-0', 'translate-y-[-10px]', 'pointer-events-none');
      dropdown.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
  });

  profileBtn.addEventListener('click', (e) => {
   
    profileToggle.classList.toggle('hidden');
  })

  document.querySelectorAll('.sidebar-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const url = this.getAttribute('href'); // ✅ this points to the link element now

    fetch(url)
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.text();
      })
      .then(html => {
        content.innerHTML = html;
      })
      .catch(err => console.error(err));
  })
});

})