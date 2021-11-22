<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome & Seditio Team
http://www.neocrome.net
https://seditio.org
[BEGIN_SED]
File=pfs.php
Version=178
Updated=2021-jun-17
Type=Core
Author=Neocrome
Description=PFS loader
[END_SED]
==================== */

if (!defined('SED_CODE')) exit();

define('SED_PFS', TRUE);
$location = 'PFS';
$z = 'pfs';

require(SED_ROOT . '/system/functions.php');
require(SED_ROOT . '/datas/config.php');
require(SED_ROOT . '/system/common.php');

sed_dieifdisabled($cfg['disable_pfs']);

switch($m)
	{
	case 'view':
	require(SED_ROOT . '/system/core/pfs/pfs.view.inc.php');
	break;

	case 'edit':
	require(SED_ROOT . '/system/core/pfs/pfs.edit.inc.php');
	break;

	case 'editfolder':
	require(SED_ROOT . '/system/core/pfs/pfs.editfolder.inc.php');
	break;

	default:
	require(SED_ROOT . '/system/core/pfs/pfs.inc.php');
	break;
	}
?>