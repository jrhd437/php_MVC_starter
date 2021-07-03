<?php


class user{

    public $id;
    public $username = 'username';
    public $firstname;
    public $lastname;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phone;
    public $email;
    public $password;
    public $key;
    public $login_expiration;
    public $failed_logins;
    public $active;

    public function __construct()
    {

    }

    public function set_attribute(string $attribute, string $value): void
    {
        if(isset($this->$$attribute)){
            $this->$$attribute = $value;
        }
    }

    public function does_username_exist(string $username): bool
    {
        return false;
    }

    public function get_by_id(int $id): bool
    {
        return false;
    }

    public function get_by_username(string $username): bool
    {
        return false;
    }

    public function update(): bool
    {
        return false;
    }

    public function insert(): bool
    {
        return false;
    }

}
