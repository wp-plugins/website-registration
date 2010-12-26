=== Website Registration ===
Contributors: Freelynx  
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LTUB9HAHBXTHJ
Tags: website, registration, metadata
Requires at least: 3.0.3
Tested up to: 3.0.3
Stable tag: 0.1
License: GPLv2

== Description ==

Website Registration records metadata information embeded in a website, 
namely url, title, author, keywords and description. 

As an admin or owner of a site/blog, you may have an option to use this 
website registration not just in the plugin page but also in the 
frontpage. Hence, you can ask people around the globe to contribute with 
list of website that you want to populate.


== Installation ==

1. Download Website Registration plugin
2. Extract the .zip package you've just downloaded
2. Upload all files and folders into your wp-content/plugins directory
3. Activate the plugin


== Screenshots ==
1. Website Registration setting page
2. Website Registration form on the frontend using Monochrome Theme
3. List of submitted websites on the frontend using Monochrome Theme 


== Changelog ==

= 0.1 =
* Initital version 


== Frequently Asked Questions ==

= What does this plugin do? =

In a simple term: Records IP Address, Title, Authors, Keywords, and 
Description of a website.

= How can I use it? =

Just type a domain or website, i.e. <code>http://yahoo.com</code> in the 
form on the Website Registration Setting Page then press Submit. You'll 
find what this plugin actually do.

= Can I use this form on my frontend page? =

Yes you can. See the left widget next to Donate widget.

= Is it same between <code>http://example.com</code> and <code>http://example.com/abc</code>? =

Yes. The plugin will only record the domain name which is 
<code>http://example.com</code>

= How about URL written in IP address, such as <code>http://74.125.235.16</code>? =

The plugin will treat them differently. So if you insert <code>
http://74.125.235.16</code> and <code>http://google.com</code> 
(both are the same host for Google Search Engine) to the form then the 
plugin will consider it as a different domain. It's not a bug. Just a 
limitation of the current version.

= How can I insert style for the list? =

Simply put, the listing table by default has embeded classes <code>
widefat</code> and <code>wr_display_list</code>, so you can add your 
css as you like in references to those classes, accordingly, and include 
them in your css file.

= Do I always need to write the protocol like <code>http://</code>? =

Absolutely! it's part of the valid URL. 

= In that case what kind of protocol that is allowed? =

http, https, and ftp 

= I got a strange behaviour when I use this plugin on my frontend page. What's wrong? =

It depends. But first thing you need to check is that the permalinks 
should not be set as a 'Default'. If this does not fix the issues then 
please <a href="http://codeindesign.com/id/about/">email</a> and let me 
know.
 
= How about port number like <code>http://example.com:8080</code>? =

Forgive this plugin but it's not allowed. If you specified the port number 
then it will mark as invalid URL. 

= Can I choose which metadata to be display? =

Sorry, you cannot do that in this version.
 
= Can I edit the url and its metadata? =

Sorry, no.

= Can I filter or search the result? =

No. But if you passion enough to wait for future release then soon will be 
yes.

= Is this plugin a crawler? =

Nope. Not even remotely.

= Can I export the result as an XML or JSon? =

No. But soon in the next release.

= Can I edit the entry? =

Definitely not, for now.


== Upgrade Notice ==

= 0.1 =
No upgrade notice at this moment


== License ==

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.