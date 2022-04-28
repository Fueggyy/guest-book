@extends ('layouts.main')

@section('container')

<section>
    <div class="container">
        <div class="card">
            <h5 class="card-header">
                Guest List
                <form action="/list" class="d-flex">
                    <input class=" form-control me-2" type="text" placeholder="Search" aria-label="Search" type="submit" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </h5>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $guest)
                        <tr>
                            <th scope="row">{{ ($guests->currentPage()-1) * $guests->perPage() + $loop->iteration }} </th>
                            <td>{{$guest->name}}</td>
                            <td>{{$guest->email}}</td>
                            <td>{{$guest->description}}</td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{$guests->links()}}
                </div>
            </div>
        </div>
        @if (request('search'))
        <div class="container mt-4">
            <a href="/list" class="btn btn-secondary">Show All</a>
        </div>
        @endif
    </div>
</section>

@endsection