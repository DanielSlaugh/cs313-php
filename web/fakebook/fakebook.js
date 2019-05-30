console.log("in the script");

function load_home_page() {
   var val = "<?php echo $valid_user ?>";
   alert(val);
   console.log("in load_home");
   if (val == true) {
      alert("Signed in");
   }
   if (val == false) {
      alert("Not Signed in");
   }


   var x = document.getElementById("form");
   x.style.display = "none";

   var x = document.getElementById("content");
   x.style.display = "block";

   var x = document.getElementById("main_head");
   x.style.display = "flex";

   var x = document.getElementById("login_form");
   x.style.display = "none";

   var x = document.getElementById("sign_up_form");
   x.style.display = "none";

   var x = document.getElementById("new_user_message");
   x.style.display = "none";

   // Hide all elements and display a congrats message for a successfully created account
   var url = document.URL;
   if (url.includes("set")) {
      console.log("Everything totally works and Daniel is smart");

      var x = document.getElementById("content");
      x.style.display = "none";

      var x = document.getElementById("main_head");
      x.style.display = "none";

      var x = document.getElementById("login_form");
      x.style.display = "none";

      var x = document.getElementById("new_user_message");
      x.style.display = "inline-block";
   }
}

function load_comment_page() {
   var x = document.getElementById("form");
   x.style.display = "block";

   var x = document.getElementById("content");
   x.style.display = "none";

   var x = document.getElementById("main_head");
   x.style.display = "none";

   var x = document.getElementById("login_form");
   x.style.display = "none";

   var x = document.getElementById("sign_up_form");
   x.style.display = "none";

   var x = document.getElementById("new_user_message");
   x.style.display = "none";
}

function load_profile_page() {
   var x = document.getElementById("form");
   x.style.display = "none";

   var x = document.getElementById("content");
   x.style.display = "none";

   var x = document.getElementById("main_head");
   x.style.display = "none";

   var x = document.getElementById("login_form");
   x.style.display = "inline-block";

   var x = document.getElementById("sign_up_form");
   x.style.display = "none";

   var x = document.getElementById("new_user_message");
   x.style.display = "none";
}

function load_sign_up_page() {
   var x = document.getElementById("form");
   x.style.display = "none";

   var x = document.getElementById("content");
   x.style.display = "none";

   var x = document.getElementById("main_head");
   x.style.display = "none";

   var x = document.getElementById("login_form");
   x.style.display = "none";

   var x = document.getElementById("sign_up_form");
   x.style.display = "inline-block";

   var x = document.getElementById("new_user_message");
   x.style.display = "none";
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