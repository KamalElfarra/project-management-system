<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_project extends Model
{
    protected $table="project_tb";
    protected $primaryKey="p_id";
    protected $created_at="p_creation_data";
    protected $updated_at="updated_at";
    protected $with=["priority","status","created_by"];


    public function priority(){


        return $this->belongsTo("App\models\m_codes", "p_priority");

    }

    public function status(){

        return $this->belongsTo("App\models\m_codes","p_status");

    }

    public function created_by(){
        return $this->belongsTo('App\models\m_user','p_created_by');
    }


    public function discussions(){
        return $this->hasMany('App\models\m_discussion','diss_project_id' , 'p_id');
    }


    public function tasks(){
        return $this->hasMany('App\models\m_tasks','ta_project_id' , 'p_id');
    }


    public function tickets(){
        return $this->hasMany('App\models\m_tickets','tic_project_id' , 'p_id');
    }


    public function team_member(){
        return $this->hasMany('App\models\m_project_team','t_p_id' , 'p_id');
    }


}
