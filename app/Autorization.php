<?php

namespace PurchaseControl;

use Illuminate\Database\Eloquent\Model;

class Autorization extends Model
{
    protected $fillable = [
        'client',
        'provider',
        'branch',
        'description', 
        'price',   
        'status',
        'authorized_by',
        'authorized_in',
        //dados adicionais
        'budget_number',
        'payment',
        'subject',
        'note'
    ];

    

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client' , 'id');
    }

    public function provider()
    {
        return $this->belongsTo(Providers::class, 'provider', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branches::class, 'branch', 'id');
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function setPrice2Attribute($value)
    {
        $this->attributes['price_2'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    private function convertStringToDouble(string $param)
    {
        if(empty($param)){
            return null;
        }
        return str_replace(',','.',str_replace('.','',$param));
    }
}
