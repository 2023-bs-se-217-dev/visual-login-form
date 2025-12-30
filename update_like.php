<?php
include 'db.php';

$post_id = $_GET['post_id'];
$action = $_GET['action']; // 'like' ya 'unlike'
$collection = $db->likes;

// Agar action 'like' hai to +1, warna -1
$value = ($action === 'like') ? 1 : -1;

$collection->updateOne(
    ['post_id' => $post_id],
    ['$inc' => ['count' => $value]],
    ['upsert' => true]
);

// Naya total count nikal kar wapis bhejna
$post = $collection->findOne(['post_id' => $post_id]);
$new_count = ($post['count'] < 0) ? 0 : $post['count']; // Count 0 se niche na jaye

// Agar count minus mein chala gaya ho to usay 0 set kar dein
if ($post['count'] < 0) {
    $collection->updateOne(['post_id' => $post_id], ['$set' => ['count' => 0]]);
}

echo json_encode(['new_count' => $new_count]);
?>