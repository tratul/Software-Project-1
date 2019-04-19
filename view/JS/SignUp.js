$(function(){
	$.validator.setDefaults({
		highlight: function(element){
			$(element)
			.closest('.form-group')
			.addClass('has-error')
		},
		unhighlight: function(element){
			$(element)
			.closest('.form-group')
			.removeClass('has-error')
		}
	});
	
	$.validate({
		rules:
		{	
		    password: "required",
			birthDate: "required",
			cpassword: "required",
			firstName: {
			    required:true,
			    number:false,
			    letter:true
			},
			lastName:  {
			    required:true,
			    number:false,
			    letter:true
			},
			email: {
				required: true,
				email: true
			},
			phoneNumber: {
				required: true,
				number: true
			},
			address: {
				required: true
			}
		},
			messages:{			
				email: {
				required: true,
				email: true
			},
			firstName: {
			    required:true
			    letter:true
			}
		},
				password: {
					required: " Please enter password"
				},
				birthDate: {
					required: " Please enter birthdate"
				},
				email: {
					required: ' Please enter email',
					email: ' Please enter valid email'
				},
				firstName: {
					required: " Please enter your First Name",
					number: " Only letters allowed"
				},
				lastName: {
					required: " Please enter your Last Name",
					number: " Only letters allowed"
				},
				phoneNumber: {
					required: " Please enter your Phone Number",
					number: " Only number allowed"
				},
				address: {
					required: " Please enter your Address"
				},
			}
			
	});
});