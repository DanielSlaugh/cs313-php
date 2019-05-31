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
   if (valid_user == "") {

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

function load_comment_page(valid_user) {
   if (valid_user == "1") {
      document.getElementById("form").style.display = "block";
      document.getElementById("content").style.display = "none";
      document.getElementById("main_head").style.display = "none";
      document.getElementById("login_form").style.display = "none";
      document.getElementById("sign_up_form").style.display = "none";
      document.getElementById("new_user_message").style.display = "none";
   }
   if (valid_user == "") {
      document.getElementById("form").style.display = "none";
      alert("Please sign in to access message page")
      load_profile_page();
   }
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