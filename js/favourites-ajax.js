//favourites-ajax.js
//Click on <p> in html, then the ajax will run (get the pics/info from backend)

console.log("favourites-ajax connected");

var output = document.querySelectorAll("#output")[0];
var showData = document.querySelectorAll("#showData")[0];

showData.addEventListener("click", showAnimals);
function showAnimals(event){
    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function(e){     
        console.log(xhr.readyState);     
        if(xhr.readyState === 4){        
            console.log(xhr.responseText);// modify or populate html elements based on response.
                //DOM Manipulation
                var response = JSON.parse(xhr.responseText);
                //console.log(response);
    
                var output = document.querySelectorAll("#output")[0];
                for(var i=0; i<response.length; i++){
                    var picDiv = document.createElement("div");
                    picDiv.innerHTML = response[i].id;
    
                    var picImg = document.createElement("img");
                    picImg.setAttribute("id", response[i].id);
                    picImg.setAttribute("src", response[i].imageUrl);
                    picImg.setAttribute("width", "200");
    
                    var picP = document.createElement("p");
                    var picPText = document.createTextNode(response[i].textBox);
                    picP.appendChild(picPText);
    
                    output.appendChild(picDiv);
                    output.appendChild(picImg);
                    output.appendChild(picP);
    
                }
    
        } 
    };
    
        //if this "favourites-ajax.php" doesn't work, might need to have only the php stuff in there. no html stuff?? NEW: fav-ajax-only.php
    xhr.open("GET", "fav-ajax-only.php", true); //true means it is asynchronous // Send variables through the url
    xhr.send(); 

};
