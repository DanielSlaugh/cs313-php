console.log("in the script");

// Calls every time the page has been loaded. Fixes the bug where user
// couldn't do anything after signing up because the HTML hadn't been created
document.addEventListener('DOMContentLoaded', function () {
   // Redirects the user to login page immediately after creating an account
   var url = document.URL;
   if (url.includes("set")) {
      console.log("Everything totally works and Daniel is smart");
      load_sign_up_page();
   }
}, false);

function load_home_page(valid_user) {
   if (valid_user == "") {
      load_profile_page();
      console.log("else if no valid user");
   }
   else if (valid_user == "1") {
      document.getElementById("form").style.display = "none";
      document.getElementById("content").style.display = "block";
      document.getElementById("main_head").style.display = "flex";
      document.getElementById("login_form").style.display = "none";
      document.getElementById("sign_up_form").style.display = "none";
      document.getElementById("new_user_message").style.display = "none";
      console.log("else if there is a valid user");
   }
}

function load_comment_page() {
   document.getElementById("form").style.display = "block";
   document.getElementById("content").style.display = "none";
   document.getElementById("main_head").style.display = "none";
   document.getElementById("login_form").style.display = "none";
   document.getElementById("sign_up_form").style.display = "none";
   document.getElementById("new_user_message").style.display = "none";
}

function load_profile_page() {

   document.getElementById("form").style.display = "none";
   document.getElementById("content").style.display = "none";
   document.getElementById("main_head").style.display = "none";
   document.getElementById("login_form").style.display = "inline-block";
   document.getElementById("sign_up_form").style.display = "none";
   document.getElementById("new_user_message").style.display = "none";
}
function load_sign_up_page() {
   var url = document.URL;
   if (url.includes("set")) {
      console.log("Everything totally works and Daniel is smart");
      // document.getElementById("new_user_message").style.display = "inline-block";
      alert("Your account has been created! Sign in so you can have fun with your friends")
   }
   document.getElementById("form").style.display = "none";
   document.getElementById("content").style.display = "none";
   document.getElementById("main_head").style.display = "none";
   document.getElementById("login_form").style.display = "none";
   document.getElementById("sign_up_form").style.display = "inline-block";
   document.getElementById("new_user_message").style.display = "none";
}
function search(text) {
   let url = "home.php?search=" + text;
   window.location = url;
}

function destroy_content() {
   // Destroy half of what's on the page
   console.log("Enter Thanos");
   var element = document.getElementById("content");
   element.parentNode.removeChild(element);
   var element2 = document.getElementById("main_head");
   element2.parentNode.removeChild(element2);
   var element3 = document.getElementById("spacing");
   element3.innerHTML = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}

function create_message_page() {
   var x = document.getElementById("form");
   x.style.display = "block";
}

function add_content() {
   var parent = document.createElement("p");
   var node = document.createTextNode("This is new.");
   parent.appendChild(node);
   var element = document.getElementById("content_parent");
   element.appendChild(parent);
   parent.setAttribute('id', "content");

   console.log("a child is born");
}

function makeRequest(current_id, message_text) {
   url = "https://polar-plateau-20469.herokuapp.com/fakebook/new_message.php";
   // name=value pairs we'll be sending to the server.
   var data = 'action=ping&testName=testValue';

   // GET requires we add the name=value pairs to the end of the URL.
   // ?current_id = 6 & message_text=Hello
   url += '?' + "current_id=" + current_id + "&message_text=" + message_text;

   httpRequest = new XMLHttpRequest();
   if (!httpRequest) {
      alert('ERROR: httpRequest is broken');
      return false;
   }
   else {
      httpRequest.onreadystatechange = alertContents;
      httpRequest.open("GET", url, true);
      httpRequest.send();
   }
}
function alertContents() {
   if (httpRequest.readyState == 4) {
      if (httpRequest.status == 200) {
         console.log("Message Successfully loaded");
      }
      else {
         alert('Problem in else in alert contents');
         alert(httpRequest.status);
      }
   }
}