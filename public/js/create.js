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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

function addCheckBox(data) {
    var output = '<div id="tagGroup' + data.id + '"><input type="checkbox" id="tags" name="tags[]" value="' + data.id + '" checked/><span id="tagName' + data.id + '">' + data.name + '</span>';
    output += '&nbsp;<button class="btn btn-danger btn-xs deleteTag" value="' + data.id + '" type="button"><i class="fas fa-times"></i></button>';
    output += '&nbsp;<button class="btn btn-primary btn-xs editTag" value="' + data.id + '" type="button"><i class="fas fa-edit"></i></button><br></div>';
    $("#freshTags").append(output);
}
function tagDeleter() {

    $(".deleteTag").on('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var tag_id = $(this).val();
        $.ajax({
            type: "DELETE",
            url: '/tags/' + tag_id,
            success: function success() {
                $("#tagGroup" + tag_id).remove();
            },
            error: function error(data) {
                console.log('Error', data);
            }
        });
    });
}

function tagUpdater() {

    $(".editTag").on('click', function () {
        var tag_id = $(this).val();

        $("#addTagDialog").hide();
        $("#tagGroup" + tag_id).hide();
        var text = $("#tagGroup" + tag_id).text();
        var dialog = '<div id="editTag"> <input id="updatedTag" value="' + text + '" type="text" autofocus/> <button id="save" class="btn-info btn" type="button"> <i class="fas fa-check"></i> </button></div>';
        $("#freshTags").append(dialog);

        $("#save").click(function () {
            $("#updatedTag").hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var formData = {
                id: tag_id,
                name: $("#updatedTag").val()
            };
            console.log(formData);
            $.ajax({
                type: "PUT",
                url: '/tags/' + tag_id,
                data: formData,
                dataType: 'json',
                success: function success(data) {
                    addCheckBox(data);
                    $("#editTag").hide();
                    $("#newTagBody").val("");
                    $("#addTagDialog").show();
                    tagDeleter();
                    tagUpdater();
                },
                error: function error(data) {
                    console.log('Error', data);
                }
            });
        });
    });
}

$(document).ready(function () {
    // title slug generator @ layouts/create.blade.php
    $("#title").keyup(function () {
        $("#slug").val($("#title").val().toLowerCase().replace(/ /g, '-'));
    });

    // ajax create  @ layouts/create.blade.php
    $("#addTag").click(function (e) {
        e.preventDefault();
        $("#addTagDialog").removeClass("hidden");
        $("#addTag").hide();
    });

    $("#saveTagBtn").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            name: $('#newTagBody').val()
        };

        var type = "POST";
        var ajaxurl = "/tags";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function success(data) {
                addCheckBox(data);
                $("#newTagBody").val("");
                tagDeleter();
                tagUpdater();
            },
            error: function error(data) {
                console.log('Error: ', data);
            }

        });
        tagDeleter();
    });
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);