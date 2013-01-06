<?php
class IndexAction extends Action {
    public function index(){
	$info=M('gbook');
        $data=$info->select();
        $this->assign('data',$data);
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
          $this->message='用户权限验证成功';  
          $_SESSION['name']=$name;
          $this->display('__APP__/Form/go');
         }
         else{
           $this->error('管理员名或密码错误');
         }
                 
    }
}
