<?php
function getFileList($dir)
{
    $files = scandir($dir);
    $files = array_filter($files, function ($file) {
        return !in_array($file, array('.', '..'));
    });
    $list = [];
    foreach ($files as $file) {
        $fullpath = rtrim($dir, '/') . '/' . $file;
        if (is_file($fullpath)) {
            $list[] = $fullpath;
        } elseif (is_dir($fullpath)) {
            $list = array_merge($list, getFileList($fullpath));
        }
    }
    return $list;
}
// PRO用
if (defined('OSDGPRO_PLUGIN_DIR')) {
    if (!isset($osdg_dir)) {
        $osdg_dir = str_replace('os-diagnosis-generator-pro', 'os-diagnosis-generator', OSDGPRO_PLUGIN_DIR);
    }
    $addon_dir = $osdg_dir . "addon/";
} else {
    $addon_dir = OSDG_PLUGIN_DIR . "addon/";
}
$addon_files = getFileList($addon_dir);
// include処理
if (!empty($addon_files) && is_array($addon_files)) {
    foreach ($addon_files as $uf) {
        include_once($uf);
    }
}
