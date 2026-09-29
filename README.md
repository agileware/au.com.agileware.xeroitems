# Xero Items (au.com.agileware.xeroitems)

A [CiviCRM](https://civicrm.org) extension which adds functionality to the CiviXero extension,
[nz.co.fuzion.civixero](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero),
replacing Xero account codes with Xero item codes (also referred to as Xero inventory items) when
invoices are pushed from CiviCRM to Xero. Read more information about Xero inventory items:
1. https://help.xero.com/nz/Inventory
2. Set up in your Xero account, https://go.xero.com/Accounts/Inventory
3. Xero API, https://developer.xero.com/documentation/api/items

## Purpose

CiviXero pushes CiviCRM invoices to Xero using Account codes, taken from the "ACCTG CODE" set on
each CiviCRM Financial Account. Some organisations instead track their income against Xero
Inventory Items rather than (or as well as) Chart of Accounts codes. Xero Items solves this by
checking, for each invoice line item being pushed, whether the Account code on that line item
matches the code of an Inventory Item in the connected Xero organisation. If a match is found, the
line item is sent to Xero as an Item rather than an Account, so it lands against the correct
Inventory Item.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Usage

Xero Items requires no day-to-day interaction. It does not add any new CiviCRM menu items,
settings pages, CiviRule actions, or Scheduled Jobs. Once installed, enabled, and configured (see
[Special configuration requirements](#special-configuration-requirements) below), it works
automatically in the background:

* Whenever CiviXero pushes an invoice to Xero (via its normal push process, whether run manually or
  via CiviXero's Scheduled Job), Xero Items intercepts each line item before it is sent.
* For each line item, it checks the list of Inventory Items in the connected Xero organisation for
  one whose Code matches the line item's Account code.
* If a matching Item is found, the line item is submitted to Xero with an `ItemCode` instead of an
  `AccountCode`.
* If no matching Item is found, the line item is left unchanged and is submitted against the
  Account code as usual.
* If an Account code happens to match both an Item code and an Account code in Xero, the **Item**
  takes precedence.

## Special configuration requirements

Xero Items has no settings page of its own. It relies entirely on CiviXero being installed and
already connected to a Xero organisation (Xero OAuth credentials are configured through CiviXero,
not this extension). Beyond that, the only configuration required is:

* In CiviCRM, open each relevant Financial Account (Administer » CiviContribute » Financial
  Accounts) and set the "ACCTG CODE" field to match the Code of the corresponding Inventory Item in
  Xero.

No additional CiviCRM permissions are required beyond those already needed to use CiviXero.

## Requirements

* PHP v5.6+
* [CiviCRM 5.x](https://civicrm.org/download)
* [CiviXero extension](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero)
* [AccountSync extension](https://github.com/eileenmcnaughton/nz.co.fuzion.accountsync)

## Installation (Web UI)

[Download the extension](https://github.com/agileware/au.com.agileware.xeroitems/archive/master.zip), and extract into your custom extensions directory, then enable via the Extensions admin page (normally via Administer » System Settings » Extensions)

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl au.com.agileware.xeroitems@https://github.com/agileware/au.com.agileware.xeroitems/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/agileware/au.com.agileware.xeroitems.git
cv en xeroitems
```

## About the Authors

This CiviCRM extension was developed by the team at [Agileware](https://agileware.com.au) with support from the [Diversity Council Australia](https://www.dca.org.au).

[Agileware](https://agileware.com.au) provide a range of CiviCRM services including:

  * CiviCRM migration
  * CiviCRM integration
  * CiviCRM extension development
  * CiviCRM support
  * CiviCRM hosting
  * CiviCRM remote training services

Support your Australian [CiviCRM](https://civicrm.org) developers, [contact Agileware](https://agileware.com.au/contact) today!

![Agileware](logo/agileware-logo.png)