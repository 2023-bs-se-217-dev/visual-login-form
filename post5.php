<?php 
include 'db.php'; 
$post_id = "post5"; 

// Database se current likes nikalna
$likes_collection = $db->likes;
$post_likes = $likes_collection->findOne(['post_id' => $post_id]);
$current_likes = $post_likes ? $post_likes['count'] : 0;

// Database se comments nikalna
$comments_collection = $db->comments;
$existing_comments = $comments_collection->find(['post_id' => $post_id]);

// Comment Submit Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
    $comments_collection->insertOne([
        'post_id' => $post_id,
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'comment' => htmlspecialchars($_POST['comment']),
        'date' => new MongoDB\BSON\UTCDateTime()
    ]);
    echo "<script>window.location.href='post5.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>post 1</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Reset basic margins */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Hero Section */
    .hero {
      position: relative;
      width: 100%;
      height: 900px;
      background-image: url('https://sincerelyjules.com/wp-content/uploads/2025/11/Casa_rosada_sincerelyjules-17-1000x1500.jpg');
      background-size: cover;
      background-position: center;
      margin-bottom: 80px; /* space below image */
    }

    /* Transparent Header */
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

    /* Overlay on image */
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

    /* ===== Text below image ===== */
    .post-text {
      text-align: center;
      padding: 5px 20px;
      font-family: 'Playfair Display', serif;
    }

    .post-text .category {
      font-size: 20px;
      letter-spacing: 5px;
      color: #777;
      margin-bottom: 10px;
    }

    .post-text h2 {
      font-size: 50px;
      color: #333;
      line-height: 1.3;
    }

    .post-text h2 span {
      display: block;
    }
    /* ===== Centered Image ===== */
    .post-image {
      display: flex;
      justify-content: center;
      margin: 40px 0;
    }

    .post-image img {
      width: 45%;
      height: 900px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    /* ===== Description ===== */
    .post-description {
      max-width: 800px;
      margin: 0 auto 60px auto;
      text-align: center;
      font-size: 18px;
      line-height: 1.7;
      color: #555;
      padding: 0 20px;
    }
    /* ===== Slider Section ===== */
    .slider-container {
      display: flex;
      overflow-x: auto;
      scroll-behavior: smooth;
      padding: 20px 0;
      gap: 40px;
      justify-content: center;
    }

    .slider-container::-webkit-scrollbar {
      display: none; /* hide scrollbar */
    }

    .slider-item {
      flex: 0 0 auto;
      text-align: center;
    }

    .slider-item img {
      width: 120px;
      height: 170px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .slider-item img:hover {
      transform: scale(1.05);
    }

    .slider-item p {
      margin-top: 10px;
      font-weight: bold;
      color: #222;
      font-size: 15px;
    }

    /* Optional: subtle fade edges */
    .slider-wrapper {
      position: relative;
      overflow: hidden;
      margin-bottom: 100px;
    }

    /* Two side-by-side images below slider */
.post-double-images {
  display: flex;
  justify-content: center;
  gap: 20px; /* small gap between images */
  margin: 40px 0; /* space above and below */
}

.post-double-images img {
  width: 30%; /* same width for both images */
  height: auto; /* maintain aspect ratio */
  border-radius: 5px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  margin-top: 2px;
}

.post-tip {
  max-width: 800px;       /* text width */
  margin: 20px auto 60px auto; /* spacing above and below */
  font-family: 'Playfair Display', serif;
  font-size: 18px;
  line-height: 1.7;
  color: #555;
  text-align: center;    /* justify the text */
  padding: 0 20px;        /* horizontal padding for small screens */
}

/* ===== Comment Section ===== */
.comment-section {
  max-width: 750px;
  margin: 80px auto;
  padding: 40px 20px;
  border-top: 2px solid #e7d2c2;
  font-family: 'Playfair Display', serif;
  color: #333;
}

.comment-header h3 {
  font-size: 28px;
  margin-bottom: 5px;
}

.comment-header p {
  font-size: 14px;
  color: #777;
  margin-bottom: 25px;
}

.like-area {
  text-align: center;
  margin-bottom: 30px;
}

#like-btn {
  background: none;
  border: none;
  font-size: 28px;
  color: #b5838d;
  cursor: pointer;
  transition: transform 0.2s ease, color 0.3s ease;
}

#like-btn.liked i{
  color: '#ff4f81';
}

