<?php
class FormAction extends Action {
  public function insert(){
         $Form=D('Gbook');
         $data['ip']=$_SERVER['REMOTE_ADDR'];//获得客户端IP
         $data['re_time']=date("y-n-d   H:i:s");//获得服务器时间
         $data['user']=$_POST['user'];
         $data['title']=$_POST['title'];
         $data['email']=$_POST['email'];
         $data['content']=$_POST['content'];
         session_start();
     if(session('verify')==md5($_POST['verify']) or ! isset($_POST['verify'])){
       if(preg_match('/<script>/',$data['user'])){
             $this->error('你输入的内容包含非法字符');
       }
       else{
         $condition1['ip']=$data['ip'];
         $condition1['re_time']=array('ELT',$data['re_time']);
         $condition1['re_time']=array('EGT',$data['re_time']-'00-00-00 00:05:00');
         $condition2['ip']=$data['ip'];
         $condition2['re_time']=array('ELT',$data['re_time']);
         $condition2['re_time']=array('EGT',$data['re_time']-'00-00-00 01:00:00');
         $condition3['ip']=$data['ip'];
         $condition3['re_time']=array('ELT',$data['re_time']);
         $condition3['re_time']=array('EGT',$data['re_time']-'00-00-01 00:00:00');
         //限制5分钟，1小时，1天内同意IP留言数量
     if($Form->where($condition1)->count()<50 and $Form->where($condition2)->count()<20 and $Form->where($condition3)->count()<100 ){
        if($Form->create($data)) {
            $result=$Form->add();
            if($result) {
                $this->message='添加成功！';
                //import('ORG.Mail');
               // SendMail('slm1949@163.com','一条新的留言','你的留言板上有一条留言，请查看','系统管理员');
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
     $this->message='你的留言大于规定时间的留言数量！';
     $this->display(go);//返回首页
     }
    }
   }
   else{
       $this->error('验证码错误！');
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
         $data['email']=$_POST['email'];
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
     public function reply(){
       session_start();
       if(!empty($_SESSION['name'])){
         $Form=D('Reply');
         $data['re_time']=date("y-n-d   H:i:s");//获得服务器时间
         $data['admin_name']=$_SESSION['name'];
         $data['content']=$_POST['content'];
         $data['re_id']=$_POST['re_id'];
         if($Form->create($data)) {
            $result=$Form->add();
            if($result) {
                $this->message='添加回复成功！';
                $Form_mail=M('gbook');
                $mail=$Form_mail->where('id='.$data['re_id'])->getfield('email');
                import('ORG.Mail');
                SendMail($mail,'管理员已对你的留言回复','你的留言已回复，请查看','留言者');
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
         $this->message='你没有管理权限，请登录！';
         $this->display(go);//返回首页  
        } 
     }
     public function reply_front(){
          session_start();
          if(!empty($_SESSION['name'])){
             $this->re_id=$_GET['id'];
             $this->display();
           }
           else{
              $this->message='你没有管理权限,请登陆！';
              $this->display(go);//返回首页 
           } 
      }
     public function add(){
          $Form=D('Gbook');
          $ip=$_SERVER['REMOTE_ADDR'];
          $time=date("y-n-d H:i:s");//注意这里H 大写小写的区别。
          $sql="ip='$ip' and re_time<'$time' and re_time>DATE_SUB('$time',INTERVAL 10 minute)";//注意引号的书写 及意义，ip 上加不家引号的区别
echo $sql;
         if($Form->where($sql)->count()<1){
             $this->display();
          }
          else{
            $this->display(add2);
          }
         
     }
}
