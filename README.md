au.com.agileware.xeroitems
==========================

Extends [nz.co.fuzion.civixero](https://github.com/eileenmcnaughton/nz.co.fuzion.civixero)
replacing account codes with item codes.

Installation & set-up
---------------------

1. First ensure that `nz.co.fusion.civixero` is installed.  This extension will not
   work with any other `nz.co.fuzion.accountsync` based accounting synchronisation
   packages; for error free operation, ensure that these are not enabled.
2. Download the extension to your extensions folder, then enable it from with
   CiviCRM.
3. In your Financial Accounts set up (Administer / CiviContribute / 
   Financial Accounts), set your "ACCTG CODE" values to the codes of your items
   in Xero.

How it works
------------

`Xeroitems` hooks into the `Civixero` push process for invoices, replacing
Account odes with Item codes in line items if the financial account of a line
item matches the code of an Inventory Item in your linked Xero account. In the
case that a matching Item is not found, the line ttem is not modified and falls
back to submitting the line item against an account. If an accounting code
matches *both* an Item and an Account, the **Item** is used.

Author
------

[Agileware](https://agileware.com.au) <projects@agileware.com.au>

Development of this extension was sponsored by [Diversity Council Australia](https://www.dca.org.au)


