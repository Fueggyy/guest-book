@extends ('layouts.dashboard')

@section('container')

<div class="d-flex justify-content-center">
    <div class="card" style="width: 80%;">
        <div class="card-header text-center">
            <h5>Add User</h5>
            <form action="/dashboard" method="post">
                @csrf
        </div>
        @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card-body">
            <label class="form-label" for="name">Full Name</label>
            <div class="form-outline mb-4 form-floating">
                <input type="text" id="name" name="name" class="form-control form-control-lg @error ('name') is-invalid @enderror" placeholder="Name" autofocus required />
                <label class="form-label" for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <!-- Email input -->
            <label class="form-label" for="name">Email</label>
            <div class="form-outline mb-4 form-floating">
                <input type="email" id="email" name="email" class="form-control form-control-lg @error ('email') is-invalid @enderror" placeholder="Email" autofocus required />
                <label class="form-label" for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Admin -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_admin" value="1">
                <label class="form-check-label" for="exampleCheck1">Admin</label>
            </div>

            <div class="submit mt-4 pt-2 text-end">
                <button type="submit" class="btn btn-dark">Sumbit</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection