<?php

// +----------------------------------------------------------------------
// | cms config模型
// +----------------------------------------------------------------------


namespace Admin\Model;

use Common\Model\Model;
use \Admin\Controller\CommonController;

class ConfigModel extends Model{

    //获取设置列表
    public function getSetList(){
        $data = $this->select();
        return $data;
    }

    //获取列表已键值对
    public function getListByKey(){
        $field = "valuename,id,value,info,groupid";
        return $this->getField($field);
    }
}
