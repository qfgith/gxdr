<?php
namespace app\admin\controller;

use app\common\model\AlonePage as AlonePageModel;
use app\common\model\Article as ArticleModel;
use app\common\model\Category as CategoryModel;
use app\common\controller\AdminBase;
use think\Db;
/**
 * 汽车管理
 * Class Edu
 * @package app\admin\controller
 */
class Cases extends AdminBase
{
    protected $alone_page_model;
    protected $article_model;
    protected $category_model;

    protected function _initialize()
    {
        parent::_initialize();

        $this->alone_page_model  = new AlonePageModel();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();
        $category_level_list = $this->category_model->getLevelList($this->spai);

        $this->assign('category_level_list', $category_level_list);
    }

    /**
     * 汽车管理
     * @param int    $cid     分类ID
     * @param string $keyword 关键词
     * @param int    $page
     * @return mixed
     */
    public function index($cid = 0, $keyword = '', $page = 1)
    {
        $map   = [];
        $map['spai'] = ['eq', $this->spai];
        $map['isdel'] = 0;
        $field = 'id,title,cid,author,reading,status,publish_time,sort,thumb,isdel,create_time';

        if ($cid > 0) {
            $category_children_ids = $this->category_model->where(['path' => ['like', "%,{$cid},%"]])->column('id');
            // dump($category_children_ids);
            $category_children_ids = (!empty($category_children_ids) && is_array($category_children_ids)) ? implode(',', $category_children_ids) . ',' . $cid : $cid;
            $map['cid']            = ['IN', $category_children_ids];
        }
        if (!empty($keyword)) {
            $map['title'] = ['like', "%{$keyword}%"];
        }

        $article_list  = $this->article_model->field($field)->where($map)->order(['sort'=>'ASC','id' => 'DESC'])->paginate(15, false, ['page' => $page]);
        
        $category_list = $this->category_model->column('name'); //此处是获得整个栏目表，然后在index 的页面中通过前面的变量然后传对于的参数 ，即显示改栏目的名字

        
        
        return $this->fetch('index', ['article_list' => $article_list, 'category_list' => $category_list, 'cid' => $cid, 'keyword' => $keyword]);
    }





    /*
     *排序
     */
    public function listorder(){
        $ids = $this->request->param()['sort'];
        
        foreach($ids as $key=>$r) {
            $data['id'] = $key;
            $data['sort']=$r;
            $list[] = $data;
        }
       $this->article_model->saveall($list);
       $this->success('操作成功');
        
    }




    /**
     * 添加汽车
     * @return mixed
     */
    public function add()
    {   
        $info1['ueditor'] = getUeditor();
        $info1['ucontent'] = getHtmlEditor("content","");
        $info1['uphoto'] = getUeditorImages("photo","");
        
        return $this->fetch('',['info1'=>$info1]);
    }


    /**
     * 保存汽车
     */
    public function save()
    {
        if ($this->request->isPost()) {
            $data = $this->request->param(); //获取传过来的数据
            $data['publish_time'] = time();
            
            $validate_result = $this->validate($data, 'Company');  //验证规则

            $data['spai']=$this->spai;

            if ($validate_result !== true) {
                $this->error($validate_result);
                // $this->error('error');
            } else {
                 if(isset($data['photo'])){
                    $data['photo'] = picarr2str($data['photo'],$data['photo_name']);
                 }
                if ($this->article_model->allowField(true)->save($data)) {
                    
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑汽车
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {   

        $article = $this->article_model->find($id);
        $info1['ueditor'] = getUeditor();
        $info1['ucontent'] = getHtmlEditor("content",$article['content']);
        $info1['uphoto'] = getUeditorImages("photo",$article['photo']);

        return $this->fetch('edit', ['article' => $article,'info1'=>$info1]);
    }

    /**
     * 更新汽车
     * @param $id
     */
    public function update($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            $validate_result = $this->validate($data, 'Company');
            $data['publish_time'] = time();
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if(isset($data['photo'])){
                    $data['photo'] = picarr2str($data['photo'],$data['photo_name']);
                 }

                  // $old_del = $this->article_model->where(['id'=>$id])->column('isdel'); //修改前的删除状态
                if ($this->article_model->allowField(true)->save($data, $id) !== false) {
                   // if($old_del[0]!=$data['isdel'] && $data['isdel']==1){
                   //      db('solution')->where('com_id='.$id)->update(['isdel'=>1]);
                   // }else if($old_del!=$data['isdel'] && $data['isdel']==0){
                   //      db('solution')->where('com_id='.$id)->update(['isdel'=>0]);
                   // }
                    
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }




    /**
     * 删除汽车
     * @param int   $id
     * @param array $ids
     */
    public function delete($id)
    {
       $save['isdel'] = 1;
        $save['publish_time'] = time();
        $map['id'] = $id;
        if ($id) {

            if ($this->article_model->where($map)->update($save)) {
               $this->success('删除成功');
            } else {
                $this->error('删除成功');
            }
        } else {
            $this->error('请选择需要删除的案例');
        }
    }

    





}