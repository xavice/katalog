<?php

namespace App;

class Reader
{
    protected $file_path;
    public $books;

    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    public function readCsv()
    {
        $row = 1;
        if (($handle = fopen($this->file_path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $this->saveBook($data);
            }
            fclose($handle);
        }
    }

    protected function saveBook($data)
    {
        $book = new Book();
        $book->id = $data[0] ?? '';
        $book->title = $data[1] ?? '';
        $book->author = $data[2] ?? '';
        if (isset($data[4]) && (int) $data[4] > 0) {
            $book->year = $data[4];
        }
        $book->publisher = $data[3] ?? '';
        $book->picture = $data[5] ?? '';
        $book->rating = $data[6] ?? '';
        $book->description = $data[7] ?? '';
        $book->save();
    }
}
