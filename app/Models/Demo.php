<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 测试数据
 * @package App\Models
 */
class Demo extends Model
{
    protected $guarded = ['_token'];

    protected $fillable = ['name', 'parent_id', 'liable_id', 'state', 'sort', 'remark'];

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
    public function liable()
    {
        return $this->belongsTo('App\Models\User', "liable_id");
    }


    /**
     *上级部门
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Demo', "parent_id");
    }

    /**
     *下属部门
     */
    public function children()
    {
        return $this->hasMany('App\Models\Demo', "parent_id");
    }

}
