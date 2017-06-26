<?php
/**
 * Class CRM_Xeroitems_Item.
 *
 * Extends CRM_Civixero_Base to provide coded item information.
 */
class CRM_Xeroitems_Item extends CRM_Civixero_Base {
  // Stores known line items set we only have to get once per run.
  protected static $itemCache = array();

  // Get a list of inventory items from the connected Xero
  public function getItems($connector_id = 0) {
    if(!array_key_exists($connector_id, self::$itemCache)){
      try {
        $xero =& $this->getSingleton($connector_id);

        self::$itemCache[$connector_id] = $xero->Items();
      } catch (Exception $e) {
        Civi::log()->error(ts('Exception getting Item codes: %1', array($e->getMessage())));
        self::$itemCache[$connector_id] = array();
      }
    }
    
    return self::$itemCache[$connector_id]['Items']['Item'];
  }
}