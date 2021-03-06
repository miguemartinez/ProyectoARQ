jQuery(document).ready(function($){
	//alert("ctm");
	var formModal = $('.cd-user-modal'),
		formLogin = formModal.find('#cd-login'),
		formSignup = formModal.find('#cd-signup'),
		formForgotPassword = formModal.find('#cd-reset-password'),
		formModalTab = $('.cd-switcher'),
		tabLogin = formModalTab.children('li').eq(0).children('a'),
		tabSignup = formModalTab.children('li').eq(1).children('a'),
		forgotPasswordLink = formLogin.find('.cd-form-bottom-message a'),
		backToLoginLink = formForgotPassword.find('.cd-form-bottom-message a'),
		mainNav = $('.main-nav');

	//open modal
	mainNav.on('click', function(event){
		$(event.target).is(mainNav) && mainNav.children('ul').toggleClass('is-visible');
	});

	//open sign-up form
	mainNav.on('click', '.cd-signup', signup_selected);
	//open login-form form
	mainNav.on('click', '.cd-signin', login_selected);

	//close modal
	formModal.on('click', function(event){
		if( $(event.target).is(formModal) || $(event.target).is('.cd-close-form') ) {
			formModal.removeClass('is-visible');
		}	
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		formModal.removeClass('is-visible');
	    }
    });

	//switch from a tab to another
	formModalTab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( tabLogin ) ) ? login_selected() : signup_selected();
	});

	//hide or show password
	$('.hide-password').on('click', function(){
		var togglePass= $(this),
			passwordField = togglePass.prev('input');
		
		( 'password' == passwordField.attr('type') ) ? passwordField.attr('type', 'text') : passwordField.attr('type', 'password');
		( 'Ocultar' == togglePass.text() ) ? togglePass.text('Mostrar') : togglePass.text('Ocultar');
		//focus and move cursor to the end of input field
		passwordField.putCursorAtEnd();
	});

	//show forgot-password form 
	forgotPasswordLink.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	backToLoginLink.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

	function login_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.addClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.addClass('selected');
		tabSignup.removeClass('selected');
	}

	function signup_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.removeClass('is-selected');
		formSignup.addClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.removeClass('selected');
		tabSignup.addClass('selected');
	}

	function forgot_password_selected(){
		formLogin.removeClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.addClass('is-selected');
	}
	formLogin.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		formLogin.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});
	formLogin.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		//alert("ctm");
	});
	
	$("#enviar").click(function (){
		$("#ingresar").submit()

		
	});


$("#accept-terms").click(function (){
	//$("#response").toggleClass('cd-error-message');
	if( $("#response").hasClass('is-visible')){
		$("#response").toggleClass('is-visible');
	}
	//$("#response").html("");
	
});




$("#ingresar").submit( function(  ) {
	//event.preventDefault();
	 var formData = new FormData($(this)[0]);

	// if (!$("#username").val() && !$("#password").val()){
			
 $.ajax({
   url: 'php/login.php', // En realidad esto deberia apuntar a la controladora y dentro de la misma ver que onda , pero fue
   type: 'POST',
   data: formData,
   async: false,
   cache: false,
   contentType: false,
   processData: false,
   success: function(data) {
	   if (data.statusCode=='200'){
		   if(!$("#responselogin").hasClass('is-visible')){
	    		
   			$("#responselogin").toggleClass('is-visible')
   		
   		}
	    	$("#responselogin").toggleClass('cd-error-message');
			$("#responselogin").toggleClass('cd-noerror-message');
   		$("#responselogin").html("login correcta , redirigiendo a la home!");
	    	setTimeout(function(){ 
	    		
	    		location.reload();
	    		
	    	}, 3000);
	    	
		 
	   }else{

		   $("#responselogin").toggleClass('is-visible');
		   $("#responselogin").html("chequea los campos , que mandaste sanata");
	}
   
   },
 	error :function (){
 	   $("#responselogin").toggleClass('is-visible');
	   $("#responselogin").html("chequea los campos , que mandaste sanata");
 		
 	}
	});
	/* }else{
		 alert("Completa los campitos");
	 }*/return false;
	
})


/*$( "#nuevoUser" ).submit(function( event ) {
	event.preventDefault();
		 var formData = new FormData($(this)[0]);
		if ($("#accept-terms").prop("checked")){
				
			  $.ajax({
	    url: 'php/InsertComercio.php',
	    type: 'POST',
	    data: formData,
	    async: false,
	    cache: false,
	    contentType: false,
	    processData: false,
	    statusCode: {
	    200: function() {
	    	if(! $("#response").hasClass('is-visible')){
	    		
    			$("#response").toggleClass('is-visible')
    		
    		}
	    	$("#response").toggleClass('cd-error-message');
			$("#response").toggleClass('cd-noerror-message');
    		$("#response").html("Carga correcta , redirigiendo a la home!");
	    	setTimeout(function(){ 
	    		
	    		location.reload();
	    		
	    	}, 3000);
	    	
	       },
	    400 :function(){
	    	$("#response").toggleClass('is-visible');
	    	$("#response").html("Hubo terrible error maestrulli");
	       }
	     }
		});
		//formSignup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	
	
			}else{
		$("#response").toggleClass('is-visible');
		//toggleClass('has-error')
		$("#response").html("Dale , acepta que no te la cobramos");
	}
			
	return false;
	

});*/


$( "#nuevoUser" ).submit(function( event ) {
	 event.preventDefault();
	   var formData = new FormData($(this)[0]);
	  if ($("#accept-terms").prop("checked")){
	   if ($("#signup-username").val()!=""){
	    if ($("#signup-adress").val()!=""){
	     if ($("#signup-email").val()!=""){  
	      if ($("#signup-password").val()!=""){
	       if ($("#foto").val()!=""){

	     $.ajax({
	     url: 'php/InsertComercio.php',
	     type: 'POST',
	     data: formData,
	     async: false,
	     cache: false,
	     contentType: false,
	     processData: false,
	     statusCode: {
	     200: function() {
	      if(! $("#response").hasClass('is-visible')){
	       
	       $("#response").toggleClass('is-visible')
	      
	      }
	      $("#response").toggleClass('cd-error-message');
	   $("#response").toggleClass('cd-noerror-message');
	      $("#response").html("Carga correcta , se recarga la home!");
	      setTimeout(function(){ 
	       
	       location.reload();
	       
	      }, 3000);
	      
	        },
	     400 :function(){
	         alert("todo mal");
	        }
	      }
	  });
	  //formSignup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	      }else{
	       $("#response").toggleClass('is-visible');
	       //toggleClass('has-error')
	       $("#response").html("falta foto");
	      }
	     }else{
	      $("#response").toggleClass('is-visible');
	      //toggleClass('has-error')
	      $("#response").html("pass no ingresado");
	     }
	    }else{
	     $("#response").toggleClass('is-visible');
	     //toggleClass('has-error')
	     $("#response").html("email no ingresado");
	    }  
	   }else{
	    $("#response").toggleClass('is-visible');
	    //toggleClass('has-error')
	    $("#response").html("direccion no ingresado");
	   }
	  }else{
	   $("#response").toggleClass('is-visible');
	   //toggleClass('has-error')
	   $("#response").html("nombre no ingresado");
	  }
	 }else{
	  $("#response").toggleClass('is-visible');
	  //toggleClass('has-error')
	  $("#response").html("Dale , acepta que esta ok");
	 }

	 return false;
	 });

});

//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = $(this).val().length * 2;
      		this.focus();
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		$(this).val($(this).val());
    	}
	});
};


