//main.js
console.log("connected main.js");

////////////////////////////////////
//GDPR
let cookies = document.querySelectorAll("#cookies")[0];
let footer = document.querySelectorAll("footer p");
//let pFooter = document.querySelectorAll("#pFooter")[0];


cookies.setAttribute("style","color:green;");
//footer.setAttribute("style","color:red;");

// When the user clicks "Accept Cookies", change the content on the banner to display new content 

cookies.addEventListener("click", acceptCookies);

function acceptCookies (e) {
    console.log("cookie click funciton");

    if (e.target.innerHTML === "Accept Cookies") {
        //footer.innerHTML = "Cookies were accepted. Would you like to revoke?" + "<a id='cookiesAccept' href='#'>Revoke Cookies</a>"; 
        footer[0].setAttribute("style","display:none");
        footer[1].setAttribute("style","display:inline-block");
        e.target.innerHTML = "Revoke Cookies"
    }
    else {
        footer[0].setAttribute("style","display:inline-block");
        footer[1].setAttribute("style","display:none");
        e.target.innerHTML = "Accept Cookies"
    }
}