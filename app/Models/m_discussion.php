<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_discussion extends Model
{
    protected $table="discussion_tb";
    protected $primaryKey="diss_id";
    protected $updated_at="updated_at";
    protected $created_at="diss_creation_date";
    protected $with=["status","created_by", "project"];


    public function status(){
        return $this->belongsTo("App\models\m_codes","diss_status");
    }

    public function created_by(){
        return $this->belongsTo('App\Models\m_user', 'diss_created_by');
    }

    public function project(){
        return $this->belongsTo('App\Models\m_project', 'diss_project_id');
    }


}
