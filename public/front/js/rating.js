// $( "fieldset" ).each(function() {
//   var array_input = $( this ).find( "input" ) 
//   index = ($( this ).attr('data-rate')-5) * -1;
//   $(array_input[index]).attr('checked', true);
//   $( ".rating > input:checked ~ label" ).addClass("active");
// });

// $( "fieldset" ).each(function() {
//   var array_input = $( this ).find( "label" );
//   index = ($( this ).attr('data-rate')-5) * -1;

//   for (var i = array_input.length - 1; i >= 0; i--) {
//   	if (index <= i ) {
//   		$(array_input[i]).addClass("active");
//   	};
//   };  
// });

$( "fieldset" ).each(function() {
  index = ($( this ).attr('data-rate')-5) * -1;

  for (var i = 4; i >= 0; i--) {
  	if (index >= i ) {
  		$( this ).append( "<label class='active'></label>" );
  	}else{
  		$( this ).append( "<label></label>" );
  	};
  };  
});

