jQuery(document).ready(function($) {
  $( "tbody" ).hover(function() {
    $( ".clickable-row" ).click(function() {
      window.document.location = $(this).data("href");
    });
  });
});
