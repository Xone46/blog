<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    protected $fillable = [
        'content','sujet','created_at','important','unimportant','id_user','remember_token',
    ];
    protected $hidden = ['updated_at'];
    public $timestamps = false;



    public function user()
    {
       return $this->belongsTo('App\User', 'id_user');
    }
}
