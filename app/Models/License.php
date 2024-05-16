<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getAllLicenses() : object
    {
        return License::query()->paginate(8);
    }

    public static function randomLicense() : string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $license = '';
        for ($i = 0; $i < 10; $i++) {
            $license.= $chars[rand(0, strlen($chars) - 1)];
        }
        return $license;
    }
    public static function createLicense($app, $days) : bool
    {
        $license = new License();
        $license->app_id = $app;
        $license->license_key = self::randomLicense();
        $license->hwid = null;
        $license->discord_name = null;
        $license->state = '1';
        $license->duration = $days;
        $license->expires_at = null;
        $license->used_at = null;

        return $license->save();
    }

    public static function activate($id) : bool
    {
        $license = License::find($id);
        $license->state = '1';
        return $license->save();
    }

    public static function deactivate($id) : bool
    {
        $license = License::find($id);
        $license->state = '0';
        return $license->save();
    }
}
