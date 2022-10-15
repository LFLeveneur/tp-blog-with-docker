<?php
require_once dirname(__FILE__, 2) . '/include/post.inc.php';
displayCreateNewPost();
displayUpdatePost();
displayDeletePost();
?>
    <div class="container">
        <div class="row justify-content-center w-100 m-auto">
            <?php displayPosts();?>
        </div>
    </div>
