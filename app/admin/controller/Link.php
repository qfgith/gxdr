<?php
namespace app\admin\controller;

use app\common\model\SlideCategory as SlideCategoryModel;
use app\common\model\Slide as SlideModel;
use app\common\controller\AdminBase;
use think\Db;

/**
 * 轮播图管理
 * Class Slide
 * @package app\admin\controller
 */
class Link extends AdminBase
{

    protected function _initialize()
    {
        parent::_initialize();
    }

    /**
     * 轮播图管理
     * @return mixed
     */
    public function index()
    {
        
        $link_category_list  = db('link_category')->column('name', 'id');

        $cate_id = $this->request->param()['cate_id'];
        $list = db('link')->where('status=1 and cid='.$cate_id)->select();
        return $this->fetch('index', ['list' => $list, 'link_category_list' => $link_category_list,'cate_id'=>$cate_id]);
    }



    // 添加商城轮换图
    public function add(){
        $cid = $this->request->param()['cid'];
        $info1 = ['id'=>0,'status'=>1,'name'=>'','img'=>'','link'=>''];
        $link_category_list = db('link_category')->select();
        if (request()->isPost()) {
            $info = request()->post();
            $res = db("link")->insert($info);
            clear_cache();
            $this->success('添加成功');
        }
        return $this->fetch('add', ['info' => $info1,'link_category_list'=>$link_category_list,'cid'=>$cid]);
    }


    // 编辑商城轮换图
    public function edit($id){
        $info1 = db("link")->where("id=".$id)->find();
        $link_category_list = db('link_category')->select();
        if (request()->isPost()) {
            $info = request()->post();
            $res = db("link")->where("id=".$info['id'])->update($info);
            clear_cache();
            $this->success('更新成功');
        }
        return $this->fetch('edit', ['info' => $info1,'link_category_list'=>$link_category_list]);
    }
    // 删除商城轮换图
    public function delete($id){
        $map['id'] = $id;
        if ( Db::name('link')->delete($id) !== false ) {
            clear_cache();
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }


}