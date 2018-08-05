<?php
namespace SpringCms\SpringAdmins\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SystemRole extends Model
{
    protected $fillable = ['title'];
    public $relation_ids = [];

    public function systemMenus()
    {
        return $this->belongsToMany(SystemMenu::class);
    }

    public function canAccessMenu($menu)
    {
        if ($menu instanceof SystemMenu) {
            $menu = $menu->id;
        }
        if (! isset($this->relation_ids['menus'])) {
            $this->relation_ids['menus'] = $this->menus()->pluck('id')->flip()->all();
        }
        return isset($this->relation_ids['menus'][$menu]);
    }
}
