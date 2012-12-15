<?php
class IndexAction extends Action {
    public function index(){
	$info=M('gbook');
        $data=$info->select();
        $this->assign('data',$data);
        $this->display();//渲染，调用模板引擎12
     }
}
