@extends('errors::illustrated-layout')

@section('code_', '5')
@section('code_1', '0')
@section('code_2', '3')
@section('title', __('Service Unavailable'))

@section('message', __($exception->getMessage() ?: 'Sorry, we are doing some maintenance. Please check back soon.'))
