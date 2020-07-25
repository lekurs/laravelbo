@extends('admin-layout')

@section('title', 'Création d\'une nouvelle réalisation')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Créer une nouvelle réalisation</h2>
        <div class="mout-estimation-container">
            @include('bo.forms._add_project')
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/colorpicker/color-picker.js')}}"></script>
    <script src="{{asset('js/admin/autocomplete.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode linkchecker autolink media mediaembed powerpaste tinymcespellchecker',
            toolbar_mode: 'floating',
        });

        $('#service-client').autocompletion({
            width: 300,
            placeholder:"recherchez vos clients",
            multiple:false,
            inputClass: 'floating-input',
            resultClass: ''
        });
    </script>

    <script>
        $('.images').on('change', '.images-input', function () {
            let clone = $(this).closest('.pic').clone();
            clone.find('.images-input').reset;

            let elt = $(this);
            let show = $("<div>").addClass('show-img');
            console.log(elt);
            let reader = new FileReader();
                reader.onload = function(event) {
                    let monImage = $('<img>').attr('src', reader.result);
                    elt.after(monImage);
                }

                reader.readAsDataURL(this.files[0]);
                elt.closest('.images').append(clone);
        });

    </script>

    <script>
            // var button = $('.images .pic')
            // var uploader = $('<input type="file" accept="image/*" name="images[]"/>')
            // var images = $('.images')
            // // var inputs = $('input.images-input');
            //
            // button.on('click', function () {
            //     uploader.click();
            // })
            //
            // uploader.on('change', function () {
            //     var reader = new FileReader()
            //     reader.onload = function(event) {
            //         images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>remove</span></div>');
            //     }
            //     reader.readAsDataURL(uploader[0].files[0])
            //
            // })
            //
            // images.on('click', '.img', function () {
            //     $(this).remove()
            // })
    </script>
@endsection
