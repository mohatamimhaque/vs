$(document).ready(function(){
	$(".signbefore .signinfo").click(function() {
		$(".signbefore .signinfo .dropmenu").toggleClass('your-class');
	  });
});
$(document).ready(function(){
	$('#icon, #icon2, #icon3').on('click touchstart', function () {
		$(this).toggleClass('open');
		$(this).toggleClass('open');
	});
});


const hamburger_menu = document.querySelector(".category");
const category_menu = document.querySelector(".category-menu");
hamburger_menu.addEventListener("click",() => {
    hamburger_menu.classList.toggle("category-active");
    category_menu.classList.toggle("category-menu-active");  

})



