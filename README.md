php_download_docs
=================

A PHP program to allow users to download documents via a validation form.

Objective:
Acme, Inc. has created a cool software plugin that users can download and use for free. However, there are two problems with this software:

	• It only works on Macintosh machines with the Firefox browser or Windows machines with the Internet Explorer browser or the Firefox browser.
	• Hackers have been downloading it for shady purposes, so Acme must block all IP addresses starting with "202." from downloading it.
	
It's up to you to create a PHP script for Acme that contains the "Download Now!" link or button. That link or button should not show up unless it is feasable and legal for the user to download the plugin, so use environment variables to detect the user's information.

If the user is on the wrong computer/browser combination, tell him so and direct him to a possible solution (ie. a page to download Firefox for Macs).

If the user's IP address starts with "202.", give a different message and do not allow him in.
Good luck! When you're finished, hand in your PHP script.

