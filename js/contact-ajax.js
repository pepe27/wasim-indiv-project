//contact-ajax.js
console.log("contact-ajax.js connected");

/////////////////////////////////////////
//formStatus ajaxForm name email message
let formStatus = document.querySelectorAll("#formStatus")[0];
let contactForm = document.querySelectorAll("#contactForm")[0];
let ajaxForm = document.querySelectorAll("#ajaxForm")[0];
let name1 = document.querySelectorAll("#name1")[0];
let email = document.querySelectorAll("#email")[0];
let message = document.querySelectorAll("#message")[0];


//the event is on the FORM, not the SUBMIT Button 
ajaxForm.addEventListener("submit",doSomething);

//to stop a form from submiting, use event.preventDefault();

function doSomething(e){
	
	console.log("doSomething Fn");
	e.preventDefault();
	
	//from main-ajax.js
	var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){     
		console.log(xhr.readyState);     
		if(xhr.readyState === 4){        
			console.log(xhr.responseText);// modify or populate html elements based on response.
			//receive {"success":"true"} from PHP file
            var response = JSON.parse(xhr.responseText);  
			//DOM Manipulation
			if(response.success) {
				contactForm.setAttribute("style","display:none");
				formStatus.setAttribute("style","display:inline-block");
                formStatus.innerHTML = "Thanks for submitting your form! <input type='button' value='Go Back' onclick='history.back(-1)' />";
                ajaxForm.remove(); //can do as well
            }
		} 
	};

	xhr.open("POST","process-contact.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	xhr.send(`name1=${name1.value}&email=${email.value}&message=${message.value}`); // Form data should be sent in a format that the server can parse, like a query string
	//VSC changed this to a Template String, had the lightbulb icon show up

	

}