<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory;
    protected $fillable = ['isbn','title','author','publisher','published_year','copies'];

    public function borrows() {
        return $this->hasMany(borrow::class);
    }

    // convenient relation for active (not returned) loans:
    public function activeborrows() {
        return $this->hasMany(borrow::class)->whereNull('returned_at');
    }
}
