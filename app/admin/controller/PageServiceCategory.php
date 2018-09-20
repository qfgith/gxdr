<?php
namespace app\admin\controller;

use app\common\controller\AdminBase;
use app\common\model\ShopShop as ShopModel;
use app\common\model\Article as ArticleModel;
use app\common\model\Category as CategoryModel;
use app\common\model\Page as PageModel;
use think\Request;
use think\Db;
// use org\Treeclass;
/**
 * @package app\admin\controller           
 */
class PageServiceCategory extends AdminBase
{
    protected function _initialize()
    {
        parent::_initialize();
        $request = Request::instance();
        $this->category_model = new CategoryModel();
        $this->article_model  = new ArticleModel();
        $this->page_model  = new PageModel();
        $res = db('page')->where('spai=2')->select();
        $category_level_list = array2level($res);

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

       $this->page_model->saveall($list);
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
            
            $validate_result = $this->validate($data, 'Category');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                $dataa['spai'] = 2;
                $dataa['name'] = $data['name'];
                $dataa['alias'] = isset($data['alias'])?$data['alias']:'';
                $dataa['introduction'] = isset($data['introduction'])?$data['introduction']:'';
                $dataa['pid']  = $data['pid'];
                $dataa['create_time'] = time();
                if (db('page')->insert($dataa)) {
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
        $page_category = db('page')->find($id);
        $pid = $page_category['pid'];
        return $this->fetch('edit', ['category' => $page_category,'pid'=>$pid]);
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
           
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                unset($data['/admin/page_service_category/update/id/'.$id.'_html']);
                
                if ($data['id'] == $data['pid']) {
                    $this->error('不能移动到自己的子分类');
                } else {
                    if (db('page')->where('id='.$id)->update($data) !== false) {
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
        $category = db('page')->where(['pid' => $id])->find();

        $old_pid = getFval("category","pid",$id); //找当前id 的pid

        if (!empty($category)) {
            $this->error('此分类下存在子分类，不可删除');
        }
        
        if (db('page')->delete($id)) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }


    /*编辑单页的内容*/
    public function edit_page($id){
        $article = $this->page_model->find($id);
        $info1['ueditor'] = getUeditor();
        $info1['ucontent'] = getHtmlEditor("content",$article['content']);

        return $this->fetch('edit_page', ['article' => $article,'info1'=>$info1,'id'=>$id]);
    }

    /*更新单页的内容*/
    public function update_page($id){

        if ($this->request->isPost()) {
            $data            = $this->request->param();
            
            if ($this->page_model->allowField(true)->save($data, $id) !== false) {
                $this->success('更新成功');
            } else {
                $this->error('更新失败');
            }
            
        }
    }



}