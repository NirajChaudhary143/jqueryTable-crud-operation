<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $table= 'file_uploads';
    protected $primaryKey ='id';
    protected $fillable =[
        'name',
        'email',
        'phone_number',
        'image'
    ];
}
