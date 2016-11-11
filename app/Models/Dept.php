<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 部门
 * @package App\Models
 */
class Dept extends Model
{
    protected $guarded = ['_token'];

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function Rules()
    {
        return [
            'name' => 'required|max:255|min:2',
        ];
    }


    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '系统名称为必填项',
        ];
    }


    /**
     *部门用户
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', "dept_id");
    }


    /**
     *上级部门
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Dept', "parent_id");
    }

    /**
     *下属部门
     */
    public function children()
    {
        return $this->hasMany('App\Models\Dept', "parent_id");
    }

}
