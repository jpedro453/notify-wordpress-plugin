<?php
if(!class_exists('GG_User')){
    class GG_User{

        public $id;
        public String $username;
        public String $email;


        public function __construct($id, String $username, String $email) {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
        }
    }
}