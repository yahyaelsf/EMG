<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class TUser extends BaseModel implements AuthenticatableContract
{
    use SoftDeletes;
    use Filterable;
    use Authenticatable;

    protected $table = "t_users";
    protected $primaryKey = 'pk_i_id';

    protected $hidden = ['s_password', 'remember_token'];
    protected $appends = ['enabled_html'];

    protected $fillable = [
        's_name',
        's_username',
        's_avatar',
        's_email',
        's_mobile',
        's_address',
        's_password'
    ];

    const CREATED_AT = 'dt_created_date';
    const UPDATED_AT = 'dt_modified_date';
    const DELETED_AT = 'dt_deleted_date';


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function scopeEnabled($query)
    {
        return $query->where('b_enabled', 1);
    }


    public function getAuthPassword()
    {
        return $this->s_password;
    }

//
    public function setPasswordAttribute($value)
    {
        $this->attributes['s_password'] = $value;
    }


    public function setSEmailAttribute($email) {
        $this->attributes['s_email'] = strtolower($email);
    }

    public function setSPasswordAttribute($value)
    {
        $this->attributes['s_password'] = bcrypt($value);
    }


}
