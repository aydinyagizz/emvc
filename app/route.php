<?php
/*linklerimizi modüllere yönlendirme sistemimiz.
false, true olayı ise güvenlik olayıdır. false ise güvenlik yok, o sayfalara erişilebilir demek.
*/

App::getAction('/', '/', false);
//App::getAction('/index', '/default/index', false);

//App::getAction('/default/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', '/default/dashboard/([0-9a-zA-Z-_]+)/([0-9a-zA-Z-_]+)', false);



//nedmin routeleri
App::getAction('/nedmin', '/nedmin/index', true, "backend");
App::getAction('/nedmin/login', '/nedmin/login');
//logout işlemi
App::getAction('/nedmin/logout', '/nedmin/logout');

App::postAction("/nedmin/login", "/nedmin/loginControl");


//Settings
App::getAction('/nedmin/settings', '/nedmin/settings', true, "backend");
App::getAction('/nedmin/settings/update/([0-9a-zA-Z-_]+)', '/nedmin/settingsUpdate/([0-9a-zA-Z-_]+)', true, "backend");

App::postAction('/nedmin/settings/update/settingsUpdateOp', '/nedmin/settingsUpdateOp', true, "backend");

//ADMİNS
App::getAction('/nedmin/admins', '/nedmin/admins', true, "backend");
