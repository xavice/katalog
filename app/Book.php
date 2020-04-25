<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    protected function getQueryForRecommended()
    {
        $results = self::where('id' , '!=', $this->id)
            ->where('author', $this->author);

        if($results->count() > 3) {
            return $results;
        }

        $results = $results->orWhere(function($q) {
            $q->where('id' , '!=', $this->id);
            $q->where('author', $this->author);
            $q->orWhere('publisher', $this->publisher);
        });

        if($results->count() > 3) {
            return $results;
        }

        $results = $results->orWhere('rating', '>=', 4);

        return $results;
    }

    public function recommended()
    {
        return  $this->getQueryForRecommended()->orderBy('rating', 'desc')->limit(8)->get();
    }
}
