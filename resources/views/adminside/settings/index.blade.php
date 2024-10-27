@extends('layouts.admin.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('setting.store') }}">
            @csrf
            {{-- stripe credientials --}}
            <div class="card">
                <div class="card-body">
                    {{-- {{ dd($stripeSettings) }} --}}
                    @foreach ($stripeSettings as $stripeSetting)
                        <div class="form-group">
                            <label for="">{{ $stripeSetting['display_name'] }}</label>
                            <input type="text" class="form-control" name="{{ $stripeSetting['key'] }}"
                                value="{{ $stripeSetting['value'] }}">
                            <small class="text-muted">{{ $stripeSetting['note'] }}</small>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            <br>
            {{-- paypal credientials --}}
            {{-- <div class="card">
                <div class="card-body">
                    @foreach ($paypalSettings as $paypalSetting)
                        @csrf
                        <div class="form-group">
                            <label for="">{{ $paypalSetting['display_name'] }}</label>
                            <input type="text" class="form-control" name="{{ $paypalSetting['key'] }}"
                                value="{{ $paypalSetting['value'] }}">
                            <small class="text-muted">{{ $paypalSetting['note'] }}</small>

                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            <br> --}}
            {{-- email credientials --}}
            <div class="card">
                <div class="card-body">
                    @foreach ($mailSettings as $mailSetting)
                        @csrf
                        <div class="form-group">
                            <label for="">{{ $mailSetting['display_name'] }}</label>
                            <input type="text" class="form-control" name="{{ $mailSetting['key'] }}"
                                value="{{ $mailSetting['value'] }}">
                            <small class="text-muted">{{ $mailSetting['note'] }}</small>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            <br>
        </form>

    </div>

@stop
