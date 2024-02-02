@extends('layouts.app')

@section('content')

<h2 class="mt-5">BOOK DETAILS</h2>

                    <h3 class="card-title mb-4">{{ $bookdetails->title }}</h3>
                    <p class="card-text mt-3">Author: {{ $bookdetails->author }}</p>
                    <p class="card-text"><small>Added at: {{ $bookdetails->created_at }} </small></p>

@endsection