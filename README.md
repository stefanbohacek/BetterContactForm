Better Contact Form
=================
![A better contact form experience](/screenshot.png)


This is more of an idea for UX improvement rather than a complete solution<sup>1</sup>. My proposal is to: 

1. allow your visitors to include any form of contact on your contact form (eg: phone number or Twitter handle instead of an email)

2. include an option to use user's email client if he or she really doesn't like contact forms

To try the form, download the code from this repository and change the mail.php, specifically these two parts: 

	$recipient = "your@email.com";
	...
	<a href=\"http://YOURSITE.COM\">

Also, in index.html:

	<a id="contactmelink" onclick="javascript:sendEmail();" href="mailto:your@email.com">Send me an email</a>


I am including two versions of the form, a simple one (which has one small issue<sup>2</sup>)

***
<sup>1</sup> These contact forms don't validate the email, which is pretty much the whole point. If your visitor wants to use a fake email, it is not hard to make one up. If you go as far as to try to see if the email really exists, it is still trivial to bypass your form by creating yet another free email account.

Furthermore, I am using a very simple implementation of the honeypot technique to prevent spam. You can read more about this method here: http://nedbatchelder.com/text/stopbots.html (or just google it). 

<sup>2</sup> If your visitor uses Gmail as their default email client and attempts to show the form, he or she will automatically open a new email in Gmail. The "fancy" version doesn't have this issue and the only solution I came up with is to remove the non-javascript fallback, that is in index.html change this:

	<a id="contactmelink" onclick="javascript:sendEmail();" href="mailto:your@email.com">Send me an email</a>

To this:

	<a id="contactmelink" onclick="javascript:sendEmail(); return false;" href="#">Send me an email</a>