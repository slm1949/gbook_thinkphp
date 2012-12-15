<?php
return array(
	//'配置项'=>'配置值'
              //数据库配置信息
           'DB_TYPE'=>"mysql",
           'DB_HOST'=>'localhost',
           'DB_NAME'=>'gbook',
           'DB_USER'=>'root',
           'DB_PWD'=>'6515',
           'DB_PORT'=>3306,
           'DB_PREFIX'=>'thinkphp_',
           //系统的设置
           'APP_DEBUG'=>true,
          'APP_STATUS'=>'debug',
          'SHOW_PAGE_TRACE'=>true,   // 显示页面Trace信息
          'SHOW_RUN_TIME'=>true,          // 运行时间显示 
          'SHOW_ADV_TIME'=>true,          // 显示详细的运行时间 
          'SHOW_DB_TIMES'=>true,          // 显示数据库查询和写入次数 
          'SHOW_CACHE_TIMES'=>true,       // 显示缓存操作次数 
          'SHOW_USE_MEM'=>true,           // 显示内存开销 
          'SHOW_LOAD_FILE' =>true,   // 显示加载文件数 
          'SHOW_FUN_TIMES'=>true ,  // 显示函数调用次数 
          'LOG_RECORD'=>true,       //开启日志记录
          'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误 (日志级别）
);
?>
