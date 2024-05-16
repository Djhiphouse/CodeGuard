<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Application extends Model
{
    use HasFactory;


    public $timestamps = false;

    public static function getAllApplications() : object
    {
        return Application::query()->get();
    }

    public static function getAllApplicationsPaginated() : object
    {
        return Application::query()->paginate(8);
    }

    public static function randomAppKey() : string
    {
       $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       $app_key = '';
        for ($i = 0; $i < 10; $i++) {
            $app_key.= $chars[rand(0, strlen($chars) - 1)];
        }

        return $app_key;
    }
    public static function createApplication($name) : bool
    {
        $app = new Application();
        $app->name = $name;
        $app->state = '1';
        $app->app_key = self::randomAppKey();
        return $app->save();
    }

    public static function deleteApplication($id) : bool
    {
        $app = Application::find($id);
        return $app->delete();
    }

    public static function enableApplication($id) : bool
    {
        $app = Application::find($id);
        $app->state = '1';
        return $app->save();
    }
    public static function disableApplication($id) : bool
    {
        $app = Application::find($id);
        $app->state = '0';
        return $app->save();
    }
}
