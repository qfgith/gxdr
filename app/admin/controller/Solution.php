<?php
namespace app\admin\controller;

use app\common\model\AlonePage as AlonePageModel;
use app\common\model\Article as ArticleModel;
use app\common\model\Solution as SolutionModel;
use app\common\model\Category as CategoryModel;
use app\common\controller\AdminBase;
use think\Db;
/**
 * 方案管理
 * Class Edu
 * @package app\admin\controller
 */
class Solution extends AdminBase
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
        $this->solution_model = new SolutionModel();
    }

    /**
     * 方案管理
     * @param int    $cid     分类ID
     * @param string $keyword 关键词
     * @param int $com_id 公司id
     * @param int $oneC_id 车分类id
     * @param int    $page
     * @return mixed
     */
    public function index($cid = 0,$com_id=0,$oneC_id=0, $keyword = '', $carname='',$page = 1)
    {
        $map   = [];
        $map['s.isdel'] = 0;
        //公司筛选
        if ($com_id!=0) {
            $map['s.com_id'] = $com_id;
        }
        //车分类筛选
        if($oneC_id!=0){
            $map['s.oneC_id'] = $oneC_id;
        }
        //具体车型
        if(!empty($carname)){
            $map['a.title'] = ['like','%'.$carname.'%'];
        }

        $article_list  = db('solution')
                ->alias('s')
                ->field('s.*,a.title as cartit')
                ->join('article a','s.car_id = a.id','LEFT')
                ->where($map)->order(['s.id' => 'DESC'])->paginate(15, false, [
                    'page' => $page,
                    'query'=> [
                            'com_id' => request()->param('com_id'),
                            'oneC_id' => request()->param('oneC_id'),
                            'carname' =>request()->param('carname')
                        ]
                    ]);
      
       //公司列表
       $order = ['sort'=>'ASC','id'=>'DESC'];
       $comlist = db('article')->field('id,title')->where(['spai'=>'3'])
                                ->order($order)->select();
       $comlist_n =array();
       foreach ($comlist as $k => $v) {
           $comlist_n[$v['id']] = $v;
       }
       $all_companymes = $this->article_model->field('id,title')->where('isdel=0 and status=1 and spai=3')->order(['sort'=>'ASC','id'=>'DESC'])->select();   

        //汽车一级分类
        $one_car_nav = db('category')->where('spai=1 and pid=0')->select();

        return $this->fetch('index', ['article_list' => $article_list, 'keyword' => $keyword,'comlist_n'=>$comlist_n,'all_companymes'=>$all_companymes,'category_nav'=>getCategoryNav('1'),'com_id'=>$com_id,'oneC_id'=>$oneC_id,'one_car_nav'=>$one_car_nav,'carname'=>$carname]);
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
       $this->solution_model->saveall($list);
       $this->success('操作成功');
        
    }


    /**
     * 添加方案
     * @return mixed
     */
    public function add()
    {   

        /*方案前-所有公司*/
        $all_companymes = $this->article_model->field('id,title')->where('isdel=0 and status=1 and spai=3')->order(['sort'=>'ASC','id'=>'DESC'])->select();
        /*方案前*/
        $order = ['sort'=>'ASC','id'=>'DESC'];
        //1
        $one_carnav = db('category')->where('spai=1 and pid=0')->order($order)->select();
        //2
        $first_id = $one_carnav[0]['id'];
        $two_carnav = db('category')->where('spai=1 and pid='.$first_id)->order($order)->select();
        //3
        $two_id = $two_carnav[0]['id'];
        $three_carnav = db('article')->where('status=1 and isdel=0 and spai=1 and cid='.$two_id)->select();
        // dump($two_carnav);
        return $this->fetch('',['all_companymes'=>$all_companymes,'one_carnav'=>$one_carnav,'two_carnav'=>$two_carnav,'three_carnav'=>$three_carnav]);
    }


    /**
     * 保存方案
     */
    public function save()
    {
        if ($this->request->isPost()) {
            $data = $this->request->param(); //获取传过来的数据
            $data['publish_time'] = time();
            $validate_result = $this->validate($data, 'Solution');  //验证规则

            $res = db('solution')->where('isdel=0 and status=1 and com_id='.$data['com_id'].' and car_id='.$data['car_id'])->find();
            if(!empty($res)){
                $this->error('该公司已为该车型添加过方案！');
            }

            if ($validate_result !== true) {
                $this->error($validate_result);
                // $this->error('error');
            } else {
                //'shoufu'//首付 'yuegong'//月供 'yajin'//押金' qishu'//期数 'shuangban'//支持双班    //'type' 类型
                $newarr = array();  
                foreach($data['shoufu'] as $k=>$v){
                    $newarr[$k]['type'] = $data['type'][$k];
                    $newarr[$k]['shoufu'] = $data['shoufu'][$k];
                    $newarr[$k]['yuegong'] = $data['yuegong'][$k];
                    $newarr[$k]['yajin'] = $data['yajin'][$k];
                    $newarr[$k]['qishu'] = $data['qishu'][$k];
                    $newarr[$k]['shuangban'] = $data['shuangban'][$k];
                }
                unset($data['type']);
                unset($data['shoufu']);
                unset($data['yuegong']);
                unset($data['yajin']);
                unset($data['qishu']);
                unset($data['shuangban']);
                $data['content']= json_encode($newarr);
                
                if ($this->solution_model->allowField(true)->save($data)) {
                    
                    $this->success('保存成功');
                } else {
                    $this->error('保存失败');
                }
            }
        }
    }

    /**
     * 编辑方案
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $article = $this->solution_model->find($id);
         /*方案前-所有公司*/
        $all_companymes = $this->article_model->field('id,title')->where('isdel=0 and status=1 and spai=3')->order(['sort'=>'ASC','id'=>'DESC'])->select();
        $cid = db('article')->field('cid')->where('spai=1 and id='.$article['car_id'])->find();
        //所有车型3
        $three_carnav = db('article')->field('id,title')->where('isdel=0 and status=1 and spai=1 and cid='.$cid['cid'])->select();
        //根据cid 查找所有分类2
        $pid = getFval('category','pid',$cid['cid']);
        $two_carnav = get_alist('category','pid='.$pid,'sort asc,id desc');
        //查找一级分类
        $one_carnav = get_alist('category','spai=1 and pid=0','sort asc,id desc');
        //方案
        $solut = json_decode($article->content,true);
        
        return $this->fetch('edit', ['article' => $article,'all_companymes'=>$all_companymes,'three_carnav'=>$three_carnav,'two_carnav'=>$two_carnav,'one_carnav'=>$one_carnav,'cid'=>$cid,'pid'=>$pid,'solut'=>$solut]);
    }

    /**
     * 更新方案
     * @param $id
     */
    public function update($id)
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param();
            $validate_result = $this->validate($data, 'Solution');

            $res = db('solution')->where('isdel=0 and status=1 and com_id='.$data['com_id'].' and car_id='.$data['car_id'])->find();

            if(!empty($res) && ( $res['id']!=$data['id'] ) ){
                $this->error('该公司已为该车型添加过方案！');
            }

            if ($validate_result !== true) {
                $this->error($validate_result);
            } else {
                //'shoufu'//首付 'yuegong'//月供 'yajin'//押金' qishu'//期数 'shuangban'//支持双班   //type 类型
                $newarr = array();  
                foreach($data['shoufu'] as $k=>$v){
                    $newarr[$k]['type'] = $data['type'][$k];
                    $newarr[$k]['shoufu'] = $data['shoufu'][$k];
                    $newarr[$k]['yuegong'] = $data['yuegong'][$k];
                    $newarr[$k]['yajin'] = $data['yajin'][$k];
                    $newarr[$k]['qishu'] = $data['qishu'][$k];
                    $newarr[$k]['shuangban'] = $data['shuangban'][$k];
                }
                unset($data['type']);
                unset($data['shoufu']);
                unset($data['yuegong']);
                unset($data['yajin']);
                unset($data['qishu']);
                unset($data['shuangban']);
                $data['content']= json_encode($newarr);

                if ($this->solution_model->allowField(true)->save($data, $id) !== false) {
                    $this->success('更新成功');
                } else {
                    $this->error('更新失败');
                }
            }


        }
    }

    /**
     * 删除方案
     * @param int   $id
     * @param array $ids
     */
    public function delete($id)
    {
        $save['isdel'] = 1;
        $map['id'] = $id;
        if ($id) {

            if ($this->solution_model->where($map)->update($save)) {
               $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('请选择需要删除的方案');
        }
    }

    /**
     * 根据大栏目，获取分类
     * @param int   $id
     */
    public function getTypeByOnec_id($id)
    {
        $id = $this->request->post()['id'];
        $two_nav = db('category')->field('id,name')->where('pid='.$id)->select();
        return json($two_nav);
       
    }

    /**
     * 根据分类,查找具体车辆
     * @param int   $id
     */
    public function getcarlistBytwo_id($id)
    {
        $id = $this->request->post()['id'];
        $two_nav = db('article')->field('id,title')->where('status=1 and isdel=0 and cid='.$id)->select();
        return json($two_nav);
       
    }


}