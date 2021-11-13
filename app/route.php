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
App::postAction('/nedmin/admins', '/nedmin/adminsSortable', true, "backend");
App::getAction('/nedmin/admins/update/([0-9a-zA-Z-_]+)', '/nedmin/adminsUpdate/([0-9a-zA-Z-_]+)', true, "backend");
App::postAction('/nedmin/admins/update/adminsUpdateOp', '/nedmin/adminsUpdateOp', true, "backend");
App::postAction('/nedmin/admins/insert/adminsInsertOp', '/nedmin/adminsInsertOp', true, "backend");
App::getAction('/nedmin/admins/delete/([0-9a-zA-Z-_]+)', '/nedmin/adminsDelete/([0-9a-zA-Z-_]+)', true, "backend");

//SLİDERS
App::getAction('/nedmin/sliders', '/nedmin/sliders', true, "backend");
App::postAction('/nedmin/sliders/insert/slidersInsertOp', '/nedmin/slidersInsertOp', true, "backend");
App::getAction('/nedmin/sliders/delete/([0-9a-zA-Z-_]+)', '/nedmin/slidersDelete/([0-9a-zA-Z-_]+)', true, "backend");
App::postAction('/nedmin/sliders', '/nedmin/slidersSortable', true, "backend");

//BLOGS
App::getAction('/nedmin/blogs', '/nedmin/blogs', true, "backend");
App::postAction('/nedmin/blogs/insert/blogsInsertOp', '/nedmin/blogsInsertOp', true, "backend");
App::getAction('/nedmin/blogs/update/([0-9a-zA-Z-_]+)', '/nedmin/blogsUpdate/([0-9a-zA-Z-_]+)', true, "backend");
App::postAction('/nedmin/blogs/update/blogsUpdateOp', '/nedmin/blogsUpdateOp', true, "backend");
App::getAction('/nedmin/blogs/delete/([0-9a-zA-Z-_]+)', '/nedmin/blogsDelete/([0-9a-zA-Z-_]+)', true, "backend");
App::postAction('/nedmin/blogs', '/nedmin/blogsSortable', true, "backend");


//ABOUTS
App::getAction('/nedmin/abouts', '/nedmin/abouts', true, "backend");
App::postAction('/nedmin/abouts/insert/aboutsInsertOp', '/nedmin/aboutsInsertOp', true, "backend");
App::getAction('/nedmin/abouts/update/([0-9a-zA-Z-_]+)', '/nedmin/aboutsUpdate/([0-9a-zA-Z-_]+)', true, "backend");
App::postAction('/nedmin/abouts/update/aboutsUpdateOp', '/nedmin/aboutsUpdateOp', true, "backend");
App::getAction('/nedmin/abouts/delete/([0-9a-zA-Z-_]+)', '/nedmin/aboutsDelete/([0-9a-zA-Z-_]+)', true, "backend");
App::postAction('/nedmin/abouts', '/nedmin/aboutsSortable', true, "backend");




