<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_tasks extends Model {

    protected $table = "tasks_tb";
    protected $primaryKey = "ta_id";
    protected $created_at = "ta_creation_date";
    protected $updated_at = "updated_at";
    protected $with = ["type", "status", "priority", "created_by" , "assign_to" , "project"];

    public function type() {
        return $this->belongsTo('App\models\m_codes', 'ta_type');
    }

    public function status() {
        return $this->belongsTo('App\models\m_codes', 'ta_status');
    }

    public function priority() {
        return $this->belongsTo('App\models\m_codes', 'ta_priority');
    }

    public function created_by() {
        return $this->belongsTo('App\Models\m_user', 'ta_created_by');
    }

    public function assign_to() {
        return $this->belongsTo('App\Models\m_user', 'ta_assigned_to');
    }

    public function project() {
        return $this->belongsTo('App\Models\m_project', 'ta_project_id');
    }

}
