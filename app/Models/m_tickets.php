<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_tickets extends Model
{
    protected $table="tickets_tb";
    protected $primaryKey="tic_id";
    protected $created_at="tic_creation_date";
    protected $updated_at="updated_at";
    protected $with=["status","type" ,"created_by","project"];


    public function status(){

        return $this->belongsTo('App\models\m_codes','tic_status');

    }

    public function type(){

        return $this->belongsTo('App\models\m_codes','tic_type');

    }
    
    public function created_by(){

        return $this->belongsTo('App\models\m_user','tic_created_by');

    }

    public function project() {
        return $this->belongsTo('App\Models\m_project', 'tic_project_id');
    }


}