#like-btn:hover {
  transform: scale(1.1);
}

#like-count {
  font-size: 18px;
  color: #555;
  margin-left: 10px;
}

#comment-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

#comment-form label {
  font-weight: bold;
  text-align: left;
}

#comment-form textarea {
  width: 100%;
  height: 120px;
  padding: 10px;
  font-family: inherit;
  border: 1px solid #ccc;
  border-radius: 5px;
  resize: none;
}

.form-row {
  display: flex;
  gap: 10px;
}

.form-row input {
  flex: 1;
}

#comment-form input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

#send-message {
  background-color: #333;
  color: white;
  border: none;
  padding: 12px 25px;
  cursor: pointer;
  font-weight: bold;
  letter-spacing: 1px;
  transition: background 0.3s ease;
  width: fit-content;
  margin: 0 auto;        /* centers the button horizontally */
  display: block;        /* needed for margin auto to work */
  border-radius: 4px;    /* optional, for a softer look */
}

#send-message:hover {
  background-color: #b5838d;
}


.submitted-comments {
  margin-top: 40px;
}

.submitted-comments p {
  background: #f8f8f8;
  padding: 12px 15px;
  border-radius: 6px;
  margin-bottom: 10px;
}

/* Follow Section */
.follow-section {
  background-color: #e7d2c2; /* same as footer */
  padding: 25px 0 0 0;
  text-align: center;
  position: relative;
}

.follow-text {
  display: inline-block;
  border-bottom: 2px solid #333;
  padding-bottom: 10px;
}

.follow-text .script {
      font-family: 'Dancing Script', cursive;
      font-size: 45px;
      color: #333;
      margin-right: 8px;
    }

.follow-text .normal {
  font-family: 'Playfair Display', serif;
  font-size: 22px;
  color: #333;
  font-weight: bold;
}

.insta-gallery {
  display: flex;
  width: 100%;
  background-color: #e7d2c2; /* dusty pink */

}

.insta-gallery img {
  width: 16.66%;
  height: 280px;
  object-fit: cover;
  margin: 0;
  padding: 0;
  border: none;
}

/* Footer Styling (updated)      */
.site-footer {
  background-color: #e7d2c2; /* slightly darker beige than highlights */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 35px 8%;
  color: #333;
  flex-wrap: wrap;
  border-top: none;
}

/* Left: icons */
.footer-left a {
  color: black; /* black icons */
  font-size: 23px;
  margin-right: 15px;
  transition: opacity 0.3s;
}
.footer-left a:hover {
  opacity: 0.7; /* slight fade hover */
}

/* Center text */
.footer-center {
  text-align: center;
}
.footer-center h3 {
  font-family: 'popins' , serifs;
  font-size: 23px;
  margin-bottom: 5px;
}
.footer-center p {
  font-size: 14px;
  color: #555;
}

/* Right links */
.footer-right a {
  color: #333;
  text-decoration: none;
  margin-left: 20px;
  font-weight: 500;
  transition: color 0.3s;
}
.footer-right a:hover {
  color: #b5838d; /* soft pink hover */
}

