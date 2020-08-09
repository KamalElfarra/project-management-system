<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_group extends Model
{
    //

    protected $table="group_tb";
    protected $primaryKey="g_id";
    public $timestamps= false;


    public function privileges(){
        return json_decode($this->g_privileges);
    }

    public function privileges_arr(){
        return json_decode($this->g_privileges ,true);
    }





}
