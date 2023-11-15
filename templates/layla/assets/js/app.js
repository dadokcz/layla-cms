




/*
     FILE ARCHIVED ON 1:41:28 Lis 21, 2015 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 3:41:45 Úno 19, 2016.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
function disableForm() {
    var form = document.forms['subscribeform2'];
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].disabled = true;

    }
}

function enableForm() {
    var form = document.forms['subscribeform2'];
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].disabled = false;

    }
}

function subscribe(element) {
    disableForm();
    var email = document.getElementById(element).value;
    var params = 'email=' + encodeURIComponent(email);
    postEmail('/subscribe/', params, element);
}

function postEmail(strURL, params, element) {
    var xmlHttpReq = false;
    var self = this;
    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
            var returnedData = self.xmlHttpReq.responseText;
            console.log(returnedData);
            if (returnedData.indexOf("error") > -1) {
                if (element.indexOf("2") > -1) {
                    $('#alertSuccess2').hide().fadeOut('slow');
                    $("#alertError2").fadeIn("slow", function() {
                        //
                    });
                } else {
                    $('#alertSuccess').hide().fadeOut('slow');
                    $("#alertError").fadeIn("slow", function() {
                        //
                    });
                }

            } else {

                if (element.indexOf("2") > -1) {
                    $('#alertError2').hide().fadeOut('slow');
                    $("#alertSuccess2").fadeIn("slow", function() {
                        //
                    });
                } else {
                    $('#alertError').hide().fadeOut('slow');
                    $("#alertSuccess").fadeIn("slow", function() {
                        //
                    });
                }

            }
            enableForm();


        }
    };
    self.xmlHttpReq.send(params);

}

