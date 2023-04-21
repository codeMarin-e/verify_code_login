<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MacroableModel;
use \Illuminate\Support\Arr;

class VerifyCode extends Model{
    protected $guarded = [];

    use MacroableModel;

    public static function random($length, $lower = true, $numbers = true, $symbols = true, $upper = true) {
        $random = '';
        if($lower) $random .= 'abcdefghijklmnopqrstuvwxyz';
        if($upper) $random .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($numbers) $random .= '0123456789';
        if($symbols) $random .= '!@#$%^&*()';
        return Arr::join( Arr::random( Arr::shuffle(str_split($random)), $length), '');
    }

    // @HOOK_TRAITS

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
