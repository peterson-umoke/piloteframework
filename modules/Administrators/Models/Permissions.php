<?php


namespace PiloteFramework\Administrators\Models;


use App\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as Model;

/**
 * PiloteFramework\Administrators\Models\Permissions
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static Builder|Permissions newModelQuery()
 * @method static Builder|Permissions newQuery()
 * @method static Builder|Model permission($permissions)
 * @method static Builder|Permissions query()
 * @method static Builder|Permissions whereCreatedAt($value)
 * @method static Builder|Permissions whereGuardName($value)
 * @method static Builder|Permissions whereId($value)
 * @method static Builder|Permissions whereName($value)
 * @method static Builder|Permissions whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Permissions extends Model
{

}
