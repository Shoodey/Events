<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

/**
 * App\Permission
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property string $model
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 */
class Permission extends EntrustPermission
{
    protected $fillable = ['name', 'display_name', 'description', 'model'];
}