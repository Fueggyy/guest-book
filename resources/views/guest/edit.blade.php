@extends ('layouts.main')

@section('container')

<section>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 80%;">
            <div class="card-header text-center">
                Update Guest
            </div>
            <div class="card-body">
                <form action="/list/edit-guest/save" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="text" name="name" id="Nama" class="form-control" id="exampleInputEmail1" value="{{$guest->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" id="exampleInputPassword1" value="{{$guest->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea type="text" name="description" id="description" class="form-control" id="exampleInputPassword1">{{$guest->description}}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$guest->id}}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection