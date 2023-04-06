<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'location',
        'gender',
        'role',
        'employee_id',
        'image',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $dates = ['date_joined'];

    public static function generateEmployeeId(int $length = 5) :string
    {
        $employee_id = Str::random($length);

        //check if the id generated above exist in the database
        $exists = DB::table('users')->where('employee_id', '=', $employee_id)
        ->get(['employee_id']);

        //if exist create a new one
        if(isset($exists[0]->id)){
            return self::generateEmployeeId();
        }

        return $employee_id;

    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
