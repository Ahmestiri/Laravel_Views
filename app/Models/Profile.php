<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //Disable Mass Assignement
    protected $guarded = [];
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/Jgw2o99uSwySidPBHadTkFwrQnmSND6UUnHvc5lV.png';
        return '/storage/' . $imagePath;
    }
    //Connect User to Profile
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
