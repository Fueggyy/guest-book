@extends ('layouts.dashboard')

@section('container')

<section>
    <div class="container">
        @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
            <h5 class="card-header">
                <a href="/dashboard/add" class="btn btn-outline-dark">Add</a>
            </h5>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr {{ ($users->currentPage()-1) * $users->perPage() + $loop->iteration }}>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->is_admin == 1)
                                <span class="badge bg-dark">Admin</span>
                                @else
                                <span class="badge bg-light text-dark">Guest</span>
                                @endif
                            <td>
                                <a href="/dashboard/update/{{$user->id}}" class="btn btn-outline-dark">Update</a>
                                <a href="/dashboard/{{$user->id}}" class="btn btn-outline-dark">Delete</a>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{$users->links()}}
                </div>
            </div>
        </div>
        @if (request('search'))
        <div class="container mt-4">
            <a href="/dashboard" class="btn btn-secondary">Show All</a>
        </div>
        @endif
    </div>
</section>

@endsection