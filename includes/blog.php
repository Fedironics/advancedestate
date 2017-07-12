<?php
class Blog extends Item {
    static $tableName='blog';
    public static $thumb_sizes= ['featured_post'=>[122,122],'full_cover'=>[1200,528]];
    public function poster(){
     $admin=  User::find_by_id($this->uploader);
     return $admin;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

