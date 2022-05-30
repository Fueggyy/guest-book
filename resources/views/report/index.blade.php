@extends ('layouts.dashboard')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <div>
                        <span>{{ $total }}</span>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        <div class="row text-center">
                            <div class="col">
                                <h2 class="mb-4">Recently Added</h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        User
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Total Amout Of Users</h5>
                                        <p class="card-text justify-content-end">{{ $users }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Guests
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Total Amount Of Guests</h5>
                                        <p class="card-text">{{ $guests }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        User
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">User Added Today</h5>
                                        <p class="card-text justify-content-end">{{ $usersToday->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Guests
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Guests Added Today</h5>
                                        <p class="card-text">{{ $guestsToday->count() }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection