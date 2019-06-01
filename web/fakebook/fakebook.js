console.log("in the script");

function load_home_page(valid_user) {
   // Hide all elements and display a congrats message for a successfully created account
   var url = document.URL;
   if (url.includes("set")) {

      console.log("Everything totally works and Daniel is smart");
      document.getElementById("content").style.display = "none";
      document.getElementById("main_head").style.display = "none";
      document.getElementById("login_form").style.display = "none";
      document.getElementById("new_user_message").style.display = "inline-block";
   }
   else if (valid_user == "") {

      load_profile_page();
   }
   else if (valid_user == "1") {

      document.getElementById("form").style.display = "none";
      document.getElementById("content").style.display = "block";
      document.getElementById("main_head").style.display = "flex";
      document.getElementById("login_form").style.display = "none";
      document.getElementById("sign_up_form").style.display = "none";
      document.getElementById("new_user_message").style.display = "none";
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
   // element.innerHTML = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
   // element.innerHTML = "";
   element.parentNode.removeChild(element);
   var element2 = document.getElementById("main_head");
   element2.parentNode.removeChild(element2);

   console.log("Should have gone for the head");
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

function makeRequest(url) {
   url = "https://polar-plateau-20469.herokuapp.com/fakebook/new_message.php";
   // name=value pairs we'll be sending to the server.
   var data = 'action=ping&testName=testValue';

   // GET requires we add the name=value pairs to the end of the URL.
   url += '?' + data;

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
         var myText = httpRequest.responseText.split('\n');
         var list = "<table border = '1' width = '100%'><tr><th>The Ten Biggest Cities</th></tr>\n";

         for (var i = 0; i < myText.length; i++) {
            list = list + "<tr><td>" + myText[i] + "</td></tr>\n";
         }
         document.getElementById("text").innerHTML = list;
      }
      else {
         alert('Problem in else in alert contents');
         alert(httpRequest.status);
      }
   }
}