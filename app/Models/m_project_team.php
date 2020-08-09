<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_project_team extends Model
{
    protected $table="project_team_tb";
    protected $primaryKey="t_id";
    public    $timestamps = false;
    protected $with = ["user"];
    //
    public function user(){

      return $this->belongsTo('App\models\m_user', 't_u_id');

    }
}
