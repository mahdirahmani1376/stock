<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Stock extends Model
{
    use HasFactory;

    protected $casts = [
        'in_stock' => 'boolean',
    ];

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }

    public function track()
    {
        if ($this->retailer->name == 'amazon')
        {
            $response = Http::get('http://test.amazon.com')->json();

            $this->update([
                'available' => $response['in_stock'],
                'price' => $response['price'],
            ]);
        }
    }
}
