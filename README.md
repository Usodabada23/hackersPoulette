# Hackers Poulette

-   Type of challenge: `consolidation`, DUO OR SOLO
-   Repository: `hackers-poulette`
-   Duration: `3 days`

CAUTION: This project will use PHP. Github page doesn't support PHP. So you will have to use a host to deploy your project. You can use [00webhost](https://www.000webhost.com/) or any other free hosting service you can find. A personnal host (OVH, Gandi, etc.) **IF YOU HAVE ONE**, or have some money to spare to buy a domain name and a hosting plan. This is **not** a requirement to have a personal host.

## The mission

The company _Hackers Poulette ™_ sells Raspberry Pi accessory kits to build
your own. They want to allow their users to contact their support team. Your
mission is to create a fully-functioning online "contact support" form, in _PHP_. It must _display a contact form_ and _process the received answer_ (sanitize, validate, answer the user).

## The form

At the minimum the form should include the following fields:

-   name
    > required, string, at least 2 char, max 255
-   firstname
    > required, string, at least 2 char, max 255
-   email address
    > required, at least 2 char, max 255, must be a valid email address
-   file
    > optional, must be a valid file type (jpg, png, gif) ( OR a link to platform hosting your image ex: cloudinary), size max 2MB
-   description
    > required, at least 2 char, max 1000 char

## 🌱 Must-have features

-   Use of PHP
-   Database with PDO connection
-   The form's html code _must_ be [semantically valid](https://www.w3.org/2001/sw/wiki/W3C_Validator) and [accessible](https://formspree.io/blog/accessible-forms/)
-   Client side validation with _JavaScript_
-   Work on a good and clear _user experience_ (UX)
-   Use libraries such as Bulma, Tailwind, Bootstrap, ...
-   In case of wrong input, the form should display a useful visual clue about the error, **below** each inputs fields.
-   The error messages must be readable and helpful to users.
-   The data has to be _sanitised_ and _validated_ (server side)
-   Once the form is validated, the data should be send to the database.
-   Spam prevention using [captcha](https://www.google.com/search?q=captcha+spam+prevention)

### 🌼 Nice-to-have

Once you have ticked all the above boxes, you can add some of the following features:

-   If all required inputs are valid, the script should respond by email to a given address, confirming the reception of the message. (you can use your own address for testing purposes)
-   Discover [composer](https://getcomposer.org/doc/00-intro.md) and use it to install a PHP library such as [SwiftMailer](https://symfony.com/doc/current/mailer.html) to send the email or to validate the form with library such as [rakit/validation](https://github.com/rakit/validation), [valitron](https://github.com/vlucas/valitron) or [symfony/mailer](https://symfony.com/doc/current/mailer.html)
-   Protect your form against the most common attacks (CSRF, XSS, SQL injection, etc.) ressources: [OWASP](https://owasp.org/www-project-top-ten/), [OWASP Cheat Sheet XSS](https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html), [OWASP Cheat Sheet SQL injection](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html)


### 🌴 Great-to-have


-   Create a dashboard to display the received messages (admin side) which allow to manage the messages status (handled, not handled, response, etc..) 

### Resources

-   [error message](http://uxmas.com/2012/the-4-hs-of-writing-error-messages)
-   [class mailer](https://github.com/PHPMailer/PHPMailer)
-   [accessible form](https://formspree.io/blog/accessible-forms/)
-   [semantically valid](https://www.w3.org/2001/sw/wiki/W3C_Validator)
