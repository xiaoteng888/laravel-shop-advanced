<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'image', 'on_sale', 'rating', 'sold_count', 'review_count', 'price','type','long_title'];
    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
    ];
    const TYPE_NORMAL = 'normal';
    const TYPE_CROWDFUNDING = 'crowdfunding';
    const TYPE_SECKILL = 'seckill';
    public static $typeMap = [
           self::TYPE_NORMAL => '普通商品',
           self::TYPE_CROWDFUNDING => '众筹商品',
           self::TYPE_SECKILL => '秒杀商品',
    ];
    public function seckill()
    {
      return $this->hasOne(SeckillProduct::class);
    }

    public function crowdfunding()
    {
         return $this->hasOne(CrowdfundingProduct::class);
    }

    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function getGroupedPropertiesAttribute()
    {
         return $this->properties->groupBy('name')->map(function($properties){
               return $properties->pluck('value')->all();
         });
    }

    public function toESArray()
    {
        // 只取出需要的字段
        $arr = array_only($this->toArray(),[
               'id',
               'type',
               'title',
               'long_title',
               'category_id',
               'on_sale',
               'rating',
               'sold_count',
               'review_count',
               'price',
        ]);
      // 如果商品有类目，则 category 字段为类目名数组，否则为空字符串
        $arr['category'] = $this->category ? explode('-',$this->category->full_name) : '';
      // 类目的 path 字段
      $arr['category_path'] = $this->category ? $this->category->path : '';
      // strip_tags 函数可以将 html 标签去除
      $arr['description'] = strip_tags($this->description);
      // 只取出需要的 SKU 字段
      $arr['skus'] = $this->skus->map(function(ProductSku $sku){
           return array_only($sku->toArray(),[
                    'title',
                    'description',
                    'price',
           ]);    
      });
      // 只取出需要的商品属性字段
      $arr['properties'] = $this->properties->map(function(ProductProperty $property){
        // 对应地增加一个 search_value 字段，用符号 : 将属性名和属性值拼接起来
           return array_merge(array_only($property->toArray(),[
                   'name',
                   'value',
           ]),['search_value' => $property->name.':'.$property->value,]);   
      });
      return $arr;
    }
    public function scopeByIds($query, $ids)
    {
        return $query->whereIn('id', $ids)->orderByRaw(sprintf("FIND_IN_SET(id, '%s')", join(',', $ids)));
    }
}
