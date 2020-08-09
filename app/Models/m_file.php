<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_file extends Model
{
    protected $table="file_tb";
    protected $primaryKey="f_id";
    protected $created_at="f_creation_date";
    protected $updated_at="updated_at";

    function full_path(){
        return $this->f_path .'/'.$this->f_name;
    }


}
