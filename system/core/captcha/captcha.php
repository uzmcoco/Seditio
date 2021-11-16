<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome & Seditio Team
http://www.neocrome.net
https://seditio.org
[BEGIN_SED]
File=captcha.php
Version=178
Updated=2021-jun-17
Type=Core
Author=Amro
Description=Captcha generate
[END_SED]
==================== */

if (!defined('SED_CODE')) exit();

require('system/functions.php');

/*
require('datas/config.php');
require('system/common.php');
*/

$cfg['font_dir'] = "datas/fonts/";

$captcha_code = sed_generate_code();

sed_captcha_image($captcha_code);

?>