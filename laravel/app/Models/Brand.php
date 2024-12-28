<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands'; // Tên của bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id'; // Khóa chính của bảng

    public $incrementing = true;
}
