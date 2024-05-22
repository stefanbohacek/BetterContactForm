Better Contact Form
=================
![A better contact form experience](/screenshot.png)


This is more of an **idea for UX improvement** rather than a complete solution<sup>1</sup>. My proposal is to: 

1. allow your visitors to include **any form of contact** (eg: phone number or Twitter handle instead of an email)
2. include **an option to use user's email client**
3. allow the user to easily **copy the email address** and use it any way they please<sup>2</sup>
4. if your visitor uses an email in the form, **send them a confirmation email**
5. omit the **form reset button** (https://www.w3.org/Bugs/Public/show_bug.cgi?id=9406)

A big thanks to [Ayelet](https://github.com/ayeletdn) who helped me fix an annoying bug!

To try the form, download the code from this repository and update the following files to use your email address and website:

**In _mail.php_:**

```
$recipient = "your@email.com";
  ...
<a href=\"http://YOURSITE.COM\">
```
**In _index.html_:**
```
  <a id="contactmelink" onclick="javascript:sendEmail();" href="mailto:your@email.com">Send me an email</a>
```

I am including **two versions** of the form, a simple one and a fancier one that uses Twitter Bootstrap (Apache License: https://github.com/twbs/bootstrap/blob/master/LICENSE). You can preview them here (forms are not configured, so they will not send any emails):

* [simple](http://fourtonfish.com/bettercontactform/simple)
* [fancy](http://fourtonfish.com/bettercontactform/fancy)


***
<sup>1</sup> The mail script will try to prevent email injection by removing certain characters that allow adding CC and BCC email addresses. Also, HTML tags will be stripped. For more details see

```
function str_sanitize($str, $allow_nl)
```

in _mail.php_.


Furthermore, I am using **a very simple implementation of the honeypot technique** to prevent spam. You can read more about this method here: http://nedbatchelder.com/text/stopbots.html (or just google it). In a nutshell: you are creating a **hidden input field**, here called _fullname_. The _email.php_ script will check if the field was filled out (bots don't process CSS, so to them it will be visible).

One drawback of this technique is that the hidden field is visible to people using screen readers (or certain browsers), to which one simple solution is to use something like _"Ignore this field, thank you"_ for a title.

Again, this is **not a complete solution**, so please feel free to implement your own security method(s) here.

Also, you might want to check for empty fields (the form allows to send an empty message).

<sup>2</sup> This is useful for people who can't/don't change their default email clients. Think of someone clicking an email link, having to wait a few seconds while Outlook loads, then they go back to your site, right-click the link and copy the email.

***
  
Assorted Feedback and Suggestions
=================================
  
>Your multi-source contact info field cannot possibly reliably detect whether the user is entering a twitter, email, website, or other contact information. Not even with matching against strings/regex. You're gonna run into people putting unverifiable junk in that box, and people who don't specify what source the contact is from. The traditional way is to send an email to the address to see if it works. 

The use cases of this form don't require this. This form suits best personal websites where the visitor trying to get in touch with you is very likely to want to include proper contact information.

> You should look into APIs like http://www.fullcontact.com/developer that can find all of a user's social accounts just given his email.

> If you wanna see some "advanced" forms, check out http://wufoo.com 

The contact forms I made are just examples/blueprints, so I am intentionally keeping them simple. The real point is to show the UX ideas: the "multi-source contact info field", an option to use user's email client instead of forcing them to use the form and sending a confirmation email, if possible.

You can actually use wufoo.com while following these principles.

The actual forms only serve as a "clickable" example, which I think would be better than a mockup screenshot.


A Few Good Tips I Didn't Implement
==================================
  
- The _Name_ field is not really necessary, as it will likely be included in the email or the person's Twitter page. The visitor can also easily include their name in the message.
