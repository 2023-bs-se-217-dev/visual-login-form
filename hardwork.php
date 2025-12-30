<?php 
// Sabse pehle database connection file include karein
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Blog Website | Zaneb Aesthetics</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

<style type="text/css">
    /* Reset basic margins */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Hero Section with partial height */
.hero {
  position: relative;
  width: 100%;
  height: 900px; 
  background-image: url('https://sincerelyjules.com/wp-content/uploads/2025/04/Sincerely_jules_stripe_pjs_victorias_seceret_fit-scaled.jpg');
  background-size: cover;
  background-position: center;
  margin-bottom: 50px; 
}

/* Transparent Header overlay */
.hero header {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 50px;
  z-index: 10;
  background-color: rgba(255, 255, 255, 0.2); 
}

.hero header .logo {
  font-family: 'Dancing Script', cursive;
  font-size: 28px;
  font-weight: bold;
  color: white;
}

.hero header nav a {
  color: white;
  text-decoration: none;
  margin-left: 20px;
  font-size: 18px;
}

.hero header nav a:hover {
  color: #b5838d;
}

/* Center text overlay on hero image */
.hero .hero-text {
  position: absolute;
  top: 60%;
  left: 20%;
  transform: translate(-50%, -50%);
  text-align: left;
  color: white;
  z-index: 2;
}

.hero .hero-text h1 {
  font-size: 50px;
  font-family: 'Playfair Display', serif;
  margin-bottom: 20px;
}

.hero .hero-text p {
  font-size: 20px;
  font-style: italic;
}

.hero::after {
  content: '';
  position: absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color: rgba(0,0,0,0.3); 
  z-index: 1;
}

.blog-post {
  display: flex; 
  align-items: center; 
  justify-content: space-between; 
  padding: 50px 0%; 
  gap: 60px; 
}

.blog-post.reverse {
  flex-direction: row-reverse;
  padding-top: 1px;
}
.blog-post.reverse .text {
  padding-left: 80px; 
}

.blog-post.reverse .image img{
  margin-top:  -100px;
}

.blog-post .image img {
  width: 700px; 
  height: 30%; 
  transition: transform 0.3s ease; 
}

.blog-post .image img:hover {
  transform: scale(1.03);
}

.blog-post .text {
  flex: 1; 
}

.category {
  font-size: 13px;
  letter-spacing: 7px;
  color: #777;
  margin-bottom: 10px;
  padding-left: 10px;
}

.title-link {
  text-decoration: none;
  color: black;
}

.title-link h2 {
  font-size: 36px;
  line-height: 1.2;
}

.title-link span {
  font-weight: bold;
}

.title-link:hover h2 {
  color: #b5838d; 
}

.read-btn {
  display: inline-block;
  margin-top: 15px;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  color: white;
  background-color: #000;
  padding: 10px 22px;
  border-radius: 25px;
  transition: background 0.3s;
}

.read-btn:hover {
  background-color: #b5838d;
}

@media (max-width: 900px) {
  .blog-post {
    flex-direction: column; 
    text-align: center;
  }
  .blog-post.reverse {
    flex-direction: column; 
  }
  .blog-post .image img {
    width: 100%; 
  }
}

.highlights {
  background-color: #f6ede9; 
  padding: 60px 0;
  text-align: center;
}

.highlight-title {
  font-family: 'Dancing Script', cursive;
  font-size: 48px;
  margin-bottom: 40px;
  color: #222;
}

