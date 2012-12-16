<?php
class FormAction extends Action {
  public function insert(){
        $Form=D('Gbook');
        //dump($Form);
        if($Form->create()) {
            $result=$Form->add();
            if($result) {
                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
             echo 'create方法错误';
            $this->error($Form->getError());
        }
    }

 } 
