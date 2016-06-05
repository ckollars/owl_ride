(function($){

/**
 * DOCUMENT READY
 * -------------------------------------------------------------------
 *
 */
$(document).ready(function () {

  console.log('load');
  var mobile = $('.btn--mobile');

  mobile.on("click", function() {
    var $self = $(this);

    $self.toggleClass('active');
    $self.next().toggleClass('menu--show');
  });

});

})(jQuery);
