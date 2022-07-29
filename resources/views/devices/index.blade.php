@extends('layouts.home')

@section('title', 'Device')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Device</h4>
                    </div>
                    <div class="card-body">

                        @include('partials.flash', ['errors' => $errors])

                        @if (!empty($profile))
                            {!! Form::model($profile, ['route' => ['device.update', $profile], 'method' => 'PUT']) !!}
                            {!! Form::hidden('id') !!}
                        @endif
                        {{--  --}}
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '628XXX...']) !!}
                        </div>


                        <div class="float-left">
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                            <a class="btn btn-outline-secondary" href="{{ route('pesan.index') }}">Kembali</a>
                        </div>

                        {{-- <div class="float-right">
                            <button type="button" class="btn btn-info" @if (empty($profile->phone)) disabled @endif
                                id="btn--scan">
                                Scan
                            </button>
                            <button type="button" class="btn btn-info" @if (empty($profile->phone)) disabled @endif
                                id="btn--cek-session">
                                Cek Session
                            </button>
                        </div> --}}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Whatsapp Session</h4>
                    </div>
                    <div class="card-body">

                        <div class="card card-progress bg-transparent" id="loader" style="height: 50px;"> </div>

                        <div id="qrcode-wrapper" class="text-center">
                            {{-- <img src="{{ asset('images/qr.png') }}" alt="qrcode" class="img-thumbnail"> --}}
                        </div>

                        <div class="text-center">
                            <span id="timer">
                                <strong id="time"> </strong>
                            </span>
                        </div>

                        <div class="text-center">
                            <strong class="text-primary" id="log-message">Whatsapp Session.</strong>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-info" @if (empty($profile->phone)) disabled @endif
                            id="btn--scan">
                            Scan
                        </button>
                        <button type="button" class="btn btn-info" @if (empty($profile->phone)) disabled @endif
                            id="btn--cek-session">
                            Cek Session
                        </button>
                        <button type="button" class="btn btn-outline-danger"
                            @if (empty($profile->phone)) disabled @endif id="btn--delete-session">
                            Hapus Session
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('vendor.toastr.toastr')

@push('css_style')
    <style>
        button:disabled {
            cursor: not-allowed;
            pointer-events: all !important;
        }
    </style>
@endpush
@push('js_script')
    <script>
        $(function() {

            $('#loader').hide();
            let sessionId = "{{ $profile->phone }}";

            /** Btn scan wa */
            $('#btn--scan').click(function() {

                $.ajax({
                    url: "{{ env('NODE_WA_URL') }}/sessions/add",
                    type: "POST",
                    data: {
                        id: sessionId,
                        isLegacy: false
                    },
                    beforeSend: function() {
                        $('#btn--scan').attr('disabled', 'disabled');
                        $('#loader').show();
                        $('#timer').html('');
                    },
                    success: function(response) {
                        $('#loader').hide();
                        let qrcode = response.data.qr
                        toastr.success(response.message)
                        $('#log-message').text(response.message)
                        $('#qrcode-wrapper').html(`<img src="${qrcode}" alt="qrcode">`)
                        //data - response from server
                        timer()
                    },
                    error: function(error) {
                        let message = error.responseJSON.message
                        toastr.error(message)
                        $('#log-message').text(message)
                        $('#loader').hide();
                        // $('#qrcode-wrapper').html('')
                    },
                    complete: function() {
                        $('#btn--scan').attr('disabled', false);
                        // $('#loader').hide();
                    }
                });
            })


            async function timer() {
                let counter = 60;
                let interval = setInterval(function() {
                    counter--;
                    // Display 'counter' wherever you want to display it.
                    if (counter <= 0) {
                        clearInterval(interval);
                        $('#timer').html('');
                        $('#log-message').text('Session habis silahkan scan ulang.')
                        $('#qrcode-wrapper').html("");
                        return;
                    } else {
                        $('#time').text(counter);
                        console.log("Timer --> " + counter);
                    }
                }, 1000);
            }


            /** Btn cek session */
            $('#btn--cek-session').click(function() {
                $.ajax({
                    url: `{{ env('NODE_WA_URL') }}/sessions/status/${sessionId}`,
                    type: "GET",
                    beforeSend: function() {
                        $('#btn--cek-session').attr('disabled', 'disabled');
                        $('#loader').show();
                        // $('#timer').html('');
                    },
                    success: function(response) {
                        console.log(response)
                        let status = response.data.status
                        toastr.success(status)
                        $('#loader').hide();
                        $('#log-message').text(status)
                        $('#qrcode-wrapper').html('')
                        // //data - response from server
                        // timer()
                    },
                    error: function(error) {
                        let message = error.responseJSON.message
                        toastr.error(message)
                        $('#log-message').text(message)
                        // $('#loader').hide();
                        // $('#qrcode-wrapper').html('')
                    },
                    complete: function() {
                        $('#btn--cek-session').attr('disabled', false);
                        $('#loader').hide();
                    }
                });
            })

            /** Btn delete session */
            $('#btn--delete-session').click(function() {
                $.ajax({
                    url: `{{ env('NODE_WA_URL') }}/sessions/delete/${sessionId}`,
                    type: "DELETE",
                    beforeSend: function() {
                        $('#btn--delete-session').attr('disabled', 'disabled');
                        $('#loader').show();
                        // $('#timer').html('');
                    },
                    success: function(response) {
                        console.log(response)
                        $('#loader').hide();
                        toastr.success(response.message)
                        $('#log-message').text(response.message)
                        $('#qrcode-wrapper').html('')
                    },
                    error: function(error) {
                        let message = error.responseJSON.message
                        toastr.error(message)
                        $('#log-message').text(message)
                        // $('#loader').hide();
                        // $('#qrcode-wrapper').html('')
                    },
                    complete: function() {
                        $('#btn--delete-session').attr('disabled', false);
                        $('#loader').hide();
                    }
                });
            })
        })
    </script>
@endpush
