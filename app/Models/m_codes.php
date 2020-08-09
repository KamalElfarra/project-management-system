<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_codes extends Model
{
    //
    protected $table="codes_tb";
    protected $primaryKey="cd_id";
    protected $created_at="cd_creation_date";
    protected $updated_at="update_at";
    protected $with=["master_data"];

    public static function getCodes($master_id){
        return self::where("cd_master_id" , $master_id)->get();
    }

    public function scopeActive($query)
    {
        return $query->where('cd_active', '=', 1);
    }

    public function master_data()
    {
        return $this->belongsTo('App\models\m_codes' , "cd_master_id");
    }
}
