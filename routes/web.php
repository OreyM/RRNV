<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return \Routing::redirect('dashboard');
});

Route::redirect('/php', '/phpinfo', 301);

Route::get('/trigger/{data}', function ($data) {
    echo "<p>You have sent $data.</p>";
    event(new App\Events\GetRequestEvent($data));
});
