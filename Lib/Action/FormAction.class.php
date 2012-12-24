<?php
class FormAction extends Action {
  public function insert(){
         $Form=D('Gbook');
         $data['ip']=$_SERVER['REMOTE_ADDR'];//获得客户端IP
         $data['re_time']=date("y-n-d   H:i:s");//获得服务器时间
         $data['user']=$_POST['user'];
         $data['title']=$_POST['title'];
         $data['content']=$_POST['content'];
   if($Form->where("ip='".$_SERVER['REMOTE_ADDR']."'")->count()<10){  //SQL中的查询条件中的字符串要有单引号
        if($Form->create($data)) {
            $result=$Form->add();
            if($result) {
                $this->message='添加成功！';
                $this->display(go);//返回首页
            }
            else{
                $this->error('写入错误！');
            }
        }
        else{
             echo 'create方法错误';
            $this->error($Form->getError());
        }
     }
     else{
     $this->message='同一Ip留言已经不能大于10条！';
     $this->display(go);//返回首页
     }
    }
    public function del(){
           //echo $_GET[id];
           $Form=M('gbook');
           $result=$Form->where("id=$_GET[id]")->delete();
           if($result){
          // $this->assign('删除成功',$message);//这句错在那里了呢？
           $this->message='删除成功';
           $this->display(go);
           }
           else{
                $this->error('删除错误');
           }
    }
    public function modify(){
            $this->id=$_GET[id];
            $this->display();
            
            
    
    }
    public function update(){
         $Form=D('Gbook');
         $data['ip']=$_SERVER['REMOTE_ADDR'];
         $data['re_time']=date("Y-n-d   H:i:s");
         $data['id']=$_POST['id'];
         $data['user']=$_POST['user'];
         $data['title']=$_POST['title'];
         $data['content']=$_POST['content'];
         if($Form->create($data)){
           if($Form->save()){
              $this->message="修改留言成功";
              $this->display(go);
           }
           else{
              $this->error('修改留言失败');
           }
         }
         else{
         $this->error($Form->getError());
         }
           //$result=
   }
     public function manage(){
         $Form=M('user');
         $name=$_POST['name'];
         $password=$_POST['password'];
         if($password==$Form->where("name='$name'")->getField('password')){   //这句试了很久where()里的写法
          $this->message='用户权限验证成功';  
          $this->id=$_POST['id'];
          $this->action=$_POST['action'];
          $this->display();
         }
         else{
           $this->error('管理员名或密码错误');
         }
         
         
     }    
     public function rights(){
            $this->id=$_GET['id'];
            $this->action=$_GET['action'];
            $this->display();
      }    
 } 
