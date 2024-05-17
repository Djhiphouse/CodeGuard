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

    public static function checkLicenseApi($license, $hwid, $discord, $app_id) : bool
    {

        $license = License::query()->where('license_key', $license)
            ->where('app_id', $app_id)
            ->first();

        if (!$license) {
            return false;
        }
        if ($license->state != '0' && $license->used_at == null) {
            return self::registerLicense($license->license_key, $hwid, $discord, $app_id);
        }

        if ($license->hwid != null && $license->hwid != $hwid) {
            return false;
        }

        if ($license->discord_name != null && $license->discord_name != $discord) {
            return false;
        }

        if ($license->state == '0') {
            return false;
        }

        if ($license->expires_at != null && $license->expires_at < now()) {
            return false;
        }

        return true;
    }

    public  static function registerLicense($license, $hwid, $discord, $app_id) : bool
    {

        $license = License::query()->where('license_key', $license)
            ->where('hwid', null)
            ->where('app_id', $app_id)
            ->first();

        $license->hwid = $hwid;
        $license->discord_name = $discord;
        $license->used_at = now();
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
