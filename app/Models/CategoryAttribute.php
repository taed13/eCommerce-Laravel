<?php

namespace App\Models;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    use HasFactory;

    protected $table = 'category_attribute';
    protected $fillable = [
        'category_id',
        'attributes_id',
    ];

    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attributes_id');
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class, 'attributes_id', 'attributes_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
