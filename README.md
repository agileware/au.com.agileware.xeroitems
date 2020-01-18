# Xero Items

A [CiviCRM](https://civicrm.org) extension which add functionality to the CiviXero Extension, 
[nz.co.fuzion.civixero](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero)
replacing Xero account codes with Xero item codes (also referred to as Xero inventory items). Read more information about Xero inventory items:
1. https://help.xero.com/nz/Inventory
2. Set up in your Xero account, https://go.xero.com/Accounts/Inventory
3. Xero API, https://developer.xero.com/documentation/api/items

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.6+
* CiviCRM 5.x
* [Civixero extension](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero)
* [Accountsync extension](https://github.com/eileenmcnaughton/nz.co.fuzion.accountsync)

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

## Configuration

In CiviCRM, open each Financial Account (Administer / CiviContribute / Financial Accounts) and set the "ACCTG CODE" values to the codes of your items in Xero.

## How it works

`Xeroitems` hooks into the `Civixero` push process for invoices, replacing
Account codes with Item codes in line items if the financial account of a line
item matches the code of an Inventory Item in your linked Xero account. In the
case that a matching Item is not found, the line item is not modified and falls
back to submitting the line item against an account. If an accounting code
matches *both* an Item and an Account, the **Item** is used.

About the Authors
-----------------

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