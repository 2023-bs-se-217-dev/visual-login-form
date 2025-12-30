<?php
require 'vendor/autoload.php'; 

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->FashionBlog;

    $commentsCol = $db->comments; // Leave a Reply ke liye
    $contactsCol = $db->contacts; // Contact Me page ke liye
    $likesCol    = $db->likes;    // Like button/pink heart ke liye

} catch (Exception $e) {
    // Agar koi error aaye (maslan MongoDB server off ho), toh yeh message dikhayega.
    die("Database Connection Error: " . $e->getMessage());
}
?>