<?php
class FormAction extends Action {
  public function insert(){
        $Form=D('Gbook');
        //dump($Form);
        if($Form->create()) {
            $result=$Form->add();
            if($result) {
                $this->message='添加成功！';
                $this->display(go);
            }else{
                $this->error('写入错误！');
            }
        }else{
             echo 'create方法错误';
            $this->error($Form->getError());
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
         if($Form->create()){
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
