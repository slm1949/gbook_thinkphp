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
           $Form->where("id=$_GET[id]")->delete();
          // $this->assign('删除成功',$message);//这句错在那里了呢？
           $this->message='删除成功';
           $this->display(go);
    }
 } 
