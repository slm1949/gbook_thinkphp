<?php
class GbookModel extends Model{
   //自动验证
   protected $_validate=array(
           array('user','require','用户名必须'),
           array('title','require','标题必须'),
           array('content','require','内容必须'),
        );
  /* protected $_auto=array(
           array(,),
              );  */
}
