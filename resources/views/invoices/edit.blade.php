@extends('layouts.app')

@section('content')
    @livewire('invoice-form', ['invoice' => $invoice])
@endsection
