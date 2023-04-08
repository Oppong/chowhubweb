<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'order_id',
        'payment_mode',
        // 'payment_id',
        'status',
    ];


    public static function generateOrderId(int $length = 5) :string
    {
        $order_id= Str::random($length);

        //check if the id generated above exist in the database
        $exists = DB::table('orders')->where('order_id', '=', $order_id)
        ->get(['order_id']);

        //if exist create a new one
        if(isset($exists[0]->id)){
            return self::generateOrderId();
        }

        return $order_id;

    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