/* Responsive footer */
@media (max-width: 768px) {
  .site-footer {
    flex-direction: column;
    text-align: center;
  }
  .footer-left, .footer-right {
    margin-top: 10px;
  }

  </style>
</head>
<body>
  <div class="hero">
    <header>
      <div class="logo">ZANEB ASTHETICS</div>
      <nav>
        <a href="hardwork.html">Home</a>
        <a href="Aboutofhardwork.html">About</a>
        <a href="Blogofhardwork.html">Blog</a>
        <a href="Contactofhardwork.html">Contact</a>
      </nav>
    </header>
  </div>

  <!-- Text below image -->
  <div class="post-text">
    <p class="category">FASHION</p>
    <h2>WHERE TO STAY<br><span>IN SAYULITA</span></h2>
  </div>
<!-- Centered Image -->
  <div class="post-image">
    <img src="https://sincerelyjules.com/wp-content/uploads/2025/11/CasaRosada_lifestyle-2-scaled.jpg" alt="Trench coat look">
  </div>

  <!-- Description -->
  <div class="post-description">
    <p>
     I recently spent some time in Sayulita, a place I’ve been lucky enough to visit before. But this trip felt extra special because I went with my siblings (plus our significant others). We decided to escape there for a few days of sun, rest, and much-needed time together.
      <br><br>
      Sayulita is a vibrant, colorful town filled with magic. From local markets, and art galleries to incredible food and stunning beaches, every corner is alive with culture and charm; it’s truly a special place.
        <br><br>
       What really made this trip unforgettable, though, was the house we stayed in — Casa Rosada, located in Sayulita, one of Mexico’s charming Pueblo Màgico towns. The house itself was surreal, sitting right on the beach — you can literally step onto the sand, drink in hand, the minute you arrive. What I loved most was how it felt like a private little resort, offering the exclusivity of a home with the comfort of having a full staff to take care of every need.
       <br><br>
       And if you’re anything like me, design is everything — and this house is STUNNING. Seriously, it’s a tropical oasis with five bedrooms, a private heated infinity pool, a hot tub, and a gorgeous courtyard. Every corner is thoughtfully designed, with beautiful tile work, lush potted plants, and spacious dining areas perfect for long, lazy meals. The soft pink exterior surrounded by lush green palm trees feels like something straight out of a dream — luxe, warm, and effortlessly stylish. 
    </p>
  </div>
<!-- ===== Product Slider ===== -->
  <div class="slider-wrapper">
    <div class="slider-container">
      <div class="slider-item">
        <img src="https://shop.mango.com/assets/rcs/pics/static/T1/fotos/S/17041125_OR_B.jpg?ts=1745582698229&im=SmartCrop,width=280,height=392&imdensity=1" alt="Coach">
        <p>MANGO</p>
      </div>
      <div class="slider-item">
        <img src="https://cdn.modaoperandi.com/assets/images/products/1042662/689214/medium_large_brinker-eliza-gold-sirena-necklace.jpg?_v=1761765947" alt="J.Crew">
        <p>Moda Operandi</p>
      </div>
      <div class="slider-item">
        <img src="https://cdn.modaoperandi.com/assets/images/products/1054047/701423/medium_khaite-brown-manhattan-belt-gold-20mm.jpg?_v=1762359164" alt="Anine Bing">
        <p>Chan Luu</p>
      </div>
      <div class="slider-item">
        <img src="https://cdn.modaoperandi.com/assets/images/products/1033678/679166/medium_gucci-grey-horsebit-top-bar-2.jpg?_v=1758724333" alt="Levi’s">
        <p>GUCCI</p>
      </div>
      <div class="slider-item">
        <img src="https://cdn.modaoperandi.com/assets/images/products/1061648/709717/medium_ben-amun-black-exclusive-necklace-11.jpg?_v=1762453645" alt="Zara">
        <p>BEN-AMUN</p>
      </div>
    </div>
  </div>

  <!-- Two Images Below Slider -->
<div class="post-double-images">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/11/Casarosada_sj-scaled.jpg" alt="Outfit 1">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/11/CasaRosada_lifestyle-36-scaled.jpg" alt="Outfit 2">
</div>

<!-- Tip Text Below Two Images -->
<div class="post-tip">
  <p>
    Memorable moments I’ll cherish forever — from cooking big meals together and dancing around the house, to my little one enjoying some quiet time coloring, swimming, and soaking up the sun. It was a trip filled with laughter, good food, and total relaxation.

  </p>
</div>

<!-- ===== Like + Comment Section ===== -->
<section class="comment-section">
<div class="comment-header">
      <h3>Leave a Reply</h3>
      <p>Your email address will not be published.</p>
    </div>

    <div class="like-area">
      <button id="like-btn"><i class="fa-regular fa-heart"></i></button>
      <span id="like-count"><?php echo $current_likes; ?></span> Likes
    </div>

    <!-- Comment Form -->
  <form id="comment-form">
    <label for="comment">Your Comment</label>
    <textarea id="comment" name="comment" placeholder="Write your comment..."></textarea>

    <div class="form-row">
      <input type="text" id="name" name="name" placeholder="Name" required>
      <input type="email" id="email" name="email" placeholder="Email" required>
    </div>
    <button type="submit" id="send-message">SEND MESSAGE</button>
  </form>

    <div class="submitted-comments">
      <h4 style="margin-top:30px;">Comments:</h4>
      <?php if($existing_comments): ?>
        <?php foreach ($existing_comments as $c): ?>
          <div class="comment-card">
            <strong><?php echo htmlspecialchars($c['name']); ?>:</strong>
            <p><?php echo htmlspecialchars($c['comment']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No comments yet.</p>
      <?php endif; ?>
    </div>
  </section>
<!-- Follow Me Line -->
<div class="follow-section">
  <div class="follow-text">
    <span class="script">Follow</span>
    <span class="normal">@ZANEB ASTHETICS</span>
  </div>
</div>

<!-- Image Flexbox -->
<div class="insta-gallery">
  <img src="https://sincerelyjules.com/wp-content/uploads/2024/12/VS_holidaypajamas-20-1000x1500.jpg" alt="1">
  <img src="https://sincerelyjules.com/wp-content/uploads/2021/05/Sincerely-Jules-Palm-Springs-Look-1000x1500.jpg" alt="2">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/03/Bluesky_sjkitchen-8-1000x1500.jpg" alt="3">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/02/Sincerely_jules_beach_outfit-1000x1474.jpg" alt="4">
  <img src="https://sincerelyjules.com/wp-content/uploads/2023/06/IMG_9001.jpg" alt="5">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/12/Sincerely_jules_red_scarf_white_knit_jeans_gucci_loafers_look_3-1000x1500.jpg" alt="6">
</div>

<!-- Small gap before footer -->
<div class="footer-gap"></div>

<footer class="site-footer">
  <!-- Left: social icons -->
  <div class="footer-left">
    <a href="https://www.instagram.com/z_aneb.rasool3" target="_blank">
      <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="https://www.tiktok.com/@YOUR_TIKTOK_USERNAME" target="_blank">
      <i class="fa-brands fa-tiktok"></i>
    </a>
  </div>

  <!-- Center: site title and copyright -->
  <div class="footer-center">
    <h3>Zaneb Aesthetics</h3>
    <p>© 2025 Zaneb Aesthetics. All rights reserved.</p>
  </div>

  <!-- Right: navigation links -->
  <div class="footer-right">
    <a href="Aboutofhardwork.html">About</a>
    <a href="contact.html">Contact</a>
  </div>
</footer>
<!-- Font Awesome icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" crossorigin="anonymous"></script>

  <script>
    // Real Like Update logic
const likeBtn = document.getElementById('like-btn');
const likeIcon = likeBtn.querySelector('i');
const likeCountEl = document.getElementById('like-count');

likeBtn.addEventListener('click', () => {
    // Check karein ke pehle se liked hai ya nahi
    const isLiked = likeBtn.classList.contains('liked');
    const action = isLiked ? 'unlike' : 'like';

    fetch(`update_like.php?post_id=post5&action=${action}`)
        .then(res => res.json())
        .then(data => {
            likeCountEl.textContent = data.new_count;
            
            if (action === 'like') {
                likeBtn.classList.add('liked');
                likeIcon.classList.replace('fa-regular', 'fa-solid');
            } else {
                likeBtn.classList.remove('liked');
                likeIcon.classList.replace('fa-solid', 'fa-regular');
            }
        })
        .catch(err => console.error("Error:", err));
});
</script>
</body>
</html>

