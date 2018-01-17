<?php

/*
 * 标签解析库
 */

namespace Common\TagLib;

use Think\Template\TagLib;

class cms extends TagLib {

//数据库表达式
    protected $comparison = array(
        '{eq}' => '=',
        '{neq}' => '<>',
        '{elt}' => '<=',
        '{egt}' => '>=',
        '{gt}' => '>',
        '{lt}' => '<',
    );
    //标签定义
    protected $tags = array(
        //文章标签
        'article' => array('attr' => "limit,order,catid,type,keyword", 'close' => 1),
        //文章详情标签
        'articleinfo' => array('attr' => "name,fun,field", 'close' => 0),
        //频道标签
        'channel' => array('attr' => "type,row,typeid", 'close' => 1)
    );

    /**
     * 文档标签
     * 例: <article catid="2" limit="10" order="id desc" type="h" ></article>
     * 参数使用说明:
     *    @catid  栏目id,可参入数字，也可以传递变量 $catid
     *    @limit 显示数量
     *    @type 文章属性
     *    @order 排序
     *    @return array|string
     */
    public function _article($attr, $content) {
        $arr =$attr;
        $catid = isset($arr['catid'])?$arr['catid']:I('get.cid');
        $keyword =isset($arr['keyword'])?$arr['keyword']:I('get.keyword');
        $order = $arr['order'];
        $limit = $arr['limit'];
        $type = $arr['type'];
        $field = array("id", "title", "channel_id", "inputtime", "username"); //定义需要调用的字段
        $where = array();
        if (!empty($catid)) {
            $where['channel_id'] = $catid;
        }
        if(!empty($keyword)){
            $where['title'] = array('like','%'.$keyword.'%');
        }
        $list = M("articles")->field($field)->where($where)->limit($limit)->order($order)->select();

        $str = field_list($content, $list); //模板数据处理
        return $str;
    }

    /**
     * 文档详情
     * 例: <articleifo name='content' />
     * 参数使用说明:
     *    @catid  栏目id,可参入数字，也可以传递变量 $catid
     *    @limit 显示数量
     *    @type 文章属性
     *    @order 排序
     *    @return array|string
     */
    public function _articleinfo($attr, $content) {
        $id = isset($attr['id'])?$attr['id']:I('get.id');
        $key = $attr['name'];
        $fun = $attr['fun'];
        $field = empty($attr['field']) ? array('title', 'content', 'username', 'inputtime') : $attr['field'];
        $where['a.id'] = $id;

        $db_prefix = C('DB_PREFIX');
        $infos = M('articles')->alias('a')->field($field)->join("left join {$db_prefix}article_data as data on data.articles_id =a.id ")->where($where)->find();
        $str = field_info($infos[$key], $fun); //模板数据处理
        return $str;
    }

    /**
     * 频道标签
     * 例: <channel typeid="2" row="10" type='top'></channel>
     * 参数使用说明:
     *    @typeid  栏目id,可参入数字，也可以传递变量 $catid
     *    @row 显示数量
     *    @type 栏目类型
     *    @return array|string
     */
    public function _channel($attr, $content) {

    }

}
