@extends('layouts.home')

@section('title', 'Home')

@section('content')
    <section class="section">
        {{-- <h1 class="section-header">
            <div>@yield('title')</div>
        </h1> --}}

        <div class="card card-dark">
            <div class="card-header">
                <h4>SISTEM INFORMASI PENGELOLAAN MEMBER FITNESS AM GYM PONTIANAK</h4>
            </div>
        </div>

        <div class="row">
            @include('home.widget')
        </div>

        {{-- Grafik #row-2 --}}
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pendaftaran Member Per-Bulan, Tahun {{ date_id(date('Y-m-d'), 'Y') }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Segmentasi Job Member Per-Bulan {{ date_id(date('Y-m-d'), 'MMMM') }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- #row-3 --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Member dalam masa tenggang</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Gender</th>
                                    <th>Job</th>
                                    <th>Status</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                                @forelse ($memberMasaTenggangList as $member)
                                    <tr>
                                        <td>
                                            @if ($member->foto && file_exists(public_path('images/' . $member->foto)))
                                                <img src="{{ asset('images/' . $member->foto) }}" alt="avatar"
                                                    width="30" height="30" class="rounded-circle mr-1">
                                            @else
                                                <img src="{{ asset('images/default.png') }}" alt="avatar" width="30"
                                                    class="rounded-circle mr-1">
                                            @endif
                                            {{ $member->nama }}
                                        </td>
                                        <td>{{ $member->alamat }}</td>
                                        <td>{{ ucwords($member->gender) }}</td>
                                        <td>{{ $member->job }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $member->status == 1 ? 'primary' : ($member->status == 2 ? 'dark' : 'danger') }}">
                                                {{ $statuses[$member->status] }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{-- Detail --}}
                                            <a href="{{ route('member.show', $member) }}"
                                                class="btn btn-action btn-secondary mr-1" data-toggle="tooltip"
                                                title="Detail">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-secondary text-center">Empty data.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>

                            {{ $memberMasaTenggangList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@push('js_script')
    <script src="{{ asset('dist/modules/chart.min.js') }}"></script>
    <script>
        /** Bar Chart */
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                labels: {!! $labelMonth !!},
                datasets: [{
                    label: 'Member',
                    // data: [460, 458, 330, 700, 430, 610, 488],
                    data: {!! $dataMembers !!},
                    borderWidth: 2,
                    backgroundColor: 'rgb(87,75,144)',
                    borderColor: 'rgb(87,75,144)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            // stepSize: 2,
                            maxTicksLimit: 5,
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });

        /** Pie Chart */
        var ctx = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    // data: [ 80, 50, 40, 30, 20, ],
                    data: {!! $dataMemberJobs !!},
                    backgroundColor: [
                        '#574B90',
                        '#28a745',
                        '#6c757d',
                        // '#dc3545',
                        // '#343a40',
                    ],
                    label: 'Dataset 1'
                }],
                // labels: [ 'Purple', 'Green', 'Yellow', 'Red', 'Black' ],
                labels: {!! $labelJobs !!},
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });
    </script>
@endpush
