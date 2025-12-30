<?php 
// Database connection include karna zaroori hai
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About | Zaneb Aesthetics</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Open+Sans&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Header */
header {
  display: flex;
  background-color: #f4f4f4;
  justify-content: space-between;
  align-items: center;
  padding: 20px 50px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.logo {
  font-size: 28px;
  font-weight: bold;
  font-family: fantasy;
  color: #333;
}

nav a {
  text-decoration: none; /* Aesthetic change: underline hata di hai, hover pe color aayega */
  color: #333;
  margin: 0 15px;
  font-size: 18px;
  transition: color 0.3s;
}

nav a:hover {
  color: #b5838d;
}

/* About Section */
.about-section {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding: 60px 80px;
  gap: 40px;
}

/* Left Images */
.image-column {
  display: flex;
  flex-direction: column;
  gap: 35px;
  width: 40%;
}

.image-column img {
  width: 100%;
  height: auto;
  border-radius: 5px;
}

/* Right Text */
.text-column {
  width: 50%;
  font-family: 'Open Sans', sans-serif;
  color: #333;
  line-height: 1.8;
}

.text-column h2{
  font-family: 'Playfair Display', serif;
  font-size: 30px;
  margin-bottom: 15px;
  padding-top: 20px;
}

.text-column p {
  font-size: 16px;
  text-align: justify;
  margin-bottom: 20px;
}

/* Dream Believe text */
.quote {
  font-family: 'Playfair Display', serif;
  font-size: 45px;
  text-align: left;
  line-height: 1.4;
  margin-bottom: 20px;
  margin-top: 40px;
}

/* Follow Section */
.follow-section {
  background-color: #e7d2c2; 
  padding: 40px 0 20px 0;
  text-align: center;
}

.follow-text .script {
  font-family: 'Dancing Script', cursive;
  font-size: 45px;
  color: #333;
}

.follow-text .normal {
  font-family: 'Playfair Display', serif;
  font-size: 22px;
  font-weight: bold;
}

.insta-gallery {
  display: flex;
  width: 100%;
  background-color: #e7d2c2;
}

.insta-gallery img {
  width: 16.66%;
  height: 280px;
  object-fit: cover;
}

/* Footer Styling */
.site-footer {
  background-color: #e7d2c2;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 35px 8%;
  color: #333;
  flex-wrap: wrap;
}

.footer-left a {
  color: black;
  font-size: 23px;
  margin-right: 15px;
}

.footer-center h3 {
  font-family: 'Poppins', sans-serif;
  font-size: 23px;
}

.footer-right a {
  color: #333;
  text-decoration: none;
  margin-left: 20px;
  font-weight: 500;
}

@media (max-width: 768px) {
  .about-section { flex-direction: column; padding: 20px; }
  .image-column, .text-column { width: 100%; }
  .insta-gallery img { width: 33.33%; }
}
</style>
</head>

<body>
<header>
  <div class="logo">ZANEB ASTHETICS</div>
  <nav>
    <a href="hardwork.php">Home</a>
    <a href="Aboutofhardwork.php">About</a>
    <a href="Blogofhardwork.php">Blog</a>
    <a href="Contactofhardwork.php">Contact</a>
  </nav>
</header>

<h1 style="text-align: center; margin-top: 40px; margin-bottom: 10px; font-family: 'Playfair Display';">ABOUT ME</h1>
<hr style="width: 50px; margin: auto; border: 1px solid #b5838d;">

<div class="about-section">
  <div class="image-column">
    <p class="quote">“DREAM<br>BELIEVE<br>ACHIEVE.”</p>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe04U0UNbCfGTJ8z5Pl7H_CoU5vl_APtJG4LikqNZy1I2rYmxm6j0hpGrROUFwlOFw2gk&usqp=CAU" alt="Zaneb Inspiration">

    <p class="quote">
      "WHAT YOU LOVE<br>
      DOING<br>
      SHOULD NEVER FEEL<br>
      LIKE WORK"
    </p>
  </div>

  <div class="text-column">
    <img src="https://sincerelyjules.com/wp-content/uploads/2024/12/Sincerely_jules_red_sweatshirt_trousers_adidas_shoes_chanel_bag_20-scaled.jpg" alt="Zaneb" width="100%">
    <h2>HELLO!</h2>
    <p>I'm Zaneb, welcome to my little world — Zaneb Aesthetics — where you’ll see bits and pieces of my outfits, creative projects, travel diaries, and everything that inspires me. It’s my happy place where I share my journey, experiences, and dreams with you!</p>

    <p>I believe in dreaming big and working hard to achieve those dreams. My goal is to inspire others through my content and creativity. Whether it’s through art, styling, or storytelling — I want to bring positivity and passion into everything I create.</p>

    <p>It’s an open journal to my thoughts and ideas — I hope you enjoy it and find inspiration here. Thank you for being part of this beautiful journey!</p>

    <p>With love,<br><b>Zaneb</b></p>
  </div>
</div>

<div class="follow-section">
  <div class="follow-text">
    <span class="script">Follow</span>
    <span class="normal">@ZANEB ASTHETICS</span>
  </div>
</div>

<div class="insta-gallery">
  <img src="https://sincerelyjules.com/wp-content/uploads/2024/12/VS_holidaypajamas-20-1000x1500.jpg" alt="1">
  <img src="https://sincerelyjules.com/wp-content/uploads/2021/05/Sincerely-Jules-Palm-Springs-Look-1000x1500.jpg" alt="2">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/03/Bluesky_sjkitchen-8-1000x1500.jpg" alt="3">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/02/Sincerely_jules_beach_outfit-1000x1474.jpg" alt="4">
  <img src="https://sincerelyjules.com/wp-content/uploads/2023/06/IMG_9001.jpg" alt="5">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/12/Sincerely_jules_red_scarf_white_knit_jeans_gucci_loafers_look_3-1000x1500.jpg" alt="6">
</div>

<footer class="site-footer">
  <div class="footer-left">
    <a href="https://www.instagram.com/z_aneb.rasool3" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
  </div>

  <div class="footer-center">
    <h3>Zaneb Aesthetics</h3>
    <p>© 2025 Zaneb Aesthetics. All rights reserved.</p>
  </div>

  <div class="footer-right">
    <a href="Aboutofhardwork.php">About</a>
    <a href="Contactofhardwork.php">Contact</a>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
</body>
</html>