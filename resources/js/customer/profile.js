document.addEventListener('DOMContentLoaded', () => {

  // ----------- PROFILE DROPDOWN -----------
  const wrapper = document.getElementById('profile-wrapper');
  const dropdown = document.getElementById('profile-dropdown');
  const profileBtn = document.getElementById('profile-btn');
  const profileToggle = document.getElementById('profile-toggle');

  if (wrapper && dropdown) {
    wrapper.addEventListener('mouseenter', () => {
      dropdown.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
      dropdown.classList.remove('opacity-0', 'translate-y-[-10px]', 'pointer-events-none');
    });

    wrapper.addEventListener('mouseleave', () => {
      dropdown.classList.add('opacity-0', 'translate-y-[-10px]', 'pointer-events-none');
      dropdown.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
    });
  }

  if (profileBtn && profileToggle) {
    profileBtn.addEventListener('click', () => {
      profileToggle.classList.toggle('hidden');
    });
  }

  // ----------- ADDRESS SECTION -----------
  const addressBtn = document.getElementById('address-btn');
  const overlay = document.getElementById('overlay');
  const addressForm = document.getElementById('address-form');

  addressBtn.addEventListener('click', () => {
    overlay.classList.toggle('hidden');
    addressForm.classList.toggle('hidden');

  
  });
  overlay.addEventListener('click', () => {
    overlay.classList.toggle('hidden');
    addressForm.classList.toggle('hidden');
  })
});
