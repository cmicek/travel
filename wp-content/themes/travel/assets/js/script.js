/* Author: Chris Micek */
//@codekit-prepend 'jquery';

jQuery(document).ready(function($) {
  
  $('.js-site-nav--toggle').on('click', function(){
    $('body,html').toggleClass('site-nav__active');
  });

  $('.menu-item-has-children').append('<span class="menu-item-toggle">+</span>')

  $('.menu-item-has-children').on('click', '.menu-item-toggle', function(e){
    e.stopPropagation();
    var $this = $(this);
    if($this.parent().hasClass('menu-item__active')){
      $this.parent().removeClass('menu-item__active');
      $this.text('+')
    }else{
      $this.parent().addClass('menu-item__active');
      $this.text('-')
    }
  });

});