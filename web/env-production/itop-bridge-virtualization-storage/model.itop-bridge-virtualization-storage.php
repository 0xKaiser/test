<?php
//
// File generated by ... on the 2024-04-02T09:30:43+0200
// Please do not edit manually
//

/**
 * Classes and menus for itop-bridge-virtualization-storage (version 3.1.0)
 *
 * @author      iTop compiler
 * @license     http://opensource.org/licenses/AGPL-3.0
 */



class lnkVirtualDeviceToVolume extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array(			'category' => 'bizmodel,configmgmt',
			'key_type' => 'autoincrement',
			'is_link' => true,
			'name_attcode' => array('virtualdevice_name', 'volume_name'),
			'image_attcode' => '',
			'state_attcode' => '',
			'reconc_keys' => array(),
			'db_table' => 'lnkvirtualdevicetovolume',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'style' =>  new ormStyle(null, null, null, null, null, null),
			'uniqueness_rules' => array (
  'no_duplicate' => 
  array (
    'attributes' => 
    array (
      0 => 'volume_id',
      1 => 'virtualdevice_id',
    ),
    'filter' => '',
    'disabled' => false,
    'is_blocking' => true,
  ),
),);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("volume_id", array("targetclass"=>'LogicalVolume', "allowed_values"=>null, "sql"=>'volume_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "display_style"=>'select', "create_temporary_object"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("volume_name", array("extkey_attcode"=>'volume_id', "target_attcode"=>'name', "allowed_values"=>null, "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("virtualdevice_id", array("targetclass"=>'VirtualDevice', "allowed_values"=>null, "sql"=>'virtualdevice_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "display_style"=>'select', "create_temporary_object"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("virtualdevice_name", array("extkey_attcode"=>'virtualdevice_id', "target_attcode"=>'name', "allowed_values"=>null, "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("size_used", array("sql"=>'size_used', "is_null_allowed"=>true, "default_value"=>'', "allowed_values"=>null, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'virtualdevice_id',
  1 => 'volume_id',
  2 => 'size_used',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'volume_id',
  1 => 'virtualdevice_id',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'virtualdevice_id',
  1 => 'volume_id',
  2 => 'size_used',
));
;
	}


}