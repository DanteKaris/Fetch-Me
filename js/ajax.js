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

// Ajax call for feed
window.addEventListener("load", function loadPosts() {
    "use strict";

    var postsURL = '../php/dash.php',
        feed = document.getElementById("feed");

    setInterval(ajaxCall(postsURL, feed), 5000);
}, false);

// Ajax call for education posts
window.addEventListener("load", function loadPosts() {
    "use strict";

    var postsURL = '../php/edu.inc.php',
        feed = document.getElementById("eduPosts");

    setInterval(ajaxCall(postsURL, feed), 5000);
}, false);

// Ajax call for entertainment posts
window.addEventListener("load", function loadPosts() {
    "use strict";

    var postsURL = '../php/ent.inc.php',
        feed = document.getElementById("entPosts");

    setInterval(ajaxCall(postsURL, feed), 5000);
}, false);

// Ajax call for sport posts
window.addEventListener("load", function loadPosts() {
    "use strict";

    var postsURL = '../php/sports.inc.php',
        feed = document.getElementById("sportPosts");

    setInterval(ajaxCall(postsURL, feed), 5000);
}, false);
