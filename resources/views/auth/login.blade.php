@extends('adminlte::auth.login')

@section('title', __('Login'))
@section('register_url', Route::has('register') ? 'register' : '')
@section('login_url', Route::has('login') ? 'login' : '')
@section('password_reset_url', Route::has('password.request') ? 'password.request' : '')