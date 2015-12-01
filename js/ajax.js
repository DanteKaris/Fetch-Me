// standard Ajax xhr function
function getHTTPObject() {
    "use strict";
    var xhr;

    if (window.XMLHttpRequest) { // check for support
        // if it's supported, use it because it's better
        xhr = new XMLHttpRequest();

    } else if (window.ActiveXObject) { // check for the IE 6 Ajax
        // save it to the xhr variable
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    // spit out the correct one so we can use it
    return xhr;
}

// define the Ajax call
function ajaxCall(dataUrl, outputElement) {
    "use strict";

    // use our function to get the correct Ajax object based on support
    var request = getHTTPObject();
    outputElement.innerHTML = "Loading...";
    request.onreadystatechange = function () {

        if (request.readyState === 4 && request.status === 200) {
            outputElement.innerHTML = request.responseText;
        } // end ajax status check
    }; // end onreadystatechange

    request.open("GET", dataUrl, true);
    request.send(null);
}

// Ajax call for search bar
var searchBar = document.getElementById('searchField');
searchBar.addEventListener("keyup", function findPosts() {
    "use strict";

    var searchURL = '../php/search.php?search=' + document.searchbar.search.value,
        searchResults = document.getElementById("results");

    ajaxCall(searchURL, searchResults);
}, false);

$(document).ready(function () {
    "use strict";

    $.ajax({
        type : 'GET', // set request type GET or POST
        url : '../php/dash.php', // data URL
        dataType : 'html', // type: xml, json, script, or html
        success : function (data) {
            // if the call is a success do this
            $("#feed").html(data);
        },
        error : function () {
            // if the call fails do this
            window.alert('an ajax error occurred');
        }
    }); // end Ajax call

    $.ajax({
        type : 'GET', // set request type GET or POST
        url : '../php/edu.inc.php', // data URL
        dataType : 'html', // type: xml, json, script, or html
        success : function (data) {
            // if the call is a success do this
            $("#eduPosts").html(data);
        },
        error : function () {
            // if the call fails do this
            window.alert('an ajax error occurred');
        }
    }); // end Ajax call

    $.ajax({
        type : 'GET', // set request type GET or POST
        url : '../php/ent.inc.php', // data URL
        dataType : 'html', // type: xml, json, script, or html
        success : function (data) {
            // if the call is a success do this
            $("#entPosts").html(data);
        },
        error : function () {
            // if the call fails do this
            window.alert('an ajax error occurred');
        }
    }); // end Ajax call

    $.ajax({
        type : 'GET', // set request type GET or POST
        url : '../php/sports.inc.php', // data URL
        dataType : 'html', // type: xml, json, script, or html
        success : function (data) {
            // if the call is a success do this
            $("#sportPosts").html(data);
        },
        error : function () {
            // if the call fails do this
            window.alert('an ajax error occurred');
        }
    }); // end Ajax call
}); // close document.ready
