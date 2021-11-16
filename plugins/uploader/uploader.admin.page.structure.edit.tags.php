<?PHP
/* ====================
Seditio - Website engine
Copyright Seditio Team
https://seditio.org

[BEGIN_SED]
File=plugins/uploader/uploader.admin.page.structure.edit.tags.php
Version=178
Updated=2021-jun-19
Type=Plugin
Author=Amro
Description=
[END_SED]

[BEGIN_SED_EXTPLUGIN]
Code=uploader
Part=page
File=uploader.admin.page.structure.edit.tags
Hooks=admin.page.structure.edit.tags
Tags=admin.page.tpl
Minlevel=0
Order=11
[END_SED_EXTPLUGIN]
==================== */

if (!defined('SED_CODE')) { die('Wrong URL.'); }

require_once("plugins/uploader/lang/uploader.".$usr['lang'].".lang.php");

$extraslot = 'rthumb';

//setting
$use_sortable = ($cfg['plugin']['uploader']['use_sortable'] == "yes") ? 'true' : 'false';
$use_dragndrop = ($cfg['plugin']['uploader']['use_dragndrop'] == "yes") ? 'true' : 'false';
$use_rotation = ($cfg['plugin']['uploader']['use_rotation'] == "yes") ? 'true' : 'false';
$maximum_uploads = $cfg['plugin']['uploader']['maximum_uploads'];

$uploader = new XTemplate('plugins/uploader/uploader.tpl');

$first_thumb_array = rtrim($row['structure_thumb']); 

if ($first_thumb_array{mb_strlen($first_thumb_array) - 1} == ';') {
  $first_thumb_array = mb_substr($first_thumb_array, 0, -1);
}

$first_thumb_array = explode(";", $first_thumb_array);

$preload_images_arr = array();

foreach ($first_thumb_array as $imgfile)
    {        
        if ($imgfile && ($imgfile != '')) $preload_images_arr[] =  "'".$imgfile."'";     
    }
    
$preload_images = implode(',', $preload_images_arr);

$preload_images = (count($preload_images_arr) > 0) ? "sed_uploader_attach_images: [".$preload_images."]," : "";

$uploader-> assign(array(
    "UPLOADER_PRELOAD_IMAGES" => $preload_images,
    "UPLOADER_PRELOAD_USE_SORTABLE" => $use_sortable,
    "UPLOADER_PRELOAD_USE_DRAGNDROP" => $use_dragndrop,
    "UPLOADER_PRELOAD_USE_ROTATION" => $use_rotation,
    "UPLOADER_PRELOAD_MAXIMUM_UPLOADS" => $maximum_uploads,      
    "UPLOADER_PRELOAD_USERID" => $usr['id'],
    "UPLOADER_PRELOAD_ACTION" => 'savestructure',
    "UPLOADER_PRELOAD_EXTRA" => $extraslot,
    "UPLOADER_PRELOAD_ISMODAL" => ($cfg['enablemodal']) ? 1 : 0
));

$uploader->parse("UPLOADER");

$t->assign("STRUCTURE_UPDATE_ICON", $uploader->text("UPLOADER")); 
