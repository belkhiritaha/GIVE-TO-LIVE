


  function setCookie(cname,cvalue,exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/projet%20yasser";
  }

  function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }


  
var user=getCookie("username");

console.log(user);

 function blue() {
	user = "blue";
	setCookie("username", user, 30);
	console.log(user);
   document.getElementById("pleasenav").style.backgroundColor = "#296178";
}

function yellow() {
	user = "yellow";
	setCookie("username", user, 30);
	console.log(user);
   document.getElementById("pleasenav").style.backgroundColor = "yellow";
}

function red() {
	user = "red";
	setCookie("username", user, 30);
	console.log(user);
   document.getElementById("pleasenav").style.backgroundColor = "red";
}


if (user == "yellow") {
   document.getElementById("pleasenav").style.backgroundColor = "yellow";
}
if (user == "red") {
   document.getElementById("pleasenav").style.backgroundColor = "red";
}
if (user == "blue") {
   document.getElementById("pleasenav").style.backgroundColor = "#296178";
}



