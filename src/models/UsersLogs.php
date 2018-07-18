<?php
namespace SpringCms\SpringAdmins\Models;
use Illuminate\Database\Eloquent\Model;

class UsersLogs extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'action_model',
        'action_id',
    ];

    public function users()
    {
        return $this->hasOne('SpringCms\SpringAdmins\Models\SpringAdmin', 'id', 'user_id');
    }
}