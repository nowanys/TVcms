<?php
/**
 * Created by bianquan
 * User: ZhuYunlong
 * Email: 920200256@qq.com
 * Date: 2019/1/20
 * Time: 20:55
 */

namespace app\adminApi\model;


use app\common\model\BaseModel;

class Api extends BaseModel
{
//    protected $hidden = ['create_time','delete_time','update_time'];
    public static function getList($type,$order,$sort) {
        return self::where(['api_type'=>$type])
            ->order("$sort $order")
            ->select();
    }


    public static function injection($path,$desc) {
        return self::insert([
            'api_path' => $path,
            'api_name' => $desc,
            ]);
    }

    public static function getApi() {
        return self::cache('api')->field('api_path')->select();
    }

    public static function getByType($type) {
        $condition = [];
        if(!empty($type) || $type === 0) {
            $condition = ['api_type'=>$type];
        }
        return self::cache('api'.$type)->where($condition)->field('api_path')->select();
    }

}