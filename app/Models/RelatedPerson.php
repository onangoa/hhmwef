<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RelatedPerson extends Model
{
    use HasFactory;
    protected $fillable = ['next_of_kin_id', 'full_name', 'relationship', 'contact', 'type'];
    public function nextOfKin() {
        return $this->belongsTo(NextOfKin::class);
    }
}
