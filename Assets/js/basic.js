
// ! Burger Menu
jQuery('.burger-button').on('click', function () {
    jQuery(this).toggleClass('open');
    jQuery('body').toggleClass('nav-open');
});

// ! Nav on scroll
const newNav = () => {
    let navigation = document.querySelector('.elementor-location-header');
    window.addEventListener('scroll', () => {
      if(document.body.scrollTop > 150 || document.documentElement.scrollTop > 150 ) {
        navigation.classList.add('navbar-transition');
      } else {
        navigation.classList.remove('navbar-transition');
      }
    });
  
  }
  
newNav();
