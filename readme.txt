=== Website Registration ===
Contributors: Freelynx  
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LTUB9HAHBXTHJ
Tags: website, registration, metadata, bookmark, links
Requires at least: 3.0.3
Tested up to: 3.0.4
Stable tag: 1.3.3
License: GPLv2

== Description ==

Website Registration records metadata information embeded in a website, namely url, title, author, keywords and description. This plugin might be useful when you want to save pages or domains of websites and share them to public. It's a bookmark-like. As an additional feature, this plugin may also allow public user to be contributed to the list of the url.

WARNING: If you've already used version 0.1 please deactivate the plugin first before updating to other version. Otherwise your database would be so ugly.

The plugin provides several different ready-to-use shortcodes:

1. [wr_form] : Displaying the form for URLs to be submitted based on Admin selection.
2. [wr_form_domain] : Displaying the form for submitting domain of the given URLs.
3. [wr_form_page] : Displaying the form for submitting page of given URLs.
4. [wr_list] : Displaying the list selected by administrator.
5. [wr_list_domain] : Displaying the list of collected domain.
6. [wr_list_page] : Displaying the list of collected pages.
7. [wr_filter_search] : Search the contents.


== Installation ==

1. Download Website Registration plugin
2. Extract the .zip package you've just downloaded
2. Upload all files and folders into your wp-content/plugins directory
3. Activate the plugin


== Screenshots ==
Screenshot is available on my blog 

http://freelynx.wordpress.com/2011/01/04/wordpress-plugin-website-registration/


== Frequently Asked Questions ==

The more detail and technical FAQ is available in the admin page of the plugin.

= What does this plugin do? =

In a simple term: Records IP Address, Title, Authors, Keywords, and Description of a website.

= How can I use it? =

Just type a domain or website, i.e. http://yahoo.com in the form on the Website Registration Setting Page then press Submit. You'll find what this plugin actually do.

= Can I use this form on my frontend page? =

Yes you can. 

= Do I always need to write the protocol like 'http://' ? =

Absolutely! it's part of the valid URL.

= In that case what kind of protocol that is allowed? =

http, https, and ftp

= I got a strange behaviour when I use this plugin on my frontend page. What's wrong? =

It depends. But the first thing that you need to check is that the permalinks should not be set as a 'Default'. If this does not fix the issues then please email and let me know.
 
= Can I choose which metadata to be display? =

Yes, absolutely.
 
= Can I edit the url and its metadata? =

Sorry, no.

= Can I filter or search the result? =

Yes, finally!

= Is this plugin a crawler? =

Nope. Not even remotely.

= Can I export the result as an XML or JSon? =

No. But soon in the next release.


== Changelog ==

= 1.3.3 =
* NEW FEATURE: confirming and Removing multi-url
* NEW FEATURE: Filtering confirmed/unconfirmed on Admin page
* NEW FEATURE: Searching the database.
* Fixed bug: pagination on frontend page

= 1.0.2 =
* Fixed bug: allowed URL which contains '-'.

= 1.0.1 =
* Fixed some error for the documentation and file management.

= 1.0 =
* NEW FEATURE: Added new shortcode for frontend form and list.
* NEW FEATURE: The number of pages may be customed by administrator.
* NEW FEATURE: Confirmation status for all URL that is submitted via frontend page
* NEW FEATURE: You may choose which metadata to be displayed for you blog/site
* NEW FEATURE: The plugin has the ability to store metadata not just for domain but page as well
* Added animation to hide/show the widgets contents. 
* Added Plugin Settings for set up the record url and display options
* fixed mixing url between domain and page
* changed the default order in the list
* fixed bug pagination when sorting the list 
* Removed [website_registration*] shortcode

= 0.1 =
* Initial version  

== Upgrade Notice ==

= 1.0 =
This version fixed major bugs. Update immediately!

= 0.1 =
No upgrade notice at this moment

