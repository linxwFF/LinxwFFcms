<?php
// +----------------------------------------------------------------------
// | cms 上传类
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\Uploads;

class UploadsController extends AdminBase{

    /**
     * 上传文件
     */
    public function upload(){
        $uploads = new Uploads();
        $msg = $uploads ->_upload();
        echo json_encode($msg);die;
    }
    /**
     * 上传文件
     */
    public function upfile(){
       $error_name = date('Y-m-d').'.log';
        error_log(json_encode(123333) . PHP_EOL, '3', $error_name);
    }




}
