
/* Author: Chris Micek */

function loadGalleryImage($, $this){
  if($this.hasClass('active')){
    return false;
  }
  $('.gallery--large').addClass('loading').parents('.gallery').find('.gallery-item').removeClass('active');

    setTimeout(function(){
      $('.gallery--large').find('img').attr('src', $this.find('.gallery-icon').data('full'));

      

      $('.gallery--large').find('figcaption').text($this.find('dd').text());
      
      if($this.find('dd').text().length > 0){
        $('.gallery--large').find('figcaption').addClass('in');
      }else{
        $('.gallery--large').find('figcaption').removeClass('in');
      }
      setTimeout(function(){
        $('.gallery--large').removeClass('loading');
      }, 100);
  }, 250);
  
  $this.addClass('active');
}

function buildGalleryImage($, $this){
  var $galleryImg = $('<figure class="gallery--large"><div class="img"><img class="gallery--large--item" /><figcaption></figcaption></div></figure>');
  $galleryImg.find('img').attr('src', $this.find('.gallery-icon').data('full'));
  $galleryImg.find('figcaption').text($this.find('dd').text());
  
  if($this.find('dd').text().length > 0){
    $galleryImg.find('figcaption').addClass('in');
  }else{
    $galleryImg.find('figcaption').removeClass('in');
  }

  $this.addClass('active');
  return $galleryImg;
}

jQuery(document).ready(function($) {
  

  // Nav Menu

  $('.js-site-nav--toggle').on('click', function(){
    $('body,html').toggleClass('site-nav__active');
  });

  $('.menu-item-has-children').append('<span class="menu-item-toggle">+</span>');

  $('.menu-item-has-children').on('click', '.menu-item-toggle', function(e){
    e.stopPropagation();
    var $this = $(this);
    if($this.parent().hasClass('menu-item__active')){
      $this.parent().removeClass('menu-item__active');
      $this.text('+');
    }else{
      $this.parent().addClass('menu-item__active');
      $this.text('-');
    }
  });


  // Comment Toggles

  $('.js-comment--toggle').on("click", function(e){
    e.preventDefault();
    var $this = $(this);
    $this.parents('article').find('.comment--form').toggleClass('in');

  });

  $('.js-post--comments--count').on('click', function(e){
    e.preventDefault();
    var $this = $(this);
    $this.parents('article').find('.comment--list').toggleClass('in');
  });

  // Gallery
  $('.gallery-item').on('click', function(e){
    e.preventDefault();
    loadGalleryImage($, $(this));
  });

  $('.gallery').on('click', '.gallery--large--item', function(e){
    e.preventDefault();
    var $this = $(this);
    var $next = $this.parents('.gallery').find('.gallery-item.active').nextAll('.gallery-item').first();

    if($next.length > 0){
      loadGalleryImage($, $next);
    }else{
      loadGalleryImage($, $this.parents('.gallery').find('.gallery-item').first());
    }
    
  });

  
  $('.gallery').prepend(buildGalleryImage($, $('.gallery').find('.gallery-item').first()));
  $('.gallery-item').each(function(){
    $('<img/>')[0].src = $(this).find('.gallery-icon').data('full');
  });
  

});


