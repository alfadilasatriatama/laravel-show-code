<!DOCTYPE html>
<html lang="en">

@extends('layouts.main')

@section('container')
    <h1>Page About</h1>
    {{-- blade templatiung egine --}}
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="300" class="img-thumbnail rounded-full">
@endsection