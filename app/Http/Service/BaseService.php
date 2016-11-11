<?php

namespace App\Http\Service;

use App\Models\Config;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Auth;

/**
 * 基础服务
 * @package App\Http\Service
 */
class BaseService
{
    private $config = null;
    private $enterprise = null;
    private $user = null;

    public function __construct()
    {

    }

    /**
     *获取用户信息
     * @param $key
     * @return mixed
     */
    public function user($key = null)
    {
        $this->user = Auth::user();
        if ($key) {
            return $this->user->$key;
        } else {
            return $this->user;
        }

    }

    /**
     * 获取企业参数配置
     * @param $key
     * @return mixed
     */
    public function config($key = null)
    {

        if (!$this->config) {
            $this->config = Config::first();
        }
        if ($key) {
            return $this->config->$key;
        } else {
            return $this->config;
        }
    }


    /**
     * 获取企业参数配置
     * @param $key
     * @return mixed
     */
    public function enterprise($key = null)
    {
        if (!$this->enterprise) {
            $this->enterprise = Enterprise::first();
        }
        if ($key) {
            return $this->enterprise->$key;
        } else {
            return $this->enterprise;
        }
    }

}