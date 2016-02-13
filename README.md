# Testimonial

Testimonial widget to your page.

#requirements

Cake Php 3.0

http://book.cakephp.org/3.0/en/installation.html

After You install cakephp 3.0, please configure default e-mail transport for emails and database.

Database schema is in config/db.sql

#wordpress

just go to businesses. add business, then add testimonial, specify client. e-mail will be sent to him to write testimonial, once he writes, copy snippet from businesses according to your selected business and cpy paste it to your site.

use snippet in wordpress using this plugin - code embed. it embeds your snippet so wordpress works properly with javascript.

https://wordpress.org/plugins/simple-embed-code/

#thing need to change to have own testimonial system:

1) create user and password for first time.
just uncomment in AppController that part with initialisation with Auth.

```
$this->loadComponent('Auth', [
    'authenticate' => [
        'Form' => [
            'fields' => [
                'username' => 'email',
                'password' => 'password'
            ]
        ]
    ],
    'loginAction' => [
        'controller' => 'Users',
        'action' => 'login'
    ]
]);

// Allow the display action so our pages controller
// continues to work.
$this->Auth->allow(['display']);
if ($this->request->is('json')) {
    $this->Auth->allow(['index', 'view']);
}
```
by commenting this, you turn off auth and can create new user.

2) modify src/Controller/TestimonialController to prepare e-mail to your host - this needs to be changed to website address.

3) modify snippet generation tool in src/Templates/Businesses/snippet.ctp to use website address to retrieve data.
