<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\common\model\ShopShop as ShopModel;
use app\common\model\Article as ArticleModel;
use app\common\model\Category as CategoryModel;
use think\Request;
use think\Db;
// use org\Treeclass;
/**
 * 商城shop
 * Class Shop
 * @package app\admin\controller
 */
class Category extends AdminBase
{
    protected function _initialize()
    {
        parent::_initialize();
        $request = Request::instance();
        $this->category_model = new CategoryModel();
        $this->article_model  = new ArticleModel();
         $category_level_list  = $this->category_model->getLevelAllList('4');
         // dump($category_level_list);
         $this->assign('category_level_list', $category_level_list);
    }

   public function index()
    {
        return $this->fetch();
    }

     /*
     *排序
     */
    public function listorder(){
        $ids = $this->request->param()['sort'];
        $pids = $this->request->param()['sort1'];
        
        $i=0;
        foreach ($pids as $k => $v) {
            $pidss[$i]['id'] = $k;
            $pidss[$i]['pid'] = $v;
            $i++;
        }
       
       $i=0;
        foreach($ids as $key=>$r) {
            $data['id'] = $key;
            $data['sort']=$r;
            if($key==$pidss[$i]['id']){
                $data['pid'] = $pidss[$i]['pid'];
            }
            $list[] = $data;
        $i++;
        }

       $this->category_model->saveall($list);
// dump($ids);die;
       $this->success('操作成功');
        
    }


     /**
     * 添加栏目
     * @param string $pid
     * @return mixed
     */
    public function add($pid = '')
    {
        return $this->fetch('add', ['pid' => $pid]);
    }

     /**
     * 保存栏目
     */
    public function save()
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();

            $data['spai']='4';
            $validate_result = $this->validate($data, 'Category');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($this->category_model->allowField(true)->save($data)) {
                    if($data['pid'] != 0){
                        $res1 = db("category")->where("id=".$data['pid'])->update(['child'=>1]);
                    }
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }


     /**
     * 编辑栏目
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $category = $this->category_model->find($id);
        $pid = $category['pid'];
        return $this->fetch('edit', ['category' => $category,'pid'=>$pid]);
    }

     /**
     * 更新栏目
     * @param $id
     */
    public function update($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            $validate_result = $this->validate($data, 'Category');

            $old_pid = getFval("category","pid",$id);
            $new_pid = $data['pid'];

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $children = $this->category_model->where(['path' => ['like', "%,{$id},%"]])->column('id');
                if (in_array($data['pid'], $children)) {
                    $this->error('不能移动到自己的子分类');
                } else {
                    if ($this->category_model->allowField(true)->save($data, $id) !== false) {

                         $has1 = db("category")->where("pid=".$old_pid)->find();
                         if(empty($has1)){
                            $res1 = db("category")->where("id=".$old_pid)->update(['child'=>0]);
                         }
                         if($new_pid != 0){
                            $res2 = db("category")->where("id=".$new_pid)->update(['child'=>1]);
                         }

                        $this->success('更新成功');
                    } else {
                        $this->error('更新失败');
                    }
                }
            }
        }
    }



     /**
     * 删除栏目
     * @param $id
     */
    public function delete($id)
    {
        $category = $this->category_model->where(['pid' => $id])->find();
        $article  = $this->article_model->where(['cid' => $id])->find();

        $old_pid = getFval("category","pid",$id); //找当前id 的pid

        if (!empty($category)) {
            $this->error('此分类下存在子分类，不可删除');
        }
        if (!empty($article)) {
            $this->error('此分类下存在文章，不可删除');
        }
        if ($this->category_model->destroy($id)) {
            $has1 = db("category")->where("pid=".$old_pid)->find();  //查找是否有字段为pid值的记录
            if(empty($has1)){
                $res1 = db("category")->where("id=".$old_pid)->update(['child'=>0]);
            }
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }





}