.slider-wrapper {
  position: relative;
  width: 90%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

.slider {
  display: flex;
  transition: transform 0.5s ease;
}

.slide {
  flex: 0 0 33.33%; 
  text-align: center;
  padding: 0 10px;
}

.slide img {
  width: 100%;
  height: 420px;
  object-fit: cover;
  border-radius: 8px;
  transition: opacity 0.4s ease;
}

.slide img:hover {
  opacity: 0.8; 
}

.slide p {
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  margin-top: 10px;
  color: #000;
}

.slide p strong {
  display: block;
  font-weight: 600;
}

.prev, .next {
  background: rgba(255, 255, 255, 0.8);
  border: none;
  font-size: 35px;
  cursor: pointer;
  color: #333;
  font-weight: bold;
  padding: 10px 16px;
  border-radius: 50%;
  z-index: 10;
  transition: all 0.3s ease;
}

.prev:hover, .next:hover {
  background-color: #b5838d;
  color: #fff;
}

.prev { margin-right: 15px; }
.next { margin-left: 15px; }

@media (max-width: 900px) {
  .slide { flex: 0 0 100%; }
}

.slide a {
  text-decoration: none; 
  color: inherit; 
  display: block; 
}

.footer-gap { height: 50px; }

.site-footer {
  background-color: #e7d2c2; 
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 35px 8%;
  color: #333;
  flex-wrap: wrap;
  border-top: 1px solid #ccc;
}

.footer-left a {
  color: black; 
  font-size: 22px;
  margin-right: 15px;
}

.footer-center { text-align: center; }
.footer-center h3 { font-family: 'Poppins', sans-serif; font-size: 22px; }

.footer-right a {
  color: #333;
  text-decoration: none;
  margin-left: 20px;
  font-weight: 500;
}
.footer-right a:hover { color: #b5838d; }
.slider-container {
      overflow: hidden;
      width: 100%;
    }

</style>
</head>
<body>
  <div class="hero">
  <header>
    <div class="logo">ZANEB ASTHETICS</div>
    <nav>
      <a href="hardwork.php">Home</a>
      <a href="Aboutofhardwork.php">About</a>
      <a href="Blogofhardwork.php">Blog</a>
      <a href="Contactofhardwork.php">Contact</a>
    </nav>
  </header>
  
  <div class="hero-text">
    <p>Welcome to Zaneb Aesthetics</p>
    <h1>WE LIVE FASHION</h1>
    <p>Creating something beautiful and timeless</p>
  </div>
</div>

  <section class="blog-post">
    <div class="image">
      <a href="post1.php"><img src="https://magme.hr/wp-content/uploads/2025/09/sezan2.jpg" alt="Post 1"></a>
    </div>
    <div class="text">
      <p class="category">FASHION</p>
      <a href="post1.php" class="title-link">
        <h2>EASY LAYERS FOR<br><span>IN-BETWEEN WEATHER</span></h2>
      </a>
      <a href="post1.php" class="read-btn">READ MORE</a>
    </div>
  </section>
  
  <section class="blog-post reverse">
    <div class="image">
      <a href="post2.php"><img src="https://sincerelyjules.com/wp-content/uploads/2025/10/SKIMS_SJ_dress-5.MANU-ATELIER_Sincerely_JulesJPG-scaled.jpg" alt="Post 2"></a>
    </div>
    <div class="text">
      <p class="category">LIFESTYLE</p>
      <a href="post2.php" class="title-link">
        <h2>STYLISH LOOKS FOR<br><span>SPRING DAYS</span></h2>
      </a>
      <a href="post2.php" class="read-btn">READ MORE</a>
    </div>
  </section>

  <section class="blog-post">
    <div class="image">
      <a href="postextra.php"><img src="https://sincerelyjules.com/wp-content/uploads/2025/11/SINCERELUJULES_grey_frankie_coat_silver_adida_the_row_bag_1.jpg" alt="Post extra"></a>
    </div>
    <div class="text">
      <p class="category">FASHION</p>
      <a href="postextra.php" class="title-link">
        <h2>COZY OUTFIT TO WEAR<br><span>IN ASPEN</span></h2>
      </a>
      <a href="postextra.php" class="read-btn">READ MORE</a>
    </div>
  </section>
  
<section class="highlights">
  <h2 class="highlight-title">Highlights of the Week</h2>
  <div class="slider-wrapper">
    <button class="prev">&#10094;</button>
    <div class="slider-container" style="overflow:hidden; width:100%;">
      <div class="slider">
        <div class="slide"><a href="post3.php"><img src="https://sincerelyjules.com/wp-content/uploads/2024/03/IMG_0029.jpg"><p>STYLE A CAP WITH <br><strong>A BLAZER</strong></p></a></div>
        <div class="slide"><a href="post4.php"><img src="https://sincerelyjules.com/wp-content/uploads/2024/08/sincerely-jules-rhode-dress-everlane-fisherman-sandals-11-1000x1500.jpg"><p>TRAVEL HERO: <br><strong>MAXI DRESSES</strong></p></a></div>
        <div class="slide"><a href="post5.php"><img src="https://sincerelyjules.com/wp-content/uploads/2025/09/Sincerely_jules_posse_polka_dot_dress_the_row_look_6.jpg"><p>VACATIONS IN <br><strong>SYALUTIA</strong></p></a></div>
        <div class="slide"><a href="post6.php"><img src="https://sincerelyjules.com/wp-content/uploads/2025/09/Sincerely_jules_posse_polka_dot_dress_the_row_look_10.jpg"><p>STYLE <br><strong>A POLKA DRESS</strong></p></a></div>
        <div class="slide"><a href="post7.php"><img src="https://sincerelyjules.com/wp-content/uploads/2025/03/IMG_6778.jpg"><p>INSPIRATION: <br><strong>IN NYC CITY</strong></p></a></div>
      </div>
    </div>
    <button class="next">&#10095;</button>
  </div>
</section>

<script>
  const slider = document.querySelector('.slider');
  const slides = Array.from(document.querySelectorAll('.slide'));
  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.prev');

  const visibleSlides = 3;
  let index = 0;

  // CLONING LOGIC (Jo aapne pehle banayi thi)
  for(let i = 0; i < visibleSlides -1; i++){
      let clone = slides[i].cloneNode(true);
      slider.appendChild(clone);
  }
  for(let i = slides.length - (visibleSlides -1); i < slides.length; i++){
      let clone = slides[i].cloneNode(true);
      slider.insertBefore(clone, slider.firstChild);
  }

  let allSlides = slider.querySelectorAll('.slide');

  function updateSlidePosition(){
      slider.style.transition = 'transform 0.5s ease';
      slider.style.transform = `translateX(${-index * (100 / visibleSlides)}%)`;
  }

  index = visibleSlides -1;
  updateSlidePosition();

  nextBtn.addEventListener('click', () => {
      index++;
      updateSlidePosition();
      resetAutoSlide();
      checkLoop();
  });

  prevBtn.addEventListener('click', () => {
      index--;
      updateSlidePosition();
      resetAutoSlide();
      checkLoop();
  });

  let autoSlide = setInterval(() => {
      index++;
      updateSlidePosition();
      checkLoop();
  }, 3000);

  function resetAutoSlide(){
      clearInterval(autoSlide);
      autoSlide = setInterval(() => {
          index++;
          updateSlidePosition();
          checkLoop();
      }, 3000);
  }

  function checkLoop(){
      setTimeout(() => {
          if(index >= allSlides.length - (visibleSlides -1)){
              slider.style.transition = 'none';
              index = visibleSlides -1;
              slider.style.transform = `translateX(${-index * (100 / visibleSlides)}%)`;
          }
          if(index < visibleSlides -1){
              slider.style.transition = 'none';
              index = allSlides.length - (2*(visibleSlides -1));
              slider.style.transform = `translateX(${-index * (100 / visibleSlides)}%)`;
          }
      }, 600);
  }
  </script>
<footer class="site-footer">
  <div class="footer-left">
    <a href="https://www.instagram.com/z_aneb.rasool3" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://www.tiktok.com/@YOUR_TIKTOK_USERNAME" target="_blank">
      <i class="fa-brands fa-tiktok"></i>
    </a>
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