document.addEventListener('DOMContentLoaded', () => {
  const wrapper = document.getElementById('profile-wrapper');
  const dropdown = document.getElementById('profile-dropdown');

  // Profile elements

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


})