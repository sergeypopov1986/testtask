<?php
set_time_limit(0);
ini_set('memory_limit', '1024M');

$_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', realpath(dirname(__FILE__) . '/../..'));
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_CHECK", true);

include($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (!CModule::IncludeModule('highloadblock'))
	die('Can\'t include module highloadblock');

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

$CatalogEntityData = array ( 'NAME' => 'Catalog', 'TABLE_NAME' => 'tbl_catalog' );
$ProductAssignEntityData = array ( 'NAME' => 'ProductAssign', 'TABLE_NAME' => 'tbl_product_assign' );
$UsersAssignEntityData = array ( 'NAME' => 'UsersAssign', 'TABLE_NAME' => 'tbl_users_assign' );

$CatalogEntityDataRes = HLBT::add($CatalogEntityData);
$ProductAssignEntityDataRes = HLBT::add($ProductAssignEntityData);
$UsersAssignEntityDataRes = HLBT::add($UsersAssignEntityData);

$HLCatalogId = $CatalogEntityDataRes->getId();
$HLProductAssignId = $ProductAssignEntityDataRes->getId();
$HLUsersAssignId = $UsersAssignEntityDataRes->getId();
if($HLCatalogId || $HLProductAssignId || $HLUsersAssignId){
    $oUserTypeEntity    = new CUserTypeEntity();
 
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLCatalogId,
	    'FIELD_NAME'        => 'UF_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_CATALOG_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLCatalogId,
	    'FIELD_NAME'        => 'UF_NAME',
	    'USER_TYPE_ID'      => 'string',
		'XML_ID'            => 'XML_CATALOG_NAME',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLProductAssignId,
	    'FIELD_NAME'        => 'UF_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLProductAssignId,
	    'FIELD_NAME'        => 'UF_CATALOG_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_CATALOG_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLProductAssignId,
	    'FIELD_NAME'        => 'UF_PRODUCT_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_PRODUCT_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLUsersAssignId,
	    'FIELD_NAME'        => 'UF_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLUsersAssignId,
	    'FIELD_NAME'        => 'UF_USER_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_USER_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	$aUserFields[]    = array(
	    'ENTITY_ID'         => 'HLBLOCK_' .$HLUsersAssignId,
	    'FIELD_NAME'        => 'UF_CATALOG_ID',
	    'USER_TYPE_ID'      => 'integer',
		'XML_ID'            => 'XML_CATALOG_ID',
		'SORT'              => 500,
		'MULTIPLE'          => 'N',
	    'MANDATORY'         => 'Y',
	    'SHOW_FILTER'       => 'N',
	    'SHOW_IN_LIST'      => '',
	    'EDIT_IN_LIST'      => '',
	    'IS_SEARCHABLE'     => 'N',
	);
	foreach ($aUserFields as $field) {
		$oUserTypeEntity->Add($field);
	}

}else{
	echo 'Блоки уже созданы';
}
