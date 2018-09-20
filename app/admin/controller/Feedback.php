<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use think\Db;

/**
 * 留言 
 * Class SlideCategory
 * @package app\admin\controller
 */
class Feedback extends AdminBase
{
    protected function _initialize()
    {
        parent::_initialize();

    }

    /**
     * 留言 
     * @return mixed
     */
    public function index()
    {
        $feedback_list = Db::name('feedback')->where('typeid=1')->order('id desc')->select();

        return $this->fetch('index', ['feedback_list' => $feedback_list,'title'=>'留言']);
    }



    /**
     * 编辑 
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $info = Db::name('feedback')->find($id);
        Db::name('feedback')->where('id='.$id)->update(['status'=>1]);
        return $this->fetch('edit', ['info' => $info]);
    }

    /**
     * 更新 
     * @throws \think\Exception
     */
    public function update()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            
            if (Db::name('feedback')->update($data) !== false) {
                $this->success('更新成功');
            } else {
                $this->error('更新失败');
            }
        }
    }

    /**
     * 删除 
     * @param $id
     * @throws \think\Exception
     */
    public function delete($id)
    {
        if (Db::name('feedback')->delete($id) !== false) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }



    /*****************************************咨询低价************************************/
    /**
     * 留言 
     * @return mixed
     */
    public function index_price()
    {
        $feedback_list = Db::name('feedback')->where('typeid=2')->order('id desc')->select();

        return $this->fetch('index_xj', ['feedback_list' => $feedback_list,'title'=>'询价']);
    }



    /**
     * 编辑 
     * @param $id
     * @return mixed
     */
    public function edit_price($id)
    {   
        $info = Db::name('feedback')->find($id);
        Db::name('feedback')->where('id='.$id)->update(['status'=>1]);
        $xj = '1';
        
        $info['car'] = explode(',', $info['car_mes']);
        $info['company'] = explode(',', $info['company']);
        return $this->fetch('edit_xj', ['info' => $info,'xj'=>$xj]);
    }

    /**
     * 更新 
     * @throws \think\Exception
     */
    public function update_price()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            
            if (Db::name('feedback')->update($data) !== false) {
                $this->success('更新成功');
            } else {
                $this->error('更新失败');
            }
        }
    }

    /**
     * 删除 
     * @param $id
     * @throws \think\Exception
     */
    public function delete_price($id)
    {
        if (Db::name('feedback')->delete($id) !== false) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }


}