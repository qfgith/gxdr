<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Db;

/**
 * 轮播图分类
 * Class SlideCategory
 * @package app\admin\controller
 */
class LinkCategory extends AdminBase
{
    protected function _initialize()
    {
        parent::_initialize();

    }

    /**
     * 轮播图分类
     * @return mixed
     */
    public function index()
    {
        $link_category_list = Db::name('link_category')->select();

        return $this->fetch('index', ['link_category_list' => $link_category_list]);
    }



    /**
     * 保存分类
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();

            if (Db::name('link_category')->insert($data)) {
                $this->success('保存成功');
            } else {
                $this->error('保存失败');
            }
        }
        return $this->fetch();
    }


    /**
     * 更新分类
     * @throws \think\Exception
     */
    public function edit($id)
    {   
        $link_category = Db::name('link_category')->find($id);
        if ($this->request->isPost()) {
            $data = $this->request->post();
            
            if (Db::name('link_category')->update($data) !== false) {
                $this->success('更新成功');
            } else {
                $this->error('更新失败');
            }
        }
         return $this->fetch('edit', ['link_category' => $link_category]);
    }

    /**
     * 删除分类
     * @param $id
     * @throws \think\Exception
     */
    public function delete($id)
    {
        if (Db::name('slide_category')->delete($id) !== false) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}