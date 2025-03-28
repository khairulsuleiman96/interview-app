<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('list-products', function () {
    return true;
});

Broadcast::channel('list-categories', function () {
    return true;
});