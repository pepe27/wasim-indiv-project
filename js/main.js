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
    console.log("cookie click function");

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

////////////////////////////////////////////////
//readingAssistance
// Consider background colours and font colors.
// Add more padding around elements and increase the line height and letter spacing.


let toggle = document.querySelectorAll("#toggle")[0];
let body = document.querySelector("body");
let p = document.querySelectorAll("p");
let a = document.querySelectorAll("a");
let form = document.querySelectorAll("form");
let input = document.querySelectorAll("input");

toggle.addEventListener("click",readAssist);

let flag =true;
function readAssist(e) {
    if (flag) {
        body.classList.add('high-contrast-body');
        for (let i=0;i<p.length;i++) {
            p[i].classList.add('high-contrast-p');
        }
        for (let i=0;i<a.length;i++) {
            a[i].classList.add('high-contrast-p');
        }
        for (let i=0;i<form.length;i++) {
            form[i].classList.add('high-contrast-p');
        }
        for (let i=0;i<input.length;i++) {
            input[i].classList.add('high-contrast-p');
        }
    } else {
        body.classList.remove('high-contrast-body');
        for (let i=0;i<p.length;i++) {
            p[i].classList.remove('high-contrast-p');
        }
        for (let i=0;i<a.length;i++) {
            a[i].classList.remove('high-contrast-p');
        }
        for (let i=0;i<form.length;i++) {
            form[i].classList.remove('high-contrast-p');
        }
        for (let i=0;i<input.length;i++) {
            input[i].classList.remove('high-contrast-p');
        }


    }
    flag = !flag; //this is important. flag == false, once the function runs
}

//Add a keyboard shortcut "Ctrl + A" that would toggle Reading Assistance on/off

document.addEventListener('keydown', function(event) {
    if (event.code == 'KeyA' && (event.ctrlKey || event.metaKey)) {
        console.log("undo");
    
        event.preventDefault(); //?
        readAssist(event);
        
        
      

    }
  });