@extends('errors::minimal')

@section('title', __($exception->getMessage()))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
