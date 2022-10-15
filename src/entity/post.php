<?php
class Post {
    public function __construct($bdd) {
        $this->bdd = $bdd;

    }

    public function createPost($postTitle, $postContent, $postAuthor, $userID) {
        $request = $this->bdd->prepare("INSERT INTO post (post_title, post_content, post_author, user_id) VALUES (?, ?, ?, ?)");
        $request->execute([$postTitle, $postContent, $postAuthor, $userID]);
    }

    public function getPosts() {
        $request = $this->bdd->prepare("SELECT * FROM post");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updatePost($postTitle, $postContent, $postAuthor, $postID) {
        $request = $this->bdd->prepare("UPDATE post SET post_title = ?, post_content = ?, post_author = ? WHERE id = ?");
        $request->execute([$postTitle, $postContent, $postAuthor, $postID]);
    }

    public function deletePost($postID) {
        $request = $this->bdd->prepare("DELETE FROM post WHERE id = ?");
        $request->execute([$postID]);
    }

    public function displayPost($postID) {
        $request = $this->bdd->prepare("SELECT * FROM post WHERE id = ?");
        $request->execute([$postID]);
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}