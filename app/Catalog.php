<?php

namespace App;

class Catalog
{
    public $books;

    function __construct()
    {
        $this->books = Book::all();
    }
}
