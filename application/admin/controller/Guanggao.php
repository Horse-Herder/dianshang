<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;//引入request
use think\DB;
use app\admin\model\guang;//引入模型层
header("content-type:text/html;charset=UTF-8");//防乱码
class Guanggao extends Controller
{

    public function add()
    {
    	   // echo  '111111';die;
        return $this->fetch('add_guanggao');
    }
    public function add2(){
    	$data = input('post.');
        $datee = request()->file('ad_file');
        $info = $datee->move(ROOT_PATH . 'public' . DS .'uploads');
        $aww= str_replace("\\", "/", $info->getSaveName());
          // print_r($aww);die;
    if($info){
        // 成功上传后 获取上传信息
        $data['ad_file'] = $aww;
           // var_dump($data);die;
        
    }else{
        // 上传失败获取错误信息
        echo $file->getError();
    }
    $Request=Request::instance();
    $user=new guang;
    // var_dump($user);die;
    $result=$user->insertData($data);
          if($result)
        {   
            // return Redirect('Index/show');
            // echo "<script>alert('新增成功');localtion.href='{:url('Index/show')}'</script>";
            $this->success('新增成功','guanggao/show');
        }else{
            $this->error('新增失败');
        }
    }
    public function show(){
        $user = new guang;
        $arr = $user->page();
        // $arr=$user->show();
          // var_dump($arr);die;
         $this->assign('arr',$arr);
         // return view('show');
         return $this->fetch('show');

    }
      public function dels(){
        $id = $_GET['id'];
        // echo "$id";die;
         $user = new guang;
          $res = $user->deleteAll($id);
         $sda = $user->findData($id);
         // print_r($sda['ad_file']);die;
         // echo $sda;die;
        if ($res) {
          // unlink('uploads/'.$sda['ad_file']);
          echo "1";
        }else{
          echo "2";
        }
    }
}