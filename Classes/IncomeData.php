<?php

namespace Classes;

class IncomeData {

    private $InID;
    private $FID;
    private $Category;
    private $Subject;
    private $Amount;
    private $Description;
    private $Date;
    private $Time;

    public function getInID() {
        return $this->InID;
    }

    public function getFID() {
        return $this->FID;
    }

    public function getCategory() {
        return $this->Category;
    }

    public function getAmount() {
        return $this->Amount;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getDate() {
        return $this->Date;
    }

    public function getTime() {
        return $this->Time;
    }

    function getSubject() {
        return $this->Subject;
    }

    function setSubject($Subject) {
        $this->Subject = $Subject;
    }

    public function setInID($InID) {
        $this->InID = $InID;
    }

    public function setFID($FID) {
        $this->FID = $FID;
    }

    public function setCategory($Category) {
        $this->Category = $Category;
    }

    public function setAmount($Amount) {
        $this->Amount = $Amount;
    }

    public function setDescription($Description) {
        $this->Description = $Description;
    }

    public function setDate($Date) {
        $this->Date = $Date;
    }

    public function setTime($Time) {
        $this->Time = $Time;
    }

}
