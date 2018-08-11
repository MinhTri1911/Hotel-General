
// import '../../../../../node_modules/select2/dist/js/select2';

var HTTP_SUCCESS = 200;
var HTTP_ERROR = 500;

var createRoom = new function () {
    this.models = {
        // Items
        roomType: '#room-type'
    };

    this.init = {
        /**
         * Function init select2
         */
        initSelect2: function initSelect2() {
            $(createRoom.models.roomType).select2();
        }
    };
}();

$(document).ready(function () {
    createRoom.init.initSelect2();
});