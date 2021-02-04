<?php

namespace model;

class Recept
{
    private $id;
    private $naam;
    private $datum;
    private $duur;
    private $dosis;
    
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

}