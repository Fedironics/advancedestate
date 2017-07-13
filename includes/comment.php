<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of comment
*
* @author EMMA
*/
class Comment extends DatabaseTable {
    public static $tableName='comments';
    public static function  make($item_type,$item_id,$author='',$body,$email='') {
        global $session,$user;
        if(!empty($item_id) && !empty($author) && !empty($body) || $session->logged() && !empty($item_id) && !empty($body)){
            $comment= new Comment();
            $comment->item_id=(int)$item_id;
            $comment->name =$session->logged()?$user->name():$author;
            $comment->comment=$body;
            $comment->email=$session->logged()?$user->email:$email;;
            $comment->deleted=0;
            $comment->parent_id=0;
            $comment->rel_class=$item_type;
            $comment->person_id=$session->logged()?$session->get_user_id():0;
            $comment->save();
            return $comment;
        }   else {
            return false;
        }
    }
    public static function  find_on($item_type,$item_id=0){
        global $database;
        $sql= "SELECT * FROM ".static::$tableName ;
        $sql .= " WHERE item_id=". $database->escape_value($item_id);
        $sql .= " AND rel_class='". $database->escape_value($item_type)."'";
        return static::find_by_sql($sql);
    }
    public static  function count_comments($item_type,$item_id){
        global $database;
        $sql= "SELECT COUNT(*) FROM ".static::$tableName . " WHERE item_id=".$item_id;
        $sql.= " AND rel_class='".$database->escape_value($item_type)."'";
        $count=    $database->query($sql);
        $comment_count_array=$count->fetch_array();
        return array_shift($comment_count_array);
    }
    public function author(){
        return $this->id;
    }
    public function pix($size='author'){
        $avatar="img/blog-author-2.jpg";
        if($this->person_id!=0){
            $pix=User::find_by_id($this->person_id)->get_picture($size);
        }
        return empty($pix)?$avatar:$pix;
    }
    public function age(){
        return humanTiming($this->added);
    }
    //put your code here
}
