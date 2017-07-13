<?php
class Blog extends Item {
    static $tableName='blog';
    public $avatar = "img/featured-post-1.jpg";
    public static $thumb_sizes= ['featured_post'=>[122,122],'full_cover'=>[1200,528]];
    public function poster(){
     $admin=  User::find_by_id($this->uploader);
     return $admin;
    }
    public function link(){
      return "blogpost.html";
    }

}
