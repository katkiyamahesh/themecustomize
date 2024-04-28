( function( $ ) {
	$('.hfe-nav-menu-icon').on('click',function(){

    $('.hfe-nav-menu__toggle.elementor-clickable').toggleClass('hfe-active-menu');
		var demo=$('.hfe-nav-menu__toggle').hasClass('hfe-active-menu');	
    	 if(demo){
          $('.hfe-nav-menu-icon i').removeClass('fas fa-align-justify');
          $('.hfe-nav-menu-icon i').addClass('far fa-window-close');
     
          }else{
          	 $('.hfe-nav-menu-icon i').addClass('fas fa-align-justify');
             $('.hfe-nav-menu-icon i').removeClass('far fa-window-close');
          }
  // alert("woking");
	});
     

       if($(window).width() < 1024){
       	// alert("gggg");
       $('.hfe-nav-menu__layout-horizontal').addClass('hfe-dropdown');
       }

      elementor.channels.editor.on( 'MyClickEvent',() => alert( 'This is where you do your stuff') );


} )( jQuery );

     
                        