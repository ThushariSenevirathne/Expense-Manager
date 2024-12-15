<?php

namespace Classes;

class User {

    private $password;
    private $username;
    private $email;
    private $type;
    private $phoneNumOffice;
    private $phoneNumPersonal;
    private $fullName;

    
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPhoneNumOffice() {
        return $this->phoneNumOffice;
    }

    public function setPhoneNumOffice($phoneNumOffice) {
        $this->phoneNumOffice = $phoneNumOffice;
    }

    public function getPhoneNumPersonal() {
        return $this->phoneNumPersonal;
    }

    public function setPhoneNumPersonal($phoneNumPersonal) {
        $this->phoneNumPersonal = $phoneNumPersonal;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }
}
