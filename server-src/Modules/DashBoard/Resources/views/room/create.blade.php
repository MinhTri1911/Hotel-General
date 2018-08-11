@extends('dashboard::index')

@section('body-class', 'create-room')

@section('style')
    <link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/room-general.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('dashboard::common.room.create.title_header') }}</h1>
            </div>
        </div>

        {{ Form::open(['url' => route('admin.room.upload.image'),
                'enctype' => 'multipart/form-data',
            ])
        }}
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
                    <div class="col-md-6 group-input">
                        <div class="col-md-4">
                            <label>
                                {{ trans('dashboard::common.room.room_type') }}
                                <span class="require">{{ trans('dashboard::common.require') }}</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('room-type', ['A', 'B', 'C'], 0, [
                                    'class' => 'form-control',
                                    'id' => 'room-type',
                                    'require' => true,
                                ])
                            }}
                        </div>
                        <i class="fa fa-plus-circle fa-fw icon-quick-create" data-toggle="modal" data-target="#exampleModal">
                        </i>
                    </div>

                    <div class="col-md-6 group-input">
                        <div class="col-md-4">
                            <label>
                                {{ trans('dashboard::common.room.price_room') }}
                                <span class="require">{{ trans('dashboard::common.require') }}</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('room-name', null, ['class' => 'form-control']) }}
                        </div>
                        <i class="fa fa-plus-circle fa-fw icon-quick-create"></i>
                    </div>
                </div>
            </div>

            <div class="row block">
                <div class="col-md-12">
                    <div class="col-md-6 group-input">
                        <div class="col-md-4">
                            <label>
                                {{ trans('dashboard::common.room.room_level') }}
                                <span class="require">{{ trans('dashboard::common.require') }}</span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('room-level', ['A', 'B', 'C'], 0, [
                                    'class' => 'form-control',
                                    'require' => true,
                                ])
                            }}
                        </div>
                        <i class="fa fa-plus-circle fa-fw icon-quick-create"></i>
                    </div>
                </div>
            </div>

            <div class="row block">
                <div class="col-md-12">
                    <div class="dropzone"
                        id="my-dropzone"
                        name="myDropzone">
                    </div>
                </div>
            </div>

            <div class="row block">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>
            </div>
        {{ Form::close() }}
    </div>

    <!-- Modal -->
    <div class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ trans('dashboard::room.popup.quick_create_type.title') }}
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_type_room') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('txt-room-type', '', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('dashboard::room.popup.quick_create_type.placeholder.lbl_type_room')
                                ])
                            }}
                        </div>
                    </div>

                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_type_room_name_default') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('txt-room-type-name-default', '', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('dashboard::room.popup.quick_create_type.placeholder.lbl_type_room_name_default')
                                ])
                            }}
                        </div>
                    </div>

                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_type_room_name') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('txt-room-type-name', '', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('dashboard::room.popup.quick_create_type.placeholder.lbl_type_room_name')
                                ])
                            }}
                        </div>
                    </div>

                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_people') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('txt-room-people', '', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('dashboard::room.popup.quick_create_type.placeholder.lbl_people')
                                ])
                            }}
                        </div>
                    </div>

                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_bed') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('txt-room-bed', '', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('dashboard::room.popup.quick_create_type.placeholder.lbl_bed')
                                ])
                            }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::button(trans('dashboard::room.popup.quick_create_type.btn_cancel'), [
                            'class' => 'btn btn-secondary',
                            'data-dismiss' => 'modal',
                        ])
                    }}
                    {{ Form::button(trans('dashboard::room.popup.quick_create_type.btn_save'), [
                            'class' => 'btn btn-primary',
                        ])
                    }}
                </div>
            </div>
        </div>
    </div>

    {{ Form::hidden('url-remove-image', route('admin.room.remove.image'), ['id' => 'remove-image']) }}
@endsection

@section('javascript')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/room-general.js') }}"></script>

    <script>
        Dropzone.options.myDropzone = {
            url: '{!! route('admin.room.upload.image') !!}',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFilesize: 16,
            // previewTemplate: document.querySelector('#preview').innerHTML,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictFileTooBig: 'Image is larger than 16MB',
            timeout: 10000,
            removedfile: function (file) {
                $.post({
                    url: '{!! route('admin.room.remove.image') !!}',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {id: file.name},
                    dataType: 'html',
                    success: function (data) {
                        $("#msg").html(data);
                    }
                });

                var _ref;

                if (file.previewElement) {
                    if ((_ref = file.previewElement) != null) {
                        _ref.parentNode.removeChild(file.previewElement);
                    }
                }

                return this._updateMaxFilesReachedClass();
            },
            previewsContainer: null,
            hiddenInputContainer: "body",
        };
    </script>
@endsection
