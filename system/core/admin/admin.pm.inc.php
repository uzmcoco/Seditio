<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome & Seditio Team
http://www.neocrome.net
https://seditio.org
[BEGIN_SED]
File=admin.pm.inc.php
Version=178
Updated=2021-jun-17
Type=Core.admin
Author=Neocrome
Description=Administration panel
[END_SED]
==================== */

if ( !defined('SED_CODE') || !defined('SED_ADMIN') ) { die('Wrong URL.'); }

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = sed_auth('pm', 'a');
sed_block($usr['isadmin']);

$adminpath[] = array (sed_url("admin", "m=tools"), $L['adm_manage']);
$adminpath[] = array (sed_url("admin", "m=pm"), $L['Private_Messages']);

$adminhelp = $L['adm_help_pm'];

$t = new XTemplate(sed_skinfile('admin.pm', true)); 

if (sed_auth('admin', 'a', 'A'))
	{
	$t->assign("BUTTON_PM_CONFIG_URL", sed_url("admin", "m=config&n=edit&o=core&p=pm"));	
	$t -> parse("ADMIN_PM.PM_BUTTONS.PM_BUTTONS_CONFIG");
	$t -> parse("ADMIN_PM.PM_BUTTONS");
	}

$totalpmdb = sed_sql_rowcount($db_pm);
$totalpmsent = sed_stat_get('totalpms');

$t->assign(array(
	"PM_TOTALMP_DB" => $totalpmdb,
	"PM_TOTALMP_SEND" => $totalpmsent
));	

$t -> parse("ADMIN_PM");

$adminmain .= $t -> text("ADMIN_PM"); 

?>