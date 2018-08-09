@extends('dashboard::index')

@section('body-class', 'create-room')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/room-general.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('dashboard::common.room.create.title_header') }}</h1>
            </div>
        </div>

        <div class="row block">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="col-md-4">
                        <label>
                            {{ trans('dashboard::common.room.name_default') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('room-name-default', null, [
                                'class' => 'form-control',
                                'require' => true,
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-md-4">
                        <label>
                            {{ trans('dashboard::common.room.name') }}
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('room-name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row block">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="col-md-4">
                        <label>
                            {{ trans('dashboard::common.room.room_type') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{ Form::select('room-type', ['A', 'B', 'C'], 0, [
                                'class' => 'form-control',
                                'require' => true,
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-md-4">
                        <label>
                            {{ trans('dashboard::common.room.price_room') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{ Form::text('room-name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection
