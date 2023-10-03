<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    protected $table = 'books';
    protected $primaryKey = 'isbn';
    protected $fillable = ['isbn', 'author', 'title', 'price', 'categoryid']; // Ubah 'category' menjadi 'categoryid'
    public $incrementing = false;
    use HasFactory;

    // Definisikan relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }
}
