@extends('layouts.home')

@section('title', 'Pesan')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <h1>Pesan</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
