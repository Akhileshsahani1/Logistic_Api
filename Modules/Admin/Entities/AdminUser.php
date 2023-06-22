<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $fillable = ['firstName','lastName','userName','email','remember_token'];

    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\AdminUserFactory::new();
    }
}
