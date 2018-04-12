/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(7);


/***/ }),

/***/ 7:
/***/ (function(module, exports) {

function newCat(data) {
    var output = '<div class="panel panel-default col-lg-push-2 col-lg-4 col-md-6  col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" >';
    output += '<div id="catPanel' + data.id + '" class="panel-body">';
    output += '<h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="' + data.id + '" data-title="Enter name">' + data.title + '</a></h3>';

    output += '</div> </div>';
    $("#catView").append(output);
}

function editableExt() {
    var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : ".catEdit";
    var url = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '/cats';

    $.fn.editable.defaults.mode = 'popup';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // edit category info
    $(element).editable({
        url: url,
        ajaxOptions: {
            type: 'put',
            dataType: 'json'
        },
        error: function error(data) {
            console.log('Error:', data);
        }
    });
}

function saveCat() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var title = $("#catName").val();
    var slug = title.toLowerCase();
    var formData = {
        title: title,
        slug: slug,
        parentId: 0
    };
    $.ajax({
        type: "POST",
        url: '/cats',
        data: formData,
        dataType: 'json',
        success: function success(data) {
            newCat(data);
            $("#catEdit").hide();
            $("#freshCat").append('<div id="freshTitle" class="col-sm-8 text-uppercase" style="margin: 1em"><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="' + data.id + '" data-title="Enter name">' + data.title + '</a></div>');
            $("#saveChildBtn").attr('data-parent', data.id);
            editableExt();
            saveChild();
        },
        error: function error(data) {
            console.log('Error: ', data);
        }
    });
}

function saveChild() {
    $("#saveChildBtn").click(function (e) {
        e.preventDefault();
        var title = $("#newChildBody").val();
        var slug = title.toLowerCase();
        var parentId = $(this).attr('data-parent');
        var formData = {
            title: title,
            slug: slug,
            parentId: parentId
        };
        $.ajax({
            type: "POST",
            url: '/cats',
            data: formData,
            dataType: 'json',
            success: function success(data) {
                var freshChild = '<li id="catGroup' + data.id + '"><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="' + data.id + '" data-title="Enter name">' + data.title + '</a><span data-pk="' + data.id + '" class="btn btn-danger btn-sm deleteCat"><i class="fas fa-times"></i></span></li>';
                $("#freshChildren").append(freshChild);
                editableExt();
                deleteCat();
                $("#newChildBody").val("");
                $("#catPanel" + parentId).append(freshChild);
            },
            error: function error(data) {
                console.log('Error: ', data);
            }
        });
    });
}

function deleteCat() {
    $(".deleteCat").click(function () {
        console.log('Delete Cat');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-pk');
        $.ajax({
            type: "DELETE",
            url: '/cats/' + id,
            success: function success() {
                $("#catGroup" + id).remove();
                $("#panel" + id).remove();
            },
            error: function error(data) {
                console.log('Error: ', data);
            }
        });
    });
}

$(document).ready(function () {
    //toggle `popup` / `inline` mode
    editableExt();
    deleteCat();

    $("#newCat").click(function () {
        $("#modalFormData").trigger("reset");
        $("#newCatModal").modal("show");
        $("#catChildBox").click(function () {
            $("#catChild").toggleClass("hidden");
        });
        $("#catEdit").keypress(function (e) {
            if (e.which == 13) {
                saveCat();
            }
        });
        $("#saveCatBtn").click(function (e) {
            e.preventDefault();
            saveCat();
        });
    });
    //todo: generate card with subcategories after ajax call
    //todo: delete categories and subcategories if(cat->posts==0)

});

/***/ })

/******/ });