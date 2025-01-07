// Select the toggle button and menu items
let menuToggle = document.querySelector('#menu-toggle-icon');
let menuItems = document.querySelector('.menu-items');

// Add click event listener to the toggle button
menuToggle.onclick = () => {
  //menuToggle.classList.toggle('fa-times'); 
  menuItems.classList.toggle('menutoggle'); 
  document.body.classList.toggle('menutoggle');
};
