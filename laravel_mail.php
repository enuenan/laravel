<!-- IN CONTROLLER -->

$this->subject = $obj->subject;

Mail::send('website.pages.email.query', ['obj' => $obj], function ($message) {
    $message->to('emoammerfershid@gmail.com', 'Enan');
    $message->to('akakib.ctg@gmail.com', 'Akib');
    $message->to('top5way.service@gmail.com', 'Top5Way');
    $message->subject($this->subject);
});


<!-- IN .env FILE -->
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587 
MAIL_USERNAME=__EMAIL__@gmail.com
MAIL_PASSWORD=PASS
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=__EMAIL__@gmail.com
MAIL_FROM_NAME="${APP_NAME}"