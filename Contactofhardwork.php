<?php 
// Database connection include karein
include 'db.php'; 

$message_sent = false;

// Agar user ne form submit kiya hai
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form se data lena
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // MongoDB ki 'contacts' collection mein data save karna
    $collection = $db->contacts; // 'contacts' naam ki collection ban jayegi
    
    $insertResult = $collection->insertOne([
        'name' => $name,
        'email' => $email,
        'message' => $comment,
        'date' => new MongoDB\BSON\UTCDateTime()
    ]);

    if($insertResult->getInsertedCount() > 0) {
        $message_sent = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact | Zaneb Aesthetics</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

<style>
/* ... (Aapki original CSS wahi rahegi) ... */
* { margin: 0; padding: 0; box-sizing: border-box; }

header {
  display: flex;
  background-color: #f4f4f4;
  justify-content: space-between;
  align-items: center;
  padding: 20px 50px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  position: sticky; top: 0; z-index: 1000;
}

.logo { font-size: 28px; font-weight: bold; font-family: 'Dancing Script', cursive; color: #333; }

nav a { text-decoration: none; color: #333; margin: 0 15px; font-size: 18px; transition: 0.3s; }
nav a:hover { color: #b5838d; }

h1 { text-align: center; font-size: 40px; margin-top: 60px; font-family: 'Playfair Display', serif; }

.image-container { text-align: center; margin-top: 60px; }
.image-container img { width: 50%; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }

.caption { margin-top: 20px; font-size: 44px; font-family: 'Playfair Display', serif; font-weight: 600; }
.contact-text { font-family: 'Playfair Display', serif; font-size: 18px; color: #444; margin-top: 15px; }

.sayhi { font-family: 'Dancing Script', cursive; font-size: 36px; margin: 60px 0 40px; }

form { width: 40%; margin: 30px auto; display: flex; flex-direction: column; gap: 15px; }
input, textarea { padding: 12px; border: 1px solid #ccc; font-family: 'Playfair Display', serif; font-size: 16px; outline: none; }
input:focus, textarea:focus { border-color: #b5838d; }

button { background-color: black; color: white; border: none; padding: 15px; cursor: pointer; transition: 0.3s; font-size: 16px; }
button:hover { background-color: #b5838d; }

.follow-section { background-color: #e7d2c2; padding: 40px 0 10px; text-align: center; }
.follow-text .script { font-family: 'Dancing Script', cursive; font-size: 45px; }
.insta-gallery { display: flex; width: 100%; background-color: #e7d2c2; }
.insta-gallery img { width: 16.66%; height: 280px; object-fit: cover; }

.site-footer { background-color: #e7d2c2; display: flex; justify-content: space-between; align-items: center; padding: 35px 8%; color: #333; }
.footer-left a { color: black; font-size: 23px; margin-right: 15px; }
.footer-right a { color: #333; text-decoration: none; margin-left: 20px; }
.footer-center { text-align: center; }
.footer-center h3 { font-family: 'Poppins', sans-serif; font-size: 22px; }

/* Success Alert style */
.alert { padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; width: 40%; margin: 10px auto; text-align: center; }

@media (max-width: 768px) { form { width: 80%; } .image-container img { width: 90%; } }
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

<h1>CONTACT ME</h1>
<hr style="width: 80%; margin: 20px auto; border: 0.5px solid #ccc;">

<div class="image-container">
  <img src="https://sincerelyjules.com/wp-content/uploads/2025/09/Sincerely_jules_posse_polka_dot_dress_the_row_look_10.jpg" alt="Contact Me">
  <div class="caption">BOOKINGS <em>and</em> PARTNERSHIPS</div>

  <p class="contact-text">
    For booking inquiries & partnerships, please contact: <br>
    <a href="mailto:zanebrasool@gmail.com" style="color: black; font-weight: bold;">zanebrasool@gmail.com</a>
  </p>

  <div class="sayhi">Say hi to me on this form!</div>

  <?php if($message_sent): ?>
      <div class="alert">Thank you! Your message has been sent successfully.</div>
  <?php endif; ?>

  <form action="Contactofhardwork.php" method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="comment" placeholder="Your Message" required></textarea>
    <button type="submit">SEND MESSAGE</button>
  </form>
</div>

<div style="margin-top: 120px;"></div>

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