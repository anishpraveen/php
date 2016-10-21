<?php
  class User {
    
    public $name;
    public $author;
    public $content;   

    

    public static function find($name) {
      /*$db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);*/

      if ($name	== "asd") {
      	return true;
      }
      return false;
    }
  }
?>