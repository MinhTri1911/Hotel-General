
// import '../../../../../node_modules/select2/dist/js/select2';

const HTTP_SUCCESS = 200;
const HTTP_ERROR = 500;

var createRoom = new function () {
    this.models = {
        // Items
        roomType: '#room-type',
        roomImages: '#room-images',
    }

    this.urls = {
        urlRemoveImages: $('#remove-image').val(),
        urlUploadImages: $('#my-dropzone').attr('data-url'),
    }

    this.init = {
        /**
         * Function init select2
         */
        initSelect2: function () {
            $(createRoom.models.roomType).select2();
        },

        /**
         * Function init dropzone for upload images
         */
        intDropzone: function () {
        }
    }
}

$(document).ready(function () {
    createRoom.init.initSelect2();
    createRoom.init.intDropzone();
})
