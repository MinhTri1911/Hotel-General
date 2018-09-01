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

        {{ Form::open(['url' => route('admin.room.store'),
                'enctype' => 'multipart/form-data',
            ])
        }}
            <div class="row block">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            {{ trans('dashboard::common.room.name_default') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
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
                            {{ trans('dashboard::common.room.name') }}
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
                            {{ trans('dashboard::common.room.room_type') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
                        </div>
                        <div class="col-md-6 custom-select">
                            {{ Form::select('room-type', ['A', 'B', 'C'], 0, [
                                    'class' => 'form-control',
                                    'id' => 'room-type',
                                    'require' => true,
                                ])
                            }}
                        </div>
                        <div class="quick-add">
                            <i class="fa fa-plus-circle fa-fw icon-quick-create"
                                data-toggle="modal"
                                data-target="#popup-create-room-type">
                            </i>
                        </div>
                    </div>

                    <div class="col-md-6 group-input">
                        <div class="col-md-4">
                            {{ trans('dashboard::common.room.price_room') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('room-price', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="quick-add">
                            <i class="fa fa-plus-circle fa-fw icon-quick-create"
                                data-toggle="modal"
                                data-target="#popup-create-room-price">
                            </i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row block">
                <div class="col-md-12">
                    <div class="col-md-6 group-input">
                        <div class="col-md-4">
                            {{ trans('dashboard::common.room.room_level') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>
                        </div>
                        <div class="col-md-6 custom-select">
                            {{ Form::select('room-level', ['A', 'B', 'C'], 0, [
                                    'class' => 'form-control',
                                    'require' => true,
                                    'id' => 'room-level',
                                ])
                            }}
                        </div>
                        <div class="quick-add">
                            <i class="fa fa-plus-circle fa-fw icon-quick-create"
                                data-toggle="modal"
                                data-target="#popup-create-room-level">
                            </i>
                        </div>
                    </div>


                    <div class="col-md-6">
                            <table class="table table-bordered table-condensed" style="background: #fff">
                                <thead>
                                    <tr>
                                        <th class="col-sm-4">Name</th>
                                        <th>Size</th>
                                        <th class="col-sm-1">Status</th>
                                        <th class="col-sm-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ngRepeat: file in $flow.files -->
                                    <tr ng-repeat="file in $flow.files" class="ng-scope">
                                        <td class="text-bold ng-binding">2015.png</td>
                                        <td class="small ng-binding">239,062 B</td>
                                        <td class="text-center">
                                            <span class="ion ion-checkmark-circled text-success" ng-show="file.isComplete()" aria-hidden="false" style=""></span>
                                        </td>
                                        <td>
                                            {{-- <span class="btn btn-xs btn-danger ion ion-trash-a" ng-click="file.cancel()" role="button" tabindex="0"></span> --}}
                                            <i class="btn btn-xs btn-danger fa fa-trash-o"></i>
                                        </td>
                                    </tr><!-- end ngRepeat: file in $flow.files --><tr ng-repeat="file in $flow.files" class="ng-scope">

                                </tbody>
                            </table>
                            <a class="btn btn-small btn-success btn-sm" tabindex="0">Resume all</a>
                        </div>
                </div>
            </div>

            {{-- <div class="row block">
                <div class="col-md-12">
                    <div class="dropzone"
                        id="my-dropzone"
                        name="myDropzone"
                        data-url="{{ route('admin.file.upload.image') }}">
                    </div>
                </div>
            </div> --}}

            <div class="row block">
                {{ Form::button('Tạo', ['class' => 'btn btn-primary', 'type' => 'submit', 'id' => 'btn-submit']) }}
            </div>
        {{ Form::close() }}
    </div>

    <!-- Modal -->
    <div class="modal fade"
        id="popup-create-room-type"
        tabindex="-1"
        role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        {{ trans('dashboard::room.popup.quick_create_type.title') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_type_room') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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

    <div class="modal fade"
        id="popup-create-room-level"
        tabindex="-1"
        role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        {{ trans('dashboard::room.popup.quick_create_type.title') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 block">
                        <div class="col-md-6">
                            {{ trans('dashboard::room.popup.quick_create_type.lbl_type_room') }}
                            <span class="require">{{ trans('dashboard::common.require') }}</span>

                            <i class="fa fa-question-circle fa-fw"></i>
                        </div>
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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
                        <div class="col-md-6 col-md-pull-2">
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

    {{ Form::hidden('url-remove-image', route('admin.file.remove.image'), ['id' => 'remove-image']) }}
@endsection

@section('javascript')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/room-general.js') }}"></script>

    {{-- <script>
        // Remove all localStorage
        localStorage.clear();
        Dropzone.autoDiscover = false;
        let countFile = 0;

        $("#my-dropzone").dropzone({
            // Setting url upload
            url: '{!! route('admin.file.upload.image') !!}',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 5,
            maxFilesize: 16,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictFileTooBig: 'Image is larger than 16MB',
            timeout: 10000,
            dictDuplicateFile: "Duplicate Files Cannot Be Uploaded",
            preventDuplicates: false,
            init: function() {
                var el = document.getElementById('btn-submit');

                if(el){
                    el.addEventListener('click', swapper, false);
                }
                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                this.element.querySelector('button[type=submit]').addEventListener('click', function (e) {
                // Make sure that the form isn’t actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                this.on('sending', function(file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $('form').serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });

                    formData.append('file', file);
                });
            },
            // Function handle event click remove file
            removedfile: function (file) {
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
        });

        $("#btn-submit").click(function (e) {
            e.preventDefault();
            myDropzone.processQueue();
        });
    </script> --}}
@endsection
