
var allButtons = new Array();

function getFilter(object){
    var element = document.getElementById(object.id);
    if(!allButtons.includes(object.id))
    {
        allButtons.push(object.id);      
    }
    var x = String(element.className);
    if(!element.className.includes("selected"))
    {
        element.classList.add("selected");
    }
    else{
        element.classList.remove("selected")
        RemoveButton(object.id);
    }

    myFunction();
}

function RemoveButton(value) {

    for( var i = 0; i < allButtons.length; i++){ 
    if ( allButtons[i] === value) {
        allButtons.splice(i, 1); 
        }
    }   
}

function removeFilters(){
    console.clear();
    for (i = 0; i < allButtons.length; i++){
        console.log(allButtons[i]);
        var element = document.getElementById(allButtons[i]);
        var x = String(element.className);
        element.classList.remove("selected");
        RemoveButton(allButtons[i]);
    }

    if(allButtons.length != 0)
    {
        removeFilters();
    }
    myFunction();
    
}

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("anime");
    
    
    if(input.value != null) filter = input.value.toUpperCase();
    else filter = " ";
    ul = document.getElementById("SeriesList");
    li = ul.getElementsByTagName("a");




    for (i = 0; i < li.length; i++) {
        a = li[i].getAttribute("id");
        if(a != null)
        {
            x = li[i].getAttribute("name");
            x = x.toUpperCase();
            a = a.toUpperCase();
            if(checkIfContains(a,x, filter))
            {
                li[i].style.display ="";
            }
            else
            {
                li[i].style.display ="none";
            }
        }      
    } 
    
}


function checkIfContains(a,x, filter){

    if(a.indexOf(filter) == -1 && filter != " ")
    {
        return false;
    }
    for(i = 0; i < allButtons.length; i++)
    {
        if(! x.includes(allButtons[i].toUpperCase()))
        {
            return false;
        }
    }
    return true;
}



var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}


window.onload = function () {
  //  window.alert(window.location.href);
}
