@extends('admin-layout')

@section('title', 'Nos devis')

@section('body')
    <h2 class="admin-title">Nos devis</h2>

{{--    <div class="mout-create-navigation-container">--}}
{{--        <a href="{{route('addClient')}}" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </a>--}}
{{--    </div>--}}

{{--    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">--}}
{{--        <i class="fas fa-search" aria-hidden="true"></i>--}}
{{--        <input class="form-control form-control-sm ml-3 w-75 search-bar" type="text" placeholder="Search"--}}
{{--               aria-label="Search" data-source="{{$estimations}}">--}}
{{--    </form>--}}


    <div data-editable data-name="main-content">
        <blockquote>
            Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.
        </blockquote>
        <p>John F. Woods</p>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/wysiwyg/content-tools.js')}}"></script>
    <script src="{{asset('vendor/wysiwyg/sandbox.js')}}"></script>

    <script>

        window.addEventListener('load', function() {
            var editor;

            ContentTools.StylePalette.add([
                new ContentTools.Style('Author', 'author', ['p'])
            ]);

            editor = ContentTools.EditorApp.get();
            editor.init('*[data-editable]', 'data-name');

            function imageUploader(dialog) {
            //     var image, xhr, xhrComplete, xhrProgress;
            //     console.log(dialog);
                dialog.addEventListener('imageuploader.fileready', function (ev) {
                // console.log(ev);
                    // Upload a file to the server
                    var formData;
                    var file = ev.detail().file;

                    // Define functions to handle upload progress and completion
                    xhrProgress = function (ev) {
                        // Set the progress for the upload
                        dialog.progress((ev.loaded / ev.total) * 100);
                    }

                    xhrComplete = function (ev) {
                        var response;

                        // Check the request is complete
                        if (ev.target.readyState != 4) {
                            return;
                        }

                        // Clear the request
                        xhr = null
                        xhrProgress = null
                        xhrComplete = null

                        // Handle the result of the upload
                        if (parseInt(ev.target.status) == 200) {
                            // Unpack the response (from JSON)
                            response = JSON.parse(ev.target.responseText);

                            // Store the image details
                            image = {
                                size: response.size,
                                url: response.url
                            };

                            console.log(image);

                            // Populate the dialog
                            dialog.populate(image.url, image.size);

                        } else {
                            // The request failed, notify the user
                            new ContentTools.FlashUI('no');
                        }
                    }

                    // Set the dialog state to uploading and reset the progress bar to 0
                    dialog.state('uploading');
                    dialog.progress(0);

                    // Build the form data to post to the server
                    formData = new FormData();
                    formData.append('image', file);

                    // Make the request
                    xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', xhrProgress);
                    xhr.addEventListener('readystatechange', xhrComplete);
                    xhr.open('POST', '/admin/uploader', true);
                    xhr.send(formData);
                });
            }

            ContentTools.IMAGE_UPLOADER = imageUploader;
        });


    </script>
@endsection
