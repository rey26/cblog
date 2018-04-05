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
    var output = '<div class="panel panel-default col-lg-push-2 col-lg-4 col-md-6  col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" >' + +'<div class="panel-body">';
    //if(data->children->count() > 0){
    output += '<h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="' + data.id + '" data-title="Enter name">' + data.title + '</a></h3>' + +'<h4>Podkategorie</h4>';
    //<ul>';
    //     for(data->children as $subCat)
    //     <li><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$subCat->id}}" data-title="Enter name">{{$subCat->title}}</a> (pocet clankov <strong>{{$subCat->posts->count()}}</strong> )</li>
    // @endforeach
    //</ul>
    // //}
    // else if((!$cat->parent)){
    // <h3><a href="#" class="catEdit" data-name="title" data-type="text" data-pk="{{$cat->id}}"  data-title="Enter name">{{$cat->title}}</a> </h3><br><h4>(pocet clankov <strong>{{$cat->posts->count()}} </strong> )</h4>
    //     @endif
    output += '</div> </div>';
    $("#catGroup").append(output);
}

function editableExt() {
    $.fn.editable.defaults.mode = 'popup';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // edit category info
    $('.catEdit').editable({
        url: '/cats',
        ajaxOptions: {
            type: 'put',
            dataType: 'json'
        },
        error: function error(data) {
            console.log('Error:', data);
        }
    });
}

$(document).ready(function () {
    //toggle `popup` / `inline` mode

    editableExt();

    $("#newCat").click(function () {
        $("#modalFormData").trigger("reset");
        $("#newCatModal").modal("show");
        $("#catChildBox").click(function () {
            $("#catChild").toggleClass("hidden");
        });
        $("#saveChildBtn").click(function (e) {
            e.preventDefault();
            var data = $("#newChildBody").val();
            var newItem = '<li>' + data + '<span class="btn btn-danger btn-sm"><i class="fas fa-times"></i></span></li>';
            $("#freshChildren").append(newItem);
            $("#newChildBody").val("");
        });
    });

    $("#btn-save").click(function (e) {
        e.preventDefault();
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
            parent_id: 0
        };
        $.ajax({
            type: "POST",
            url: '/cats',
            data: formData,
            dataType: 'json',
            success: function success(data) {
                newCat(data);
                $("#newCatModal").modal("hide");
                editableExt();
            },
            error: function error(data) {
                console.log('Error: ', data);
            }
        });
    });
});

/***/ })

/******/ });