<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_Attachments extends Model
{
    //
    protected $table="attachments_tb";
    protected $primaryKey="attach_id";
    protected $created_at="attach_creation_date";
    protected $updated_at="updated_at";



}
