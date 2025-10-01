<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['election_id', 'name', 'party', 'votes'];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function voteCount()
    {
        return $this->votes()->count();
    }
}
