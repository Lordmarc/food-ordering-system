document.addEventListener('DOMContentLoaded', () => {
  
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
  
})