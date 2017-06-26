<?php

require_once 'xeroitems.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function xeroitems_civicrm_config(&$config) {
  _xeroitems_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function xeroitems_civicrm_xmlMenu(&$files) {
  _xeroitems_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function xeroitems_civicrm_install() {
  _xeroitems_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function xeroitems_civicrm_uninstall() {
  _xeroitems_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function xeroitems_civicrm_enable() {
  _xeroitems_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function xeroitems_civicrm_disable() {
  _xeroitems_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function xeroitems_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _xeroitems_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function xeroitems_civicrm_managed(&$entities) {
  _xeroitems_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function xeroitems_civicrm_caseTypes(&$caseTypes) {
  _xeroitems_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function xeroitems_civicrm_angularModules(&$angularModules) {
_xeroitems_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function xeroitems_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _xeroitems_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/** 
 * Implements hook_civicrm_accountPushAlterMapped().
 */
function xeroitems_civicrm_accountPushAlterMapped($entity, &$data, &$save, &$params) {
  // Only need to alter invoices
  if ($entity == 'invoice') {
    // Get a list of Items from Xero.
    $items = new CRM_Xeroitems_Item();
    $items = $items->getItems();

    // Loop through line items, converting AccountCode to ItemCode where applicable
    foreach($params['LineItems']['LineItem'] as &$line_item) {
      if(array_filter($items, function($item) use ($line_item) {
        return($item['Code'] == $line_item['AccountCode']);
      })){
        // We found at least one Item that matched the Code, so switch.
        $line_item['ItemCode'] = $line_item['AccountCode'];
        unset($line_item['AccountCode']);
      }
    }
  }
}