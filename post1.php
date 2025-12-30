<?php 
include 'db.php'; 
$post_id = "post1"; 

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
    echo "<script>window.location.href='post1.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>post 1 | Zaneb Aesthetics</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Sabse Pehle Aapki Original CSS (Waisi hi jaisi Screenshots 773-778 mein thi) */
    * { margin: 0; padding: 0; box-sizing: border-box; }

    .hero {
      position: relative; width: 100%; height: 900px;
      background-image: url('https://magme.hr/wp-content/uploads/2025/09/sezan2.jpg');
      background-size: cover; background-position: center; margin-bottom: 80px;
    }

    .hero header {
      position: absolute; top: 0; left: 0; width: 100%;
      display: flex; justify-content: space-between; align-items: center;
      padding: 20px 50px; z-index: 10; background-color: rgba(255, 255, 255, 0.2);
    }

    .hero header .logo { font-family: 'Dancing Script', cursive; font-size: 28px; font-weight: bold; color: white; }
    .hero header nav a { color: white; text-decoration: none; margin-left: 20px; font-size: 18px; }

    .post-text { text-align: center; padding: 5px 20px; font-family: 'Playfair Display', serif; }
    .post-text .category { font-size: 20px; letter-spacing: 5px; color: #777; margin-bottom: 10px; }
    .post-text h2 { font-size: 50px; color: #333; line-height: 1.3; }

    .post-image { display: flex; justify-content: center; margin: 40px 0; }
    .post-image img { width: 45%; height: 800px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); object-fit: cover; }

    .post-description { max-width: 800px; margin: 0 auto 60px auto; text-align: center; font-size: 18px; line-height: 1.7; color: #555; padding: 0 20px; }

    /* Slider styling */
    .slider-wrapper { margin-bottom: 100px; overflow: hidden; }
    .slider-container { display: flex; overflow-x: auto; scroll-behavior: smooth; padding: 20px 0; gap: 40px; justify-content: center; }
    .slider-container::-webkit-scrollbar { display: none; }
    .slider-item img { width: 120px; height: 170px; object-fit: cover; border-radius: 10px; }

    .post-double-images { display: flex; justify-content: center; gap: 20px; margin: 40px 0; }
    .post-double-images img { width: 30%; height: auto; border-radius: 5px; }

    .post-tip {
  max-width: 800px;       /* text width */
  margin: 20px auto 60px auto; /* spacing above and below */
  font-family: 'Playfair Display', serif;
  font-size: 18px;
  line-height: 1.7;
  color: #555;
  text-align: justify;    /* justify the text */
  padding: 0 20px;        /* horizontal padding for small screens */
}


    /* Comment Section (Original Styling) */
    .comment-section { max-width: 750px; margin: 80px auto; padding: 40px 20px; border-top: 2px solid #e7d2c2; font-family: 'Playfair Display', serif; color: #333; }
    .comment-header h3 {
  font-size: 28px;
  margin-bottom: 5px;}
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
  color: #ff4f81;
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
    
    /* Displaying Comments */
    .comment-card { background: #f8f8f8; padding: 15px; border-radius: 6px; margin-top: 15px; border-left: 4px solid #b5838d; text-align: left; }
    
    .follow-section { background-color: #e7d2c2; padding: 25px 0 0 0; text-align: center; }
    .insta-gallery { display: flex; width: 100%; background-color: #e7d2c2; }
    .insta-gallery img { width: 16.66%; height: 280px; object-fit: cover; }
    .site-footer { background-color: #e7d2c2; display: flex; justify-content: space-between; align-items: center; padding: 35px 8%; }
    .footer-center { text-align: center; }
.footer-center h3 { font-family: 'Poppins', sans-serif; font-size: 22px; }
.insta-gallery { display: flex; width: 100%; background-color: #e7d2c2; }
.insta-gallery img { width: 16.66%; height: 280px; object-fit: cover; }

.site-footer { background-color: #e7d2c2; display: flex; justify-content: space-between; align-items: center; padding: 35px 8%; color: #333; }
.footer-left a { color: black; font-size: 23px; margin-right: 15px; }
.footer-right a { color: #333; text-decoration: none; margin-left: 20px; }
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
  </div>

  <div class="post-text">
    <p class="category">FASHION</p>
    <h2>EASY LAYERS FOR<br><span>IN-BETWEEN WEATHER</span></h2>
  </div>

  <div class="post-image">
    <img src="https://magme.hr/wp-content/uploads/2025/09/sezan2.jpg" alt="Trench coat look">
  </div>

  <div class="post-description">
    <p>
      A light trench, denim, a white tee, and loafers is my go-to look for those in-between days when it’s cooler than summer but not quite fall. It’s classic, comfortable, and easy to throw on.
      <br><br>
      The trench keeps you warm in the morning chill, the white tee keeps things light, and loafers make it polished without trying too hard. It’s simple, versatile, and perfect for running errands, coffee dates, or just enjoying the crisp air.
    </p>
  </div>

      <div class="slider-wrapper">
    <div class="slider-container">
      <div class="slider-item">
        <img src="https://coach.scene7.com/is/image/Coach/ccx07_b4mpl_a0?$desktopProduct$" alt="Coach">
        <p>Coach</p>
      </div>
      <div class="slider-item">
        <img src="https://cdn.modaoperandi.com/assets/images/products/1038274/684249/large_ferragamo-neutral-hug-soft-bicolor-shoulder-bag-l.jpg?_v=1758719886" alt="J.Crew">
        <p>J.Crew</p>
      </div>
      <div class="slider-item">
        <img src="https://m.media-amazon.com/images/G/01/Shopbop/p/prod/products/jenbr/jenbr3015520bd7/jenbr3015520bd7_1757513107390_2-0._QL90_UX564_.jpg" alt="Anine Bing">
        <p>ANINE BING</p>
      </div>
      <div class="slider-item">
        <img src="https://static.zara.net/assets/public/b08f/d358/489a46a6966c/8826c526724e/13148610700-e1/13148610700-e1.jpg?ts=1758092090444&w=433" alt="Levi’s">
        <p>ZARA</p>
      </div>
      <div class="slider-item">
        <img src="https://static.zara.net/assets/public/9c1b/8ea0/7c56469093ee/d427a0bb9cf8/03811247732-1-p/03811247732-1-p.jpg?ts=1756797944630&w=1125" alt="Zara">
        <p>ZARA</p>
      </div>
    </div>
  </div>

  <div class="post-double-images">
    <img src="https://magme.hr/wp-content/uploads/2025/09/sezan3.jpg" alt="Outfit 1">
    <img src="https://magme.hr/wp-content/uploads/2025/09/sezan.jpg" alt="Outfit 2">
  </div>

  <div class="post-tip">
  <p>
    <b>Tip:</b> For a French-inspired style, stick to a neutral color palette and focus on high-quality, classic pieces. Think trench coats, blazers, and easy basics like jeans and tees—but make sure those basics feel both luxe and laid-back.
  </p>
</div>
</div>
  </div>

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

  <div class="follow-section">
    <div class="follow-text">
      <span style="font-family:'Dancing Script'; font-size:40px;">Follow</span> @ZANEB ASTHETICS
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

  <script>
    // Real Like Update logic
const likeBtn = document.getElementById('like-btn');
const likeIcon = likeBtn.querySelector('i');
const likeCountEl = document.getElementById('like-count');

likeBtn.addEventListener('click', () => {
    // Check karein ke pehle se liked hai ya nahi
    const isLiked = likeBtn.classList.contains('liked');
    const action = isLiked ? 'unlike' : 'like';

    fetch(`update_like.php?post_id=post1&action=${action}`)
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