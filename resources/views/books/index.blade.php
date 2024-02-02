@extends('layouts.app')

@section('content')



<div class="container mt-5">
    <h2 class="mt-5">BOOKS AVAILABLE</h2>
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-3">
                <div class="card bg-light text-bg-dark m-3 border-0" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"> <img src="https://picsum.photos/200/300?random={{ rand(1,9) }}" class="card-img" alt="...">
                    <div class="card-img-overlay" style="text-shadow: 1px 1px 2px black; margin:100px 10px 0;">
                        <h3 class="card-title mb-4">{{ $book->title }}</h3>
                        <p class="card-text mt-3">Author: {{ $book->author }}</p>
                        <p class="card-text"><small>Added at: {{ $book->created_at }} </small></p>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-warning" style="margin-bottom: 10px;">RESERVE</button>
                            <a href="/books/{{ $book->id }}"><span class="material-symbols-outlined text-white" style="font-size: 2em;">
                                    send_and_archive
                                 </span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        {{ $books->links()}}
    </div>
</div>
@endsection