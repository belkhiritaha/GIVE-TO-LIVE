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
   // document.getElementById("pleasenav").style.backgroundColor = "#296178";
   document.getElementById("particles-js").style.backgroundColor = "#d6ebf2";
   // document.getElementById("sidebar").style.backgroundColor = "#a6ccf5";
   document.getElementById("sidebar").style.backgroundColor = "#794ca6";
   document.getElementById("pleasenav").style.backgroundColor = "#70518f";
   document.getElementById("sidebar").style.color = "white";
   document.getElementById("blue").style.animation = "btn-animate 300ms forwards";
   document.getElementById("yellow").style.animation = "none";
}

function yellow() {
	user = "yellow";
	setCookie("username", user, 30);
	console.log(user);
   document.getElementById("pleasenav").style.backgroundColor = "#ffc107";
   document.getElementById("sidebar").style.backgroundColor = "#ffe083";
   document.getElementById("sidebar").style.color = "black";
   document.getElementById("yellow").style.animation = "btn-animate 300ms forwards";
   document.getElementById("blue").style.animation = "none";
}

function red() {
	user = "red";
	setCookie("username", user, 30);
	console.log(user);
   document.getElementById("pleasenav").style.backgroundColor = "#dc3545";
   document.getElementById("sidebar").style.backgroundColor = "red";
}

function brown() {
  user = "brown";
  setCookie("username", user, 30);
  console.log(user);
   document.getElementById("pleasenav").style.color = "white";
   document.getElementById("sidebar").style.color = "white";
   document.getElementById("pleasenav").style.backgroundColor = "rgb(44, 41, 47)";
   document.getElementById("sidebar").style.backgroundColor = "rgb(71, 71, 71)";
}


if (user == "yellow") {
   document.getElementById("pleasenav").style.backgroundColor = "#78C2AD";
   document.getElementById("sidebar").style.backgroundColor = "#aedacd";
   // document.getElementById("particles-js").style.backgroundColor = "#a0d4c5";
   document.getElementsByTagName("canvas").style.backgroundColor = "black";
   document.getElementById("yellow").style.animation = "btn-animate 300ms forwards";
   
}
if (user == "red") {
   document.getElementById("pleasenav").style.backgroundColor = "#dc3545";
   document.getElementById("sidebar").style.backgroundColor = "#e36975";
}
if (user == "blue") {
   document.getElementById("pleasenav").style.backgroundColor = "#296178";
   document.getElementById("sidebar").style.backgroundColor = "#a6ccf5";
   document.getElementById("all").style.backgroundColor = "#a6ccf5";
   document.getElementById("blue").style.animation = "btn-animate 300ms forwards";
}



