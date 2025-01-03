<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars'; // Tên của bảng trong cơ sở dữ liệu
    protected $fillable = ['name', 'brand', 'manufacture', 'price', 'image', 'amount', 'description'];

    protected $primaryKey = 'id'; // Khóa chính của bảng

    public $incrementing = true;
/**
     * Relationship many to many
     * @return BelongsToMany
     */
    public function images()
    {
        return $this->hasMany(CarImage::class, 'car_id');
    }
     public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }


}



