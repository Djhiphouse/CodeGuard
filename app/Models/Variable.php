<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;

    public $timestamps = false;


    public static function getVariablesPaginated() : object
    {
        return Variable::query()->paginate(8);
    }

    public static function getVariable($name, $app_id) : string
    {
        $variable = Variable::query()->where('name', $name)
            ->where('app_id', $app_id)
            ->first();

        if (!$variable) {
            return '';
        }

        return $variable->value;
    }

    public static function createVariable($name, $value, $app_id) : bool
    {
        $variable = Variable::query()->where('name', $name)
            ->where('app_id', $app_id)
            ->first();

        if (!$variable) {
            $variable = new Variable();
            $variable->name = $name;
            $variable->value = $value;
            $variable->state = '1';
            $variable->app_id = $app_id;
            return $variable->save();
        }

        $variable->value = $value;
        return $variable->save();
    }

    public static function deleteVariable($id) : bool
    {
        $variable = Variable::query()->where('id', $id)->first();
        if (!$variable) {
            return false;
        }
        return $variable->delete();
    }

    public static function deactivate($id) : bool
    {
        $variable = Variable::query()->where('id', $id)->first();
        if (!$variable) {
            return false;
        }
        $variable->state = '0';
        return $variable->save();
    }

    public static function activate($id)
    {
        $variable = Variable::query()->where('id', $id)->first();
        if (!$variable) {
            return false;
        }
        $variable->state = '1';
        return $variable->save();
    }


}
