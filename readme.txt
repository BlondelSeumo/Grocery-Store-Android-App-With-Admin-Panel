Hi this is the (1.5, Released Date : 30-03-2018) version of our app we will continiously gives you update in this app. User can get our support through codecanyon comments and add us on skype : subhash.sanghani

Thanks..

Demo Adminpanel 
URL : http://iclauncher.com/grocery
user : admin@gmail.com
pass : terminal

Demp App
user : user@gmail.com
pass : terminal

/**************************** V 1.6 **********************************/

ADDED Order Date and Stock revert back on cancel order. 

1. Update in database :

ALTER TABLE `sale` ADD `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `delivery_charge`;

By do above query add one extra field in Sale table 


2. Replace Language folder or add follwoing keywords in ps_lang.php file

$lang["Order Date :"] = "Order Date :"; 
$lang["Delivery Date :"] = "Delivery Date :";
$lang["Delivery Details :"] = "Delivery Details :";
$lang["Order Date"] = "Order Date";

3. Replace following files

admin/orders/orderdetails.php
admin/orders/orderslist.php
admin/dashboard.php




/**************************** V 1.5 **********************************/
Release Note
Version : 1.5
Released Date : 30-03-2018

Fix issue of PHP version 7.0 and compatible with it.

replace folders : 

system
application/controllers
application/models
application/views

replace file :
index.php

edit file :
application/config/config.php

Line 376 : $config['sess_driver'] = 'database';
Line 379 : $config['sess_save_path'] = 'ci_sessions';


Database Update :
Add new table with following script :


CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);


/**************************** V 1.4 **********************************/

Fix Issue:
1) Product Description (new)
2) Edit admin user Profile (new)
3) Alloe Decimal price
4) Closing Hours Delete (Fix)
5) Parent Categories display in list
  
-->Android App Code Change Log:
adapter
1) Cart_adapter.java
2) Product_adapter.java

fragment
1) Cart_fragment.java
2) Delivery_fragment.java
3) Delivery_payment_detail_fragment.java

layout
1) dialog_product_detail.xml

string.xml
1) <string name="description">Description:</string>

 

/**************************** V 1.3 **********************************/
Release Note
Version : 1.3
Released Date : 06 Sept 2017

Fix Issue, Product Image Load Fast
Go to Folder : app/src/main/java/Adapter
1) Cart_adapter.java
2) Home_adapter.java
3) My_order_detail_adapter.java
4) Product_adapter.java

/**************************** V 1.2 **********************************/
Release Note
Version : 1.2
Released Date : 03 Sept 2017

Fix bug in Register App user list
1)  application/models/Product_model.php
2)  application/views/admin/allusers.php

/**************************** V 1.1 **********************************/
Version : 1.1
Released Date : 08 Aug 2017
1)  Search Bug Fixed 
2)  Address list Radio button issue fix
3)  if any category no have subcategory then product display in main category in app.
4)  Forgot password email configuration view change ( Read in Documation file) 
5)  in add category and edit category Bug Fixed
6)  remove required pincode in app.
7)  change image upload library 
8)  Product zoom (New)
9)  Delivery charges add in app order details page.
10) Order status panding then show "cancle order" button othrewise hide
11) Admin password change issue fix in User management menu.
12) Order Display descending order.
13) Replace UNIQUE key user_phone To user_email in registers and users table.(In Database)  
14) Change in feild name in app and database.  


