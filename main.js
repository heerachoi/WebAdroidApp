//Hamburger menu
const menuBtn = document.querySelector('.menu-btn');
let menuOpen = false;
menuBtn.addEventListener('click', () => {
    if(!menuOpen) {
        menuBtn.classList.add('open');
        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        menuOpen = false;
    }
})

// Scrolls smoothly to top 
$(function() {
	$('#up').on('click', function () {
			$('html, body').animate({
				scrollTop: 0
			}, 2000);
	});
});









