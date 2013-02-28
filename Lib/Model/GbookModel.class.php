<?php
class GbookModel extends Model{
   //自动验证
   protected $_validate=array(
           array('user','require','用户名必须'),
           array('title','require','标题必须'),
           array('email','require','邮箱必须'),
           array('content','require','内容必须'),
          // array('email','\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*','邮箱邮箱格式错误'),

        );
  /* protected $_auto=array(
           array(,),
              );  */
}
