@extends ('layouts.main')

@section('container')

<section>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 80%;">
            <div class="card-header text-center">
                <form action="/guest-action" method="post">
                    @csrf
                    <div class="align-items-center my-4">
                        <h2 class="fw-bold mx-3 mb-0">Hello, {{ Auth::user()->name }}</h2>
                    </div>
            </div>
            @if(session()->has('inputStatus'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('inputStatus')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
                <label class="form-label" for="name">Full Name</label>
                <div class="form-outline mb-4 form-floating">
                    <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Name" value="{{ Auth::user()->name }}" autofocus required />
                    <label class="form-label" for="name">Name</label>
                </div>


                <!-- Email input -->
                <label class="form-label" for="name">Email</label>
                <div class="form-outline mb-4 form-floating">
                    <input type="email" id="email" name="email" class="form-control form-control-lg @error ('email') is-invalid @enderror" placeholder="Email" value="{{ Auth::user()->email }}" autofocus required />
                    <label class="form-label" for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Keterengan -->
                <label class="form-label" for="name">Description</label>
                <div class="form-outline mb-4 form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
                    <label for="description">Description</label>
                </div>


                <div class="submit text-center mt-4 pt-2">
                    <button type="submit" class="btn btn-get-started-blue text-white btn-lg">Sumbit</button>
                </div>
            </div>

            <!-- Nama input -->
            </form>
        </div>
    </div>
</section>


@endsection