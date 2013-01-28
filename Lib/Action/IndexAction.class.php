<?php
class IndexAction extends Action {
    public function index(){
	import('ORG.Util.Page');// 导入分页类
        $info=M('gbook');
        $count=$info->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page=new Page($count,5);// 实例化分页类 传入总记录数
        $show=$Page->show();// 分页显示输出
        //$data=$info->select();
        // 进行分页数据查询
        $data= $info->order('re_time')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('data',$data);
        $this->assign('page',$show);// 赋值分页输出
        
        $info2=M('reply');
        $data2=$info2->select();
        $this->assign('data2',$data2);
        session_start();

    
    


        if(empty($_SESSION['name'])){
           $this->display();
         }
        else{
           $this->admin=$_SESSION;
           $this->display('index_admin');
        }
     }
    public function admin_back(){
         $Form=M('user');
         $name=$_POST['name'];
         $password=$_POST['password'];
         if($password==$Form->where("name='$name'")->getField('password')){
          $this->message='管理员权限验证成功';  
          $_SESSION['name']=$name;
          $this->display('Form:go');
         }
         else{
           $this->error('管理员名或密码错误');
         }
                 
    }
     public function logout(){
            session_start();
            $_SESSION=array();
            $this->message='登出成功';
            $this->display('Form:go');
     }
}
