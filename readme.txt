=== Hide Shipping Methods based on Shipping Class and Zone ===
Contributors: pluginhive
Stable tag: 1.0.2
Tags: WooCommerce, Wordpress, Shipping addon, Hide shipping methods, Hide based on shipping class or zone
Requires at least: 3.0.1
Tested up to: 4.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

= Introduction =

This plugin can be used to hide shipping methods based on shipping class and shipping zones. It works in conjunction with any of the shipping plugins from XAdapter like FedEx, UPS, Canada Post, etc.

Here is a video which shows how to hide shipping options based on shipping class.
https://www.youtube.com/watch?v=xTvxNKZayGM
In this video, the plugin is used with WooCommerce FedEx shipping plugin from XAdapter. As soon as the customer adds a product from the shipping class, the shipping method which is configured in the plugin, will not be visible for the customers.


Here is a video which shows how to hide shipping options based on shipping zones.
https://www.youtube.com/watch?v=XOrAO3lhAPo
In this video, the plugin is used with WooCommerce UPS shipping plugin from XAdapter. As soon as the customer provides a destination which falls in the defined shipping zone, the shipping method which is configured in the plugin, will not be visible for the customers.

The plugin allows you to hide shipping methods in the following way :
1. Break when the first rule is satisfied
2. Consider each rule as a separate entity


<b>Break when the first rule is satisfied :</b>
Suppose you have created multiple rules in the plugin. Now, if the first rule is satisfied, then the plugin will no longer check the other rules. So if you have framed 3 rules that hide shipping methods "Ground", "2 Day", "Express", then in this case only "Ground" will be hidden as this rule is satisfied first.


<b>Consider each rule as a separate entity :</b>
In this case, all rules will be considered while hiding the shipping methods. So if you have framed 3 rules that hide shipping methods "Ground", "2 Day", "Express", then all 3 of them will be hidden.

<blockquote>
IMPORTANT NOTE:
This is NOT an independent plugin. To use this plugin, you need to have any one of the following plugin :
<a rel="nofollow" href="https://www.xadapter.com/product/woocommerce-fedex-shipping-plugin-with-print-label/" target="_blank">WooForce FedEx Shipping Plugin</a>,
<a rel="nofollow" href="https://www.xadapter.com/product/woocommerce-ups-shipping-plugin-with-print-label/" target="_blank">WooCommerce UPS shipping plugin</a>,
<a rel="nofollow" href="https://www.xadapter.com/product/woocommerce-canada-post-shipping-plugin-with-print-label/" target="_blank">WooCommerce Canada Post plugin</a>,
<a rel="nofollow" href="https://www.xadapter.com/product/woocommerce-stamps-com-shipping-plugin-with-usps-postage/" target="_blank">Stamps.com Shipping Plugin</a> or
<a rel="nofollow" href="https://www.xadapter.com/product/woocommerce-usps-shipping-plugin-with-print-label/" target="_blank">WooCommerce USPS Shipping Plugin with Print Label</a>
</blockquote>

= HOW DOES IT WORK? =
Step 1: Install our FedEx or DHL shipping plugin.
Step 2: Install this Add-on.
Step 3: For hiding a shipping method go to cart page, right click on the shipping method and click on inspect. Then get the value of the shipping method and place this in the "Shipping Method" field.
Step 4: Save the settings and you are ready!

= About XAdapter.com =

[XAdapter.com](https://www.xadapter.com/) creates quality WordPress/WooCommerce plugins that are easy to use and customize. We are proud to have thousands of customers actively using our plugins across the globe.


== Installation ==

1. Upload the plugin folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the Plugins menu in WordPress.
3. Thats it! you can now configure the plugin.

== Frequently Asked Questions ==

= Can we use this plugin with basic version of any shipping plugin ? =

Yes. You can do that with free version also.

= Can we use this plugin with flat rate ? =
Yes. You can.

== Screenshots ==

1. Settings Page

2. Cart Page with shipping method Value

3. Settings Page with details filled

4. Fedex Ground is hidden

== Changelog ==

= 1.0.2 =
* Content Change : Author details and contributors.

= 1.0.1 =
* Readme content change.

= 1.0.0 =
* Initial version.



== Upgrade Notice ==

=1.0.1=
* Readme content change

=1.0.0=
*initial version

