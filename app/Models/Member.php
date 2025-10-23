<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    use HasFactory;
    protected $fillable = ['member_number','lname','fname','mi','email','contactNumber'];

    public function borrows() {
        return $this->hasMany(borrow::class);
    }
}
