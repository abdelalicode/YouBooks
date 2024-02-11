@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="m-5">BOOK DETAILS</h2>
                    <h3 class="card-title mb-4">{{ $book->title }}</h3>
                    <p class="card-text mt-3">Author: <b> {{ $book->author }} </b></p>
                    <small><u>Summary:</u></small>
                    <p class="card-text mt-3">{{ $book->details }}</p>
                    <p class="card-text"><small>Added at: {{ $book->created_at->format('Y-m-d') }} </small></p>
                    
                    @if (Auth::user()->role->name == 'bibliothecaire')
                
                    <div class="container d-flex gap-5">
                        <a href="{{route('book.edit', $book->id)}}"><button type="button" class="btn btn-outline-success">UPDATE</button></a>
                        <form action="{{route('book.destroy', $book->id)}}" method="post">   
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">DELETE</button>
                        </form>
                    </div>
                    @endif
                </div>
@endsection