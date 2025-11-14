document.addEventListener('DOMContentLoaded', () => {

  // ------------ VERIFY PASSWORD ------------
  const showPassword = document.querySelector('.show-password');
  const verifyPassword = document.querySelector('.verify-password');

  if (showPassword && verifyPassword) {
    showPassword.addEventListener('click', () => {
      if(verifyPassword.type === 'password') {
        verifyPassword.type = 'text'
        showPassword.innerHTML = `<i class="fa-solid fa-eye-slash text-slate-500"></i>`
      }else {
        verifyPassword.type = 'password'
        showPassword.innerHTML = `<i class="fa-solid fa-eye text-slate-500"></i>`
      }
    })
  }
  
  // ------------ CHANGE PASSWORD ------------


  const eyeContainer = document.querySelectorAll('.eye-container');
  if (eyeContainer)
  {

    eyeContainer.forEach(container => {
    container.addEventListener('click', () => {
    console.log('clicked!');
    const passwordInput =container.previousElementSibling;
    if(passwordInput.type === 'password')
    {
      container.innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
      passwordInput.type = 'text'
    }else {
      passwordInput.type = 'password'
   
      container.innerHTML = `<i class="fa-solid fa-eye"></i>`;
    }
  });
    })
 }

 // ------------ BACK PAGE --------------------
 const backPage = document.querySelector('.fa-arrow-left-long');

 backPage.addEventListener('click', () => {
  window.history.back();
 })
  
})