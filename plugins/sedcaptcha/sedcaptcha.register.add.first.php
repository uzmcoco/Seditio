<?php
/* ====================
Seditio - Website engine
Copyright Neocrome & Russian Seditio Team 
http://www.neocrome.net http://ldu.ru

[BEGIN_SED]
File=plugins/sedcaptcha/sedcaptcha.validate.php
Version=178
Updated=2022-jun-09
Type=Plugin
Author=Amro
Description=Plugin to protect the registration process with a Cool PHP Captcha.
[END_SED]

[BEGIN_SED_EXTPLUGIN]
Code=sedcaptcha
Part=validation
File=sedcaptcha.register.add.first
Hooks=users.register.add.first
Tags=
Order=10
[END_SED_EXTPLUGIN]

==================== */

$error_string .= sed_verify_code()."<br />";

?>