<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Comments_Reply extends Model
{
    protected $table="comments_reply_tb";
    protected $primaryKey="cr_id";
    public $timestamps = false;

    protected  $with=["user"];


    public function user(){

        return $this->belongsTo('App\models\m_user','cr_user_id');


    }

}
