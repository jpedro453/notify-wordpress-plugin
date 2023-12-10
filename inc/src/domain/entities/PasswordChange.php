<?php


class GG_PasswordChange{
    public string $ip;
    public string $date;
    public string $username;
    public string $user_id;
    public string $email;
    public string $login_url;

    public function __construct(string $ip, string $date, string $username, string $user_id, string $email, string $login_url) {
        $this->ip = $ip;
        $this->date = $date;
        $this->username = $username;
        $this->user_id = $user_id;
        $this->email = $email;
        $this->login_url = $login_url;
    }

    function get_ip() {
        return $this->ip;
    }
    function get_date() {
        return $this->date;
    }
    function get_username() {
        return $this->username;
    }
    function get_email() {
        return $this->email;
    }
    function get_login_url() {
        return $this->login_url;
    }
}