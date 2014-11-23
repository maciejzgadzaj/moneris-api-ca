# Moneris API (Canada) library

Improved Moneris library for Moneris API (Canada) payment method.


### Payment methods

Moneris API payment method description:
https://developer.moneris.com/Downloads/Canada/API.aspx


### Original library

Original version 2.5.6 of this library can be found at:
https://developer.moneris.com/Downloads/Canada/API/Basic%20Transaction%20Functions.aspx


### Changes

Original library was updated to support the following new features:

* [support for production servers]

  Original library has test server hostname hardcoded in mpgGlobals class.
  To use the production server the library needs to be manually edited
  (see Chapter 24 "How Do I Configure My Store For Production?" of eSelectPlus
  Merchant Integration Guide). This change adds both test and production server
  hostnames, and the required one could be selected using a new optional
  parameter to mpgHttpsPost::mpgHttpsPost() method.

* [support for CA root certificates]

  Original library doesn't support using CA root certificate out of the box,
  forcing a user to modify the library manually if they want to use this (see
  Chapter 21 "How Do I Test My Solution?" of eSelectPlus Merchant Integration
  Guide). This change introduces this feature, providing an option to specify
  certificate file path in a new optional parameter to
  mpgHttpsPost::mpgHttpsPost() method.

* [support for fetching cURL responses]

  Original cURL response and error message (if any) are not being made available
  by the library to the calling system. Original library returns vague "Global
  Error Receipt" error instead. This update provides two new methods of
  mpgHttpsPost class to get original cURL response and cURL error (if any).




[support for production servers]:https://github.com/maciejzgadzaj/moneris-api-us/commit/1bd437c228eaa460863d367643242b053dcca852
[support for CA root certificates]:https://github.com/maciejzgadzaj/moneris-api-us/commit/0b17cd66748e629d247c7502fc650dc0cfe113d0
[support for fetching cURL responses]:https://github.com/maciejzgadzaj/moneris-api-us/commit/70cdc03da8d4772719cd346442722a1c57d7d567
