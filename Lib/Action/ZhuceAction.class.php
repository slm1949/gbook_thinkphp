<?php
  class ZhuceAction extends Action{
    public function zhuce(){
      if($_POST[password1]!=$_POST[password2]){
            $this->error('两次输入的密码不一致');
      }
      else{
        $Form=M('user');
        $data['name']=$_POST['name'];
        $data['password']=$_POST['password1'];
        $data['user_name']=$_POST['user_name'];
        $sql="name='".$_POST['name']."'";//这里的写法
        if($Form->where($sql)->count()==0){
          $Form->create($data);
          $result=$Form->add();
          if($result){
            $this->message='用户注册成功';
            $this->display('Form:go');
          }
          else{
            $this->error('用户注册失败');  
          }
        }
        else{
         $this->error('登录名已被使用');
        }
      }
    }
  }    