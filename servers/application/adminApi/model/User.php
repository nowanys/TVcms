<?php
/**
 * Created by bianquan
 * User: ZhuYunlong
 * Email: 920200256@qq.com
 * Date: 2019/1/12
 * Time: 20:07
 */

namespace app\adminApi\model;


class User extends BaseModel
{
    public function getUserList()
    {
        return self::hasMany('User');
    }
    public static function getListByPage($condition,$order,$page, $limit){
        $pagingData = self::where($condition)->order($order)->paginate($limit, false, ['page' => $page]);
        return $pagingData ;
    }
    public static function getByName($name){
        $user = self::where('user_name', '=', $name)->find();
        return $user;
    }

}