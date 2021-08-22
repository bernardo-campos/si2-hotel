@extends('adminlte::auth.passwords.reset')

@section('title', __('Reset Password'))

@php( $token = request()->route('token'))
@php( $email = request()->query('email'))