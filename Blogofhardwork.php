<?php 
// Database connection file include karein
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog | Zaneb Aesthetics</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
  
<style type="text/css">
    /* Reset basic margins */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Header styling */
    header {
      background-color: #f4f4f4;      
      display: flex;                    
      justify-content: space-between;   
      align-items: center;              
      padding: 30px 50px;               
      box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo {
      font-size: 25px;
      font-weight: bold;
      font-family: 'Dancing Script', cursive;
      color: #333;
    }

    nav a {
      text-decoration: none;
      color: #333;
      margin: 0 15px;
      font-size: 18px;
      transition: color 0.3s;
    }

    nav a:hover {
      color: #b5838d; 
    }

    h1 {
      text-align: center;
      margin-top: 40px;
      margin-bottom: 10px;
      font-family: 'Playfair Display', serif;
    }

    hr {
      width: 80%;
      margin: 0 auto 40px;
      border: 0.5px solid #ccc;
    }

    .blog-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 40px;
      padding-bottom: 80px;
    }

    .blog-row {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      width: 90%;
    }

    .blog-item {
      width: 30%;
      text-align: center;
      font-family: 'Playfair Display', serif;
    }

    .blog-item a {
      text-decoration: none;
    }

    .blog-item img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 5px;
      transition: all 0.4s ease;
    }

    .blog-item img:hover {
      opacity: 0.8;
      transform: scale(1.02);
      cursor: pointer;
    }

    .blog-item p {
      margin-top: 15px;
      font-size: 22px;
      color: black;
      font-family: 'Dancing Script', cursive;
    }

    /* Follow & Footer Styles (Matched with About Page) */
    .follow-section {
      background-color: #e7d2c2;
      padding: 40px 0 10px 0;
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

    .site-footer {
      background-color: #e7d2c2;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 35px 8%;
      color: #333;
    }

    .footer-left a {
      color: black;
      font-size: 23px;
      margin-right: 15px;
    }

    .footer-right a {
      color: #333;
      text-decoration: none;
      margin-left: 20px;
    }
    .footer-center { text-align: center; }
.footer-center h3 { font-family: 'Poppins', sans-serif; font-size: 22px; }

    @media (max-width: 900px) {
      .blog-item { width: 45%; }
    }
    @media (max-width: 600px) {
      .blog-item { width: 100%; }
    }

</style>
</head>
<body>
<header>
  <div class="logo"><b>ZANEB ASTHETICS</b></div>
  <nav>
    <a href="hardwork.php">Home</a>
    <a href="Aboutofhardwork.php">About</a>
    <a href="Blogofhardwork.php">Blog</a>
    <a href="Contactofhardwork.php">Contact</a>
  </nav>
</header>

<h1>BLOG POSTS</h1>
<hr>

<div class="blog-container">
    <div class="blog-row">
      <div class="blog-item">
        <a href="post1.php">
          <img src="https://magme.hr/wp-content/uploads/2025/09/sezan3.jpg" alt="Blog 1">
          <p>Morning Style Vibes</p>
        </a>
      </div>
      <div class="blog-item">
        <a href="post2.php">
          <img src="https://sincerelyjules.com/wp-content/uploads/2025/10/SKIMS_SJ_dress-5.MANU-ATELIER_Sincerely_JulesJPG-scaled.jpg" alt="Blog 2">
          <p>City Walk Inspiration</p>
        </a>
      </div>
      <div class="blog-item">
        <a href="post3.php">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpo3etR5fuDtfKwPMt6PvJF-8ck3kqb94htQ&s" alt="Blog 3">
          <p>Classic Neutrals</p>
        </a>
      </div>
    </div>

    <div class="blog-row">
      <div class="blog-item">
        <a href="post4.php">
          <img src="https://sincerelyjules.com/wp-content/uploads/2024/08/sincerely-jules-rhode-dress-everlane-fisherman-sandals-11-1000x1500.jpg" alt="Blog 4">
          <p>Travel Dreams</p>
        </a>
      </div>
      <div class="blog-item">
        <a href="post5.php">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIqjP-b6tQArQ2XDwktpWvXJvz_r8uyT1z-83MEKMO_lja-uqZ_89TRGQ_Lihe9iD4Mx8&usqp=CAU" alt="Blog 5">
          <p>Weekend Mood</p>
        </a>
      </div>
      <div class="blog-item">
        <a href="post6.php">
          <img src="https://sincerelyjules.com/wp-content/uploads/2025/09/Sincerely_jules_posse_polka_dot_dress_the_row_look_10.jpg" alt="Blog 6">
          <p>Effortless Chic</p>
        </a>
      </div>
    </div>

    <div class="blog-row">
      <div class="blog-item" style="width: 40%">
        <a href="post7.php">
          <img src="https://sincerelyjules.com/wp-content/uploads/2025/03/IMG_6778.jpg" alt="Blog 7">
          <p>Everyday Aesthetic</p>
        </a>
      </div>
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