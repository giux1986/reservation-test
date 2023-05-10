@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Book Tickets</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('reservations.post') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('event_id') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                       <b>Event</b>:  {{ $event->title }}
                                </div>
                            </div>

                            <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <div class="form-group row">
                                <label for="num_tickets" class="col-md-4 control-label">Quantity</label>

                        <div class="col-md-6">

                                    <select id="num_tickets" type="number" class="form-control" name="num_tickets" required="required" >
                                         @for ($i = 1; $i <= $event->available_tickets(); $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                   

                                    @if ($errors->has('num_tickets'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('num_tickets') }}</strong>
                                        </span>
                                    @endif
                                </div>
                    </div>

                           <input type="hidden" name="event_id" value="{{ $event->id }}">
<br>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Book Tickets
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
