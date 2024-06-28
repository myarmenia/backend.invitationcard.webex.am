<?php
namespace App\Traits;

use App\Models\Form;
use Illuminate\Support\Str;

trait TokenTrait
{

    public function generateToken()
    {

        do {
            $token = Str::random(16);
        } while (Form::where('token', $token)->exists());

        return $token;

    }
}
