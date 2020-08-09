<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class m_user extends Authenticatable
{
    //
    protected $table = "user_tb";
    protected $primaryKey = "u_id";
    protected $created_at = "u_creationdate";
    protected $updated_at = "updated_at";
    protected $with=["group","status","language" , "image"];



    public function getAuthPassword(){
        return $this->u_password;
    }
    public function username(){
        return $this->u_firstname . " " . $this->u_lastname;
    }

    public function group()
    {
        return $this->belongsTo('App\models\m_group' , "u_group");
    }
    public function status()
    {
        return $this->belongsTo('App\models\m_codes' , "u_active");
    }
    public function language()
    {
        return $this->belongsTo('App\models\m_codes' , "u_language");
    }

    public function image()
    {
        return $this->belongsTo('App\models\m_file' , "u_photo");
    }



}





