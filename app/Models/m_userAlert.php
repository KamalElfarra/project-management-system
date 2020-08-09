<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class m_userAlert extends Model
{
    protected $table="user_alert_tb";
    protected $primaryKey="too_id";
    protected $created_at="too_creation_date";
    protected $updated_at="updated_at";
    protected $with=["type","location","Groups","Assign","created_by"];

    public  static function getMyAlerts(){
        $user_id = Auth::id();
        $user_group = Auth::user()->u_group;
        return m_userAlert::where("too_Assigned_to" , $user_id)->orWhere("too_group_id" , $user_group)->get();
    }

    public function type(){
        return $this->belongsTo("App\Models\m_codes","too_type");
    }

    public function location(){
        return $this->belongsTo("App\Models\m_codes","too_location");
    }

    public function Groups(){
        return $this->belongsTo("App\Models\m_group","too_group_id");
    }

    public function Assign(){
        return $this->belongsTo("App\Models\m_user","too_Assigned_to");
    }

    public function created_by(){
        return $this->belongsTo("App\models\m_user","too_created_by");
    }


}
