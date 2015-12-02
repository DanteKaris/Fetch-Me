$(document).ready(function () {
    "use strict";

    // AJAX call for loading search bar results
    $("input[type=search]").keyup(function () {
        $.ajax({
            type : 'GET', // set request type GET or POST
            url : '../php/search.php?search=' + $("input[type=search]").val(), // data URL
            dataType : 'html', // type: xml, json, script, or html
            success : function (data) {
                // if the call is a success do this
                $("#results").html(data);
            },
            error : function () {
                // if the call fails do this
                window.alert('an ajax error occurred');
            }
        }); // end Ajax call
    });

    // AJAX call for loading dashboard feed
    (function getFeed() {
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
//        setTimeout(getFeed, 2000);
    }());

    // AJAX call for loading education feed
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

    // AJAX call for loading entertainment feed
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

    // AJAX call for loading sport feed
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
