<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Bool_;

class Product extends Model
{
    use HasFactory;

    public function track()
    {
        $this->stock->each->track();
    }

    public function inStock(): bool
    {
        return $this->stock()->where('in_stock',true)->exists();
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
