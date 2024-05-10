<?php

Router::url('contacts', 'get', 'ContactController::show');
Router::url('contacts/view', 'get', 'ContactController::view');
Router::url('contacts/add', 'get', 'ContactController::add');
Router::url('contacts/edit', 'get', 'ContactController::edit');
Router::url('contacts/delete', 'get', 'ContactController::delete');
Router::url('contacts/add', 'post', 'ContactController::saveAdd');
Router::url('contacts/edit', 'post', 'ContactController::saveEdit');

Router::url('login', 'get', 'UserController::login');
Router::url('register', 'get', 'UserController::register');
Router::url('login', 'post', 'UserController::saveLogin');
Router::url('register', 'post', 'UserController::saveRegister');
