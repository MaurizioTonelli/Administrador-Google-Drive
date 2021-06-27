var dropzone = $("#dropzone");

dropzone.on(
  "drag dragstart dragend dragover dragenter dragleave drop",
  function (e) {
    e.preventDefault();
    e.stopPropagation();
  }
);

dropzone.on("dragover dragenter", function () {
  $(this).addClass("is-dragover");
});
dropzone.on("dragleave dragend drop", function () {
  $(this).removeClass("is-dragover");
});

dropzone.on("drop", function (e) {
  var files = e.originalEvent.dataTransfer.files;
  // Now select your file upload field
  // $('input_field_file').prop('files',files)
});
