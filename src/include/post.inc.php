<?php
require dirname(__FILE__, 2) . '/entity/db.php';
require dirname(__FILE__, 2) . '/entity/post.php';

function displayPosts() {
    $db = new DB();
    $post = new Post($db->connect_db());
    $posts = $post->getPosts();
    foreach($posts as $post) {
        echo '<div class="card" style="width: 18rem; margin: 10px">
                  <div class="card-body">
                    <h5 class="card-title">' . $post['post_title'] . '</h5>
                    <h6 class="card-subtitle mb-2 text-muted">' . $post['post_author'] . '</h6>
                    <p class="card-text">'. $post['post_content'] .'</p>
                    <a href="?updatePost=' . $post['id'] . '" class="card-link">Update</a>
                    <a href="?deletePostID=' . $post['id'] . '" class="card-link">Delete</a>
                  </div>
                </div>';
    }

}

function displayCreateNewPost() {
    if (isset($_GET['newPost'])) {
        echo "<div class='container text-center'>
                <form class='newPost w-100 m-auto row' method='post' >
                    <input class='row mb-1' type='text' name='postTitle' placeholder='Title'>
                    <input class='row mb-1' type='text' name='postContent' placeholder='Content'>
                    <input class='row mb-1' type='text' name='postAuthor' placeholder='Author' value='" . $_SESSION['userPseudo'] . "'>
                    <input class='row' type='submit' name='createPost' value='Create Post'>
                </form>
              </div>";
        if (isset($_POST['createPost']) && !empty($_POST['postTitle']) && !empty($_POST['postContent']) && !empty($_POST['postAuthor'])) {
            $postTitle = $_POST['postTitle'];
            $postContent = $_POST['postContent'];
            $postAuthor = $_POST['postAuthor'];
            $userID = $_SESSION["userID"];
            $db = new DB();
            $post = new Post($db->connect_db());
            $post->createPost($postTitle, $postContent, $postAuthor, $userID);
        } else if (isset($_POST['createPost']) && (empty($_POST['postTitle']) || empty($_POST['postContent']) || empty($_POST['postAuthor']))) {
            echo '<div class="alert alert-warning" role="alert">
                    Please fill all the fields.
                  </div>';
        }
    }
}

function displayUpdatePost() {
    if (isset($_GET['updatePost'])) {
        $postID = $_GET['updatePost'];
        $db = new DB();
        $bdd = $db->connect_db();
        $post = new Post($bdd);
        $post = $post->displayPost($postID);

        if ($_SESSION['userStatus'] && ($_SESSION['userStatus'] == 'admin' || $_SESSION['userPseudo'] == $post['post_author'])) {
            echo "<div class='container text-center'>
                    <form class='newPost w-100 m-auto row' method='post' >
                        <input class='row mb-1' type='text' name='postTitle' placeholder='Title' value='" . $post['post_title'] . "'>
                        <input class='row mb-1' type='text' name='postContent' placeholder='Content' value='" . $post['post_content'] . "'>
                        <input class='row mb-1' type='text' name='postAuthor' placeholder='Author' value='" . $post['post_author'] . "'>
                        <input class='row' type='submit' name='updatePost' value='Update Post'>
                    </form>
                  </div>";
            if (isset($_POST['updatePost']) && !empty($_POST['postTitle']) && !empty($_POST['postContent']) && !empty($_POST['postAuthor'])) {
                $postTitle = $_POST['postTitle'];
                $postContent = $_POST['postContent'];
                $postAuthor = $_POST['postAuthor'];
                $post = new Post($bdd);
                $post->updatePost($postTitle, $postContent, $postAuthor, $postID);
            } else if (isset($_POST['updatePost']) && (empty($_POST['postTitle']) || empty($_POST['postContent']) || empty($_POST['postAuthor']))) {
                echo '<div class="alert alert-warning" role="alert">
                        Please fill all the fields.
                      </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    You are not allowed to update this post.
                  </div>';
        }
    }
}

function displayDeletePost() {
    if (isset($_GET['deletePostID'])) {
        $postID = $_GET['deletePostID'];
        $db = new DB();
        $bdd = $db->connect_db();
        $post = new Post($bdd);
        $post = $post->displayPost($postID);

        if ($_SESSION['userStatus'] && ($_SESSION['userStatus'] == 'admin' || $_SESSION['userPseudo'] == $post['post_author'])) {
            $post = new Post($bdd);
            $post->deletePost($postID);
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    You are not allowed to delete this post.
                  </div>';
        }
    }
}