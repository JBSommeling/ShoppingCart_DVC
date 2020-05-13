<?php


namespace Tests\Cart;


class testProduct
{
    private $id;
    private $imagePath;
    private $title;
    private $description;
    private $price;

    public function __construct()
    {
        $this->id = 1;
        $this->imagePath = "https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/1/0/1/1001004010971015.jpg";
        $this->title = "Harry Potter";
        $this->description = 'Was erg leuk om te lezen, vroeger';
        $this->price = 10;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}
