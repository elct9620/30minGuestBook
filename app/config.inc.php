<?php
/**
 * Conifg
 * 
 * @author Aotoki
 * @version 1.0
 */

//資料庫資訊
define('DB_HOST', 'localhost'); //伺服器
define('DB_NAME', '30min-GB-V1'); //資料庫名稱
define('DB_USER', ''); //使用者名稱
define('DB_PASS', ''); //使用者密碼

//設定基準路徑
if(!defined('ABSPATH')){
	define('ABSPATH', dirname(__FILE__) . '/');
}

//設定除錯模式
define('DEBUG', TRUE);
