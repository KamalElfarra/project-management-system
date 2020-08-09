<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_comments extends Model
{
    protected $table="comments_tb";
    protected $primaryKey="c_id";
    protected $created_at="c_creation_date";
    protected $updated_at="updated_at";
    protected $with=["priority","status","created_by" , "replies"];

    public function priority(){
        return $this->belongsTo("App\models\m_codes", "c_priority");

    }

    public function status(){
        return $this->belongsTo("App\models\m_codes","c_status");

    }


    public function created_by(){
        return $this->belongsTo('App\models\m_user','c_created_by');


    }

    public function replies(){
        return $this->hasMany('App\models\M_Comments_Reply' , "cr_comment_id" ,'c_id');


    }

}
