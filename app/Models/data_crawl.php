<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_crawl extends Model
{
    use HasFactory; // Cái này dùng làm gì quên rồi

    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'title'
    ];

    protected $fillable = [
        'title',
        'url',
        'description',
    ];

    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach ($words as $key => $word) {
            /*
            * applying + operator (required word) only big words
            * because smaller ones are not indexed by mysql
            */
            if (strlen($word) >= 1) {
                $words[$key] = '+' . $word  . '*';
            }
        }

        $searchTerm = implode(' ', $words);

        return $searchTerm;
    }

    public function scopeSearchReview($query, $term)
    {
        $columns = implode(',', $this->searchable); // $columns = $this->searchable;
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));

        return $query;
    }
}
