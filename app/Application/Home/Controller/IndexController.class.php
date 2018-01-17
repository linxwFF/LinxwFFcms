<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\CommonController;
class IndexController extends CommonController {

    public function index()
    {
        $this->display();
    }

    //联系我们
    public function contact()
    {
        $id = 10;
        $article_db = D('Articles');
        $info = $article_db->getInfo($id);
        $this->assign('info',$info);
        $this->display();
    }

    //关于我们
    public function about()
    {
        $id = 11;
        $article_db = D('Articles');
        $info = $article_db->getInfo($id);
        $this->assign('info',$info);
        $this->display();
    }

    //产品中心
    public function product()
    {
        $cid = I('get.cid',2);
        $page = I('get.page',1);
        $rows = C('LISTROWS');
        $article_db = D('Articles');
        $where=null;
        if($cid){
          $where = "channel_id = $cid";
        }
        $list = $article_db->getArticleList($page,$where);
        $count = $article_db->getCount($where);
        $page =(new CommonController())->getPage($count, $rows);
        $this->assign('list',$list);
        $this->assign('page',$page);
        $this->display();
    }

    //产品详情
    public function productshow(){
       $id = I('get.id',0);
       $article_db = D('Articles');
       $info = $article_db->getInfo($id);
       $this->assign('info',$info);
       $this->display();
    }

}
