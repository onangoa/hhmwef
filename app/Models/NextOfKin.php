<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;
    protected $fillable = ['kin_full_name', 'kin_address', 'kin_id_number', 'kin_phone', 'kin_email', 'kin_relationship'];
    public function relatedPersons() {
        return $this->hasMany(RelatedPerson::class);
    }
}
