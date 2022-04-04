<div class="container-fluid">
    <div class="row">
        <div class="col">
        <h2>{{ $Auth::user()->name }}</h2>
        </div>
    </div>
    <div class="row row-cols-4 g-1">
            @foreach($books as $book)
            <div class="col" style="box-shadow: 5px 5px gold;">
                <div class="row">
                    <div class="col-2">{{ $book->id }}</div>
                    <div class="col-6">{{ $book->name }}</div>
                    <div class="col-2">{{ $book->price }}</div>
                    <div class="col-2">{{ $book->copies_sold }}</div>
                </div>
            </div>
            @endforeach
            @if(!$books)
            <div class="col">
                <div class="alert alert-warning">
                    Whoops! No books written by {{ $Auth::user()->name }}
                </div>
            </div>
            @endif
    </div>
</div>