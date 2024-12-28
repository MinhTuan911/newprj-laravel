<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars'; // Tên của bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id'; // Khóa chính của bảng

    public $incrementing = true;
/**
     * Relationship many to many
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function manufacture(): BelongsTo
    {
        return $this->belongsTo(Manufacture::class);
    }


}



