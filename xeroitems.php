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
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function xeroitems_civicrm_install() {
  _xeroitems_civix_civicrm_install();
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
