function AjaxFunction() {
    var httpxml;
    try {
        // Firefox, Opera 8.0+, Safari
        httpxml = new XMLHttpRequest();
         
    }
    catch (e) {
        // Internet Explorer
        try {
            httpxml = new ActiveXObject("Msxml2.XMLHTTP");
            
            return httpxml;
        }
        catch (e) {
            try {
                httpxml = new ActiveXObject("Microsoft.XMLHTTP");
                return httpxml;
            }
            catch (e) {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
   
 }





clearChildren = function (parent_id) {
    var childArray = document.getElementById(parent_id).children;
    if (childArray.length > 0) {
        document.getElementById(parent_id).removeChild(childArray[0]);
        clearChildren(parent_id);
    }
}
function myFunction(text, event) {
    //alert("You pressed a key inside the input field");
    // Get the <datalist> and <input> elements.
    var dataList = document.getElementById('json-datalist');
    var input = document.getElementById('ajax');
    //alert(document.getElementById('ajax').value);
    // Create a new XMLHttpRequest.
    //var request = new XMLHttpRequest();
     var request = new XMLHttpRequest();
    //
    // Handle state changes for the request.
    request.onreadystatechange = function (response) {
        if (request.readyState === 4) {
            if (request.status === 200) {
                // Parse the JSON
                var jsonOptions = JSON.parse(request.responseText);
                //var x = document.getElementById("myDIV").childElementCount;
                var i = 0;
                var x = event.which || event.keyCode;
                // alert(x);
                clearChildren('json-datalist');
                //alert(jsonOptions);
                // Loop over the JSON array.
                jsonOptions.forEach(function (item) {
                    // Create a new <option> element.
                    var option = document.createElement('option');
                    // Set the value using the item in the JSON array.
                    option.value = item[0];
                    //option.onmouseover = kjall12(event);
                    option.id = item[1];
                    if (i == 0 && x > 63 && text.length > 2) {
                        document.getElementById('ajax').value = item[0];
                        i++;
                    }
                    // Add the <option> element to the <datalist>.
                    dataList.appendChild(option);

                });

                // Update the placeholder text.
                document.getElementById('ipQuestion').value="";
                input.placeholder = "Category";
            } else {
                // An error occured :(
                input.placeholder = "Couldn't load datalist options :(";
            }
        }
    };

    // Update the placeholder text.
    input.placeholder = "Loading options...";

    // Set up and make the request.
    var url = "query.php";
    url = url + "?query=" + text;
    request.open('GET', url, true);
    request.send();
}

function getQuestions(text) {
    var dl = document.getElementsByName(text);
    var tQusetion = document.getElementById('tQusetion');
    document.getElementById('tQusetion').innerHTML=null;
    var input = document.getElementById('ipQuestion');
    //alert(text);
    var request = new XMLHttpRequest();
    //
    // Handle state changes for the request.
    request.onreadystatechange = function (response) {
        if (request.readyState === 4) {
            if (request.status === 200) {
                // Parse the JSON
                var jsonOptions = JSON.parse(request.responseText);
                //var x = document.getElementById("myDIV").childElementCount;
                var i = 0;
                var x = event.which || event.keyCode;
                // alert(x);
                //clearChildren('json-datalist');
                //alert(jsonOptions);
                // Loop over the JSON array.
                jsonOptions.forEach(function (item) {
                    
                    // Create a new <option> element.
                    var option = document.createElement('p');
                    // Set the value using the item in the JSON array.
                    //alert("Item="+item);
                    option.innerHTML ="Q)"+ item[0]+"</br>Ans) "+ item[1]+"</br>";
                   
                    // Add the <option> element to the <datalist>.
                    tQusetion.appendChild(option);

                });

                // Update the placeholder text.
                input.placeholder = "Question";
            } else {
                // An error occured :(
               
            }
        }
    };

    // Update the placeholder text.
    input.placeholder = "Loading options...";

    // Set up and make the request.
    var url = "query.php";
    url = url + "?query=" + text;
    url = url + "&que=";
    request.open('GET', url, true);
    request.send();
    //alert(dl);
}

function kjall12(text,event) {
    var dl = document.getElementById('ajax').value;
    var tQusetion = document.getElementById('tQusetion');
    document.getElementById('tQusetion').innerHTML=null;
    var input = document.getElementById('ipQuestion');
    
    
    var request = new XMLHttpRequest();
    //
    // Handle state changes for the request.
    request.onreadystatechange = function (response) {
        if (request.readyState === 4) {
            if (request.status === 200) {
                // Parse the JSON
                var jsonOptions = JSON.parse(request.responseText);
                //var x = document.getElementById("myDIV").childElementCount;
                var i = 0;
                var x = event.which || event.keyCode;
                // alert(x);
                //clearChildren('json-datalist');
                //alert(jsonOptions);
                // Loop over the JSON array.
                jsonOptions.forEach(function (item) {
                    
                    // Create a new <option> element.
                    var option = document.createElement('p');
                    // Set the value using the item in the JSON array.
                    //alert("Item="+item);
                    option.innerHTML ="Q)"+ item[0]+"</br>Ans) "+ item[1]+"</br>";
                   
                    // Add the <option> element to the <datalist>.
                    tQusetion.appendChild(option);

                });

                // Update the placeholder text.
                input.placeholder = "Question";
            } else {
                // An error occured :(
               
            }
        }
    };

    // Update the placeholder text.
    input.placeholder = "Loading options...";

   

    // Set up and make the request.
    var url = "query.php";
    url = url + "?que=" + text;
     if(dl=="");
     else
        url = url + "&cat=" + dl;
    
    
    request.open('GET', url, true);
    request.send();
    //alert(dl);
}