var st_toggle = (function() {
  strip = [".", "#"];

  //
  // Changes the class of the element, if specified
  //

  function changeClass($this){
   
    var classOn = $this.attr('data-toggle-class-on');
    var classOff = $this.attr('data-toggle-class-off');

    if(!classOn){
      classOn = 'active';
    }
    if(!classOff){
      classOff = 'inactive';
    }

    if($this.hasClass(classOn)){
      $this.removeClass(classOn).addClass(classOff);
      return true;
    }
    if(!$this.hasClass(classOn) && !$this.hasClass(classOff)){
      $this.addClass(classOn);
      return true;
    }
    if($this.hasClass(classOff)){
      $this.removeClass(classOff).addClass(classOn);
      return true;
    }

  }

  //
  // Changes the text of the current element, if specified
  //

  function changeText($this){
    if(!$this.attr('data-toggle-text-on') && !$this.attr('data-toggle-text-off')){
      return false;
    }
    var currentText = $this.text();
    var textOn = $this.attr('data-toggle-text-on');
    var textOff = $this.attr('data-toggle-text-off');
    if(currentText == textOn){
      $this.text(textOff);
      return true;
    }
    if(currentText == textOff){
      $this.text(textOn);
      return true;
    }
    
  }

 
  //
  // Changes the class of the target element, if specified
  //

  function changeTarget($this){
    if(!$this.attr('data-toggle-target')){
      return false;
    }

    var $target = $($this.attr('data-toggle-target'));
    var targetOn = $this.attr('data-toggle-target-on');
    var targetOff = $this.attr('data-toggle-target-off');

    if(!targetOn){
      targetOn = 'active';
    }

    if(!targetOff){
      targetOff = 'inactive';
    }

    if($target.length < 1){
      $target = $this.nextAll($this.attr('data-toggle-target'));
    }
    if($target.length < 1){
      $target = $this.parent().nextAll($this.attr('data-toggle-target'));
    }

    if(!$target.hasClass(targetOn) && !$target.hasClass(targetOff)){
      if(targetOn){
        $target.addClass(targetOn);
        return true;
      }
      if(targetOff){
        $target.addClass(targetOff);
        return true;
      }
    }
    if($target.hasClass(targetOn)){
      $target.removeClass(targetOn).addClass(targetOff);
      return true;
    }
    if($target.hasClass(targetOff)){
      $target.removeClass(targetOff).addClass(targetOn);
      return true;
    }

    return false;
  }

  //
  // If the element has siblings (based on the parent element of .js-toggles, changes their state to an alternate one.
  //

  function changeSiblings($this){
    if($this.parents('.js-toggles').length < 1){
      return false;
    }
    $this.parents('.js-toggles').find('.active').not($this).removeClass('active');

  }

  function isDropdown($this){
    if($this.attr('data-toggle') !== 'dropdown'){
      return false;
    }
    $('body').on('click', hideDropdowns($this));
  }

  function hideDropdowns(event){
    var $clicked = $(event.toElement);
    if($clicked.length < 1){
      var $clicked = $(event.explicitOriginalTarget);
    }
    var $dropdowns = $('[data-toggle="dropdown"]');
    var target = new Array;
    var $target;

    $dropdowns.each(function(){
      target.push($(this).attr('data-toggle-target'));
    });
    $target = $(target.join());
    


    if($clicked.is('[data-toggle="dropdown"]')){
      return false;
    }
    if($clicked.closest($target).length > 0){
      return false;
    }
    
    $dropdowns.removeClass('active');
    $target.removeClass('active');
  
  }

  //
  // Sets up the event handlers
  //

  function initUIBindings() {
    $('[data-toggle]').on('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      var $this = $(this);

      changeSiblings($this);
      changeClass($this);
      changeText($this);
      changeTarget($this);
    })
    $('body').on('click', hideDropdowns);

  }


  //
  // Runs on init
  //

  return {
    init : function(el) {
      initUIBindings();

    }
  }
})();