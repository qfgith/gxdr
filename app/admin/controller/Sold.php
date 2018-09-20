<?php
namespace app\admin\controller;

use app\common\model\AlonePage as AlonePageModel;
use app\common\model\Article as ArticleModel;
use app\common\model\Category as CategoryModel;
use app\common\controller\AdminBase;
use think\Db;
/**
 * 成功案例管理
 * Class Edu
 * @package app\admin\controller
 */
class Sold extends AdminBase
{
    protected $alone_page_model;
    protected $article_model;
    protected $category_model;

    protected function _initialize()
    {
        parent::_initialize();
        // $spai_value=['spai'=>1];
        $this->alone_page_model  = new AlonePageModel();
        $this->article_model  = new ArticleModel();
        $this->category_model = new CategoryModel();
        // dump(Request::instance()->controller());
         //$request = \think\Request::instance();
        // $currentcontr=\think\Request::instance()->param();
        // dump($currentcontr);
        $category_level_list = $this->category_model->getLevelList($this->spai);
        // dump($category_level_list);

        $this->assign('category_level_list', $category_level_list);
    }

    /**
     * 成功案例管理
     * @param int    $cid     分类ID
     * @param string $keyword 关键词
     * @param int    $page
     * @return mixed
     */
    public function index($cid = 0, $keyword = '', $page = 1)
    {
        $map   = [];
        $map['isdel'] = 0;
        $map['spai'] = ['eq', $this->spai];
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

        $article_list  = $this->article_model->field($field)->where($map)->order(['id' => 'DESC'])->paginate(15, false, ['page' => $page]);
        
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
     * 添加成功案例
     * @return mixed
     */
    public function add()
    {   
        $info1['ueditor'] = getUeditor();
        $info1['ucontent'] = getHtmlEditor("content","");
        // $info1['uphoto'] = getUeditorImages("photo","");
        return $this->fetch('',['info1'=>$info1]);
    }


    /**
     * 保存成功案例
     */
    public function save()
    {
        if ($this->request->isPost()) {
            $data = $this->request->param(); //获取传过来的数据
            $data['publish_time'] = time();
            
            $validate_result = $this->validate($data, 'Article.edit');  //验证规则
            
            // $validate = \think\Loader::validate('Article');
            // $validate_result = $validate->scene('edit')->check($data);  //验证规则('edit')

            $data['spai']=$this->spai;

            if ($validate_result !== true) {
                $this->error($validate_result);
                // $this->error('error');
            } else {
                if ($this->article_model->allowField(true)->save($data)) {
                    
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑成功案例
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $article = $this->article_model->find($id);
        $info1['ueditor'] = getUeditor();
        $info1['ucontent'] = getHtmlEditor("content",$article['content']);
        // $info1['uphoto'] = getUeditorImages("photo",$article['photo']);

        return $this->fetch('edit', ['article' => $article,'info1'=>$info1]);
    }

    /**
     * 更新成功案例
     * @param $id
     */
    public function update($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            $validate_result = $this->validate($data, 'Article.edit');
            $data['publish_time'] = time();
            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($this->article_model->allowField(true)->save($data, $id) !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }

    /**
     * 删除成功案例
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
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的成功案例');
        }
    }







/****************************************************************************************************
 * 单页管理
 */

    public function alonepage($cid = 0, $keyword = '', $page = 1)
    {
        $map   = [];

        $map['spai'] = ['eq', $this->spai];
        $field = 'id,title,cid,author,reading,status,publish_time,sort';

        if ($cid > 0) {
            $category_children_ids = $this->category_model->where(['path' => ['like', "%,{$cid},%"]])->column('id');
            $category_children_ids = (!empty($category_children_ids) && is_array($category_children_ids)) ? implode(',', $category_children_ids) . ',' . $cid : $cid;
            $map['cid']            = ['IN', $category_children_ids];
        }

        if (!empty($keyword)) {
            $map['title'] = ['like', "%{$keyword}%"];
        }



        $article_list  = $this->alone_page_model->field($field)->where($map)->order(['publish_time' => 'DESC'])->paginate(15, false, ['page' => $page]);
        $category_list = $this->category_model->column('name', 'id');

        return $this->fetch('alone_page:index', ['article_list' => $article_list, 'category_list' => $category_list, 'cid' => $cid, 'keyword' => $keyword]);
    }

    /**
     * 添加单页
     * @return mixed
     */
    public function aloneadd()
    {
        return $this->fetch('alone_page:add');
    }

    /**
     * 保存单页
     */
    public function alonesave()
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            $validate_result = $this->validate($data, 'Article');

            $data['spai']=$this->spai;

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($this->alone_page_model->allowField(true)->save($data)) {
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑单页
     * @param $id
     * @return mixed
     */
    public function aloneedit($id)
    {
        $article = $this->alone_page_model->find($id);

        return $this->fetch('alone_page:edit', ['article' => $article]);
    }

    /**
     * 更新成功案例
     * @param $id
     */
    public function aloneupdate($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            $validate_result = $this->validate($data, 'Article');

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                if ($this->alone_page_model->allowField(true)->save($data, $id) !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }
        }
    }

    /**
     * 删除单页
     * @param int   $id
     * @param array $ids
     */
    public function alonedelete($id = 0, $ids = [])
    {
        $id = $ids ? $ids : $id;
        if ($id) {
            if ($this->alone_page_model->destroy($id)) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的成功案例');
        }
    }

    /**
     * 单页审核状态切换
     * @param array  $ids
     * @param string $type 操作类型
     */
    public function alonetoggle($ids = [], $type = '')
    {
        $data   = [];
        $status = $type == 'audit' ? 1 : 0;

        if (!empty($ids)) {
            foreach ($ids as $value) {
                $data[] = ['id' => $value, 'status' => $status];
            }
            if ($this->alone_page_model->saveAll($data)) {
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        } else {
            $this->error('请选择需要操作的成功案例');
        }
    }



}