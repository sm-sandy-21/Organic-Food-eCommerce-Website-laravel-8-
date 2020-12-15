@extends('layout')
@section('content')


<div class="jumbotron text-center">
  <h1 class="display-3">Thank You For Shipping With Us!</h1>
  <p class="lead"><strong>We will Contact with you as soon as possible</strong></p>
  <p class="lead"><strong>Please check your email</strong></p>

  <hr>
  <p>
    Having trouble? <a href="#">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-secondary btn-sm" href="{{ url('/') }}" role="button">Continue to homepage</a>
  </p>
</div>



@endsection