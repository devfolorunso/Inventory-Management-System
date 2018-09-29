	<!DOCTYPE html>
<html>
<head>
<title>Inventory</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/home.css">
</head>
<body>
		<div class="first">

			<div class="fl_left">
	        	<img src="media icons/phone.png" > +00 (123) 456 7890 5778
	            <img src="media icons/mail.png"> inventory@hotmail.com
	        </div>

	        <div class="fl_right">
	        	<img src="media icons/facebook.png">
	        	<img src="media icons/instagram.png">
	        	<img src="media icons/google plus.png">
	        	<img src="media icons/linkedin.png">
	        	<img src="media icons/pinterest.png">
	        	<img src="media icons/blogger.png">
	        	<img src="media icons/twitter.png">
	        </div>

	        <div class="clearboth"></div>

		</div>

	<div class="firstborder"></div>

	<div class="header">

		<div class="header-left">
			<span>INVENTORY</span>
		</div>

		<div class="header-right">
				<a href="home.php" class="act">HOME</a>
				<a href="#about">ABOUT US</a>
				<a href="#contact">CONTACT US</a>

			<div class="dropdown">
		        <span>PRODUCTS
		        <div class="dropdown-content">
		        <a href="products.php?user=<?php echo $username; ?>">View Products</a>
		        <a href="addproduct.php?user=<?php echo $username; ?>">Manage Products</a>
		        </div>
		        </span>
		   </div>

		   		<a href="suppliers.php?user=<?php echo $username; ?>">SUPPLIERS</a>

		   <div class="dropdown">
		        <span>SETTINGS
		        <div class="dropdown-content">
		        <a href="profile.php?user=<?php echo $username; ?>">View Profile</a>
		        <a href="profile.php?user=<?php echo $username; ?>">Edit Profile</a>
		        <a href="signout.php">Log out</a>
		        </div>
		        </span>
		   </div>
		</div>

	</div>

	<!--  -->

	<div class="descript">
		<span class="opacity">Making your small Business Look Big</span>
		</br>
		<a href="#get_started">GET STARTED!</a>
	</div>


<!--  -->

<div class="second_body">

<div class="about" id="about">

	<span>
	This is a Web Platform that is centered on
	Empowering Companies to Manage and grow their business.<img src="media icons/approved.jpg">
	</span>

<div class="additabout">

	<div class="about-left">
		<p>Providing good and accurate management
		on business.</p>
	</div>

	<div class="about-right">
		<p>Making Business Management easy at your
		convinience.
		</p>
	</div>

</div>

<div class="clearboth"></div>

<div class="slider">

	<div class="myslides">
       <div class="numbertext">4/4 </div>
       <img src="styles\Software-para-planificar-la-producción.jpg" style="width:100% ; height:400px;">
     </div>

    <div class="myslides">
      <div class="numbertext">1/4 </div>
      <img src="styles/bg.jpg" style="width:100% ; height:400px;">
    </div>

      <div class="myslides">
        <div class="numbertext">2/4 </div>
        <img src="styles/006.png" style="width:100% ; height:400px;">
      </div>

      <div class="myslides">
        <div class="numbertext">3/4 </div>
        <img src="styles\005.jpg" style="width:100% ; height:400px;">
      </div>

      <a class="prev" onclick="plusSlides(-1)"> < </a>
      <a class="next" onclick="plusSlides(1)"> > </a>

</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n){
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName('myslides');
  var dots = document.getElementsByClassName('demo');
  var captionText = document.getElementById('caption');
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].classname = dots[i].classname.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].classname += " active";
  captionText.innetHTML = dots[slideIndex-1].alt;

}

</script>


</div>
</div> 
<!--  -->

<div class="get_started" id="get_started">

	<div class="login">
		<a href="login.php"><img src="styles\Button_Login.gif"></a>
	</div>

	<div class="register">
		<a href="signup.php"><img src="styles\register.gif"></a>
	</div>

</div>

<!--  -->


<!--  -->


<div class="foot" id="contact">

    <div class="foot1">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscommodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
         dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
         non proident,sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <div class="contact">

      <form action="https://www.google.com">

        <label>EMAIL :</label></br>
        <input type="email" name="email" placeholder="Enter Email" />
        </br>
        <label>SUBJECT :</label></br>
        <input type="text" name="subject" required="required" placeholder="Enter Password" />
        </br>
        <label>MESSAGE :</label></br>
        <textarea cols="26" rows="5"></textarea>
       	</br>
        <button>SEND</button>

      </form>
    </div>

<div class="styles">
	<img src="styles\visa.jpg">
	<img src="styles\amex.jpg"><br/>
	<img src="styles\mastercard.jpg">
	<img src="styles\git.png">
</div>


<div class="footer">
  <b> &copy; 2018
  ISHOLA OLUWATOBI (<a href="http://www.github.com/Ishoshot/1st-Project"> TOBBYWEB </a>). All rights reserved</b>

</div>


</div>
</body>
</html>
