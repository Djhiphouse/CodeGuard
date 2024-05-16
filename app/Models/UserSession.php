<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function createSession($app_id, $discord_name) : bool
    {
        $session = new UserSession();
        $session->app_id = $app_id;
        $session->discord_name = $discord_name;
        $session->joined = now();
        return $session->save();
    }

    public static function deleteSession($id) : bool
    {
        $session = UserSession::find($id);
        return $session->delete();
    }


    public static function getAllSessions() : object
    {
        return UserSession::query()->get();
    }

    public static function getAllSessionsPaginated() : object
    {
        return UserSession::query()->paginate(8);
    }

    public static function createScreenshot($id) : bool
    {
        $session = UserSession::find($id);
        $session->screenshot = 1;
        return $session->save();
    }

}
