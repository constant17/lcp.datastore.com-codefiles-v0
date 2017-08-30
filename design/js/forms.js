// JavaScript Document
function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = password.value;
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, fname,lname, profession, p_number, username) {
     // Check each field has a value
    if ( fname.value == ''     ||
		 lname.value == ''     || 
          profession.value == ''  ||
		  p_number.value == '' ||
          username.value == '') {
                    $('#disp_error_reg').html('Veuillez entrer vos identifiants svp!');
					disp_error_reg.style.display = "block";
					var fade_out = function() {
					  $("#disp_error_reg").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
				return false;
				 }
		
   		re = /^[a-zA-Z ]{3,25}$/; 
			if(!re.test(form.user_firstname.value)) { 
				$('#disp_error_reg').html('Veuillez saisir un nom valide svp!');
					disp_error_reg.style.display = "block";
					var fade_out = function() {
					  $("#disp_error_reg").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
				form.user_firstname.focus();
				return false; 
			}
			res = /^[a-zA-Z ]{3,25}$/; 
			if(!res.test(form.user_lastname.value)) { 
				$('#disp_error_reg').html('Veuillez saisir un prenom valide svp!');
					disp_error_reg.style.display = "block";
					var fade_out = function() {
					  $("#disp_error_reg").fadeOut().empty();
					}
					setTimeout(fade_out, 5000); 
				form.user_lastname.focus();
				return false; 
			}
			resg = /^[a-zA-Z ]{3,25}$/; 
			if(!resg.test(form.profession.value)) { 
				$('#disp_error_reg').html('Veuillez saisir une profession valide svp!');
					disp_error_reg.style.display = "block";
					var fade_out = function() {
					  $("#disp_error_reg").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
				form.profession.focus();
				return false; 
			}
			// Check that the password is sufficiently long (min 6 chars)
			// The check is duplicated below, but this is included to give more
			// specific guidance to the user
			
		 
			// At least one number, one lowercase and one uppercase letter 
			// At least six characters 
		 
			var re = /[0-9]/; 
			if (!re.test(p_number.value) || p_number.length != 8) {
				$('#disp_error_reg').html('Veuillez saisir un num&eacute;ro de t&eacute;lephone valide svp!');
					disp_error_reg.style.display = "block";
					var fade_out = function() {
					  $("#disp_error_reg").fadeOut().empty();
					}
					setTimeout(fade_out, 5000);
					form.p_number.focus();
				return false;
			}
		 
		 
			// Create a new element input, this will be our hashed password field. 
			
		 
		 
			// Finally submit the form. 
			form.submit();
			return true;
}
