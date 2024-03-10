<?php
require 'vendor/autoload.php';

use Mailgun\Mailgun;
    $mg = Mailgun::create('686e9842ad45076eb982fbf7094d576b-2c441066-f9fb7433');

    $domain = "sandboxf8f9d363232f43969137ab413e9e798a.mailgun.org";

    $mg->messages()->send("$domain",
    array('from'    => 'Mailgun Sandbox <postmaster@sandboxf8f9d363232f43969137ab413e9e798a.mailgun.org>',
    'to'      => 'Raju <104055570@student.swin.edu.au>',
    'subject' => 'Hello Raju',
    'text'    => 'Congratulations Raju, you just sent an email with Mailgun! You are truly awesome! '));

    // You can see a record of this email in your logs: https://app.mailgun.com/app/logs.

    // You can send up to 300 emails/day from this sandbox server.
    // Next, you should add your own domain so you can send 10000 emails/month for free.
?>