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
                output.setAttribute("style","display:flex;");

                for(var i=0; i<response.length; i++){
                    // output.setAttribute("display", block);

                    var picDiv = document.createElement("div");
                    picDiv.setAttribute("class", "picDiv");
                    picDiv.innerHTML = response[i].id;
    
                    var picImg = document.createElement("img");
                    picImg.setAttribute("id", response[i].id);
                    picImg.setAttribute("src", response[i].imageUrl);
                    picImg.setAttribute("width", "50%");
                    //picImg.setAttribute("border-radius", "15px 50"px); doesn't work here, works in css file
    
                    var picP = document.createElement("p");
                    var picPText = document.createTextNode(response[i].textBox);
                    picP.appendChild(picPText);
    
                    picDiv.appendChild(picImg);
                    picDiv.appendChild(picP);

                    output.appendChild(picDiv);


    
                }
    
        } 
    };
    
        //Note:"favourites-ajax.php" doesn't work, can ONLY have php stuff in file. No html stuff. NEW: fav-ajax-only.php
    xhr.open("GET", "fav-ajax-only.php", true); //true means it is asynchronous // Send variables through the url
    xhr.send(); 

};
