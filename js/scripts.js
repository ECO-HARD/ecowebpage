AOS.init();



const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";
 
$(window).on("load resize", function() {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $dropdown.hover(
      function() {
        const $this = $(this);
        $this.addClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "true");
        $this.find($dropdownMenu).addClass(showClass);
      },
      function() {
        const $this = $(this);
        $this.removeClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "false");
        $this.find($dropdownMenu).removeClass(showClass);
      }
    );
  } else {
    $dropdown.off("mouseenter mouseleave");
  }
});



$('.fas fa-search[type=submit]').toggle(function(){
 
  $('.wrapper-simple').animate({'width':'300px'})
    .end().find('.fas fa-search[type=text]').animate({'width': '250px'})
    .end().find('.fas fa-search').animate({'marginLeft': '-5px'})
    .end().find(this).animate({'marginLeft':'22em'}).attr('value', 'CANCEL');

}, function() {

  $('.fas fa-search').animate({'width':'60px'})
    .end().find('.fas fa-search input[type=text]').animate({'width': '1px'})
    .end().find('.fas fa-search').animate({'marginLeft': '0'})
    .end().find(this).animate({'marginLeft':'0'}).attr('value', '');

});
