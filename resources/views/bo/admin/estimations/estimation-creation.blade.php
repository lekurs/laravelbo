@extends('admin-layout')

@section('title', 'Nos devis')

@section('body')
    <h2 class="admin-title">Créer un devis pour {{$client->name}}</h2>
    <div class="testing">
    </div>
    <div class="mout-bo-estimation-client-container">
        <div data-editable data-name="client-content" class="mout-bo-estimation-client-content">
            <blockquote>
                <p>{{$client->name}}</p>
                <p>{{$client->address}}</p>
                <p>{{$client->zip}} {{$client->city}}</p>
            </blockquote>
        </div>
        <div class="test">
            <label for="exampleFormControlSelect1">Contacts</label>
            <select class="form-control" id="contacts">
                @foreach($client->contacts()->get() as $contact)
                <option value="{{$contact->id}}">{{$contact->name . ' ' . $contact->lastname}}</option>
                @endforeach
            </select>
        </div>
{{--        <div data-editable data-name="contact-content" class="mout-bo-estimation-contact-content-test">--}}
{{--            <blockquote>--}}
{{--                <label for="exampleFormControlSelect1">Example select</label>--}}
{{--                <select class="form-control" id="exampleFormControlSelect1">--}}
{{--                    <option value="1">1</option>--}}
{{--                    <option value="2">2</option>--}}
{{--                    <option value="3">3</option>--}}
{{--                    <option value="4">4</option>--}}
{{--                    <option value="5">5</option>--}}
{{--                </select>--}}
{{--            </blockquote>--}}
{{--        </div>--}}
    </div>


    <div data-editable data-name="main-content">
        <table class="table table-hover mout-estimation-table">
            <thead>
            <tr>
                <th>Description</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/wysiwyg/content-tools.js')}}"></script>

    <script src="{{asset('js/contentTools/imageUploaderHelper.js')}}"></script>
    <script src="{{asset('js/contentTools/saves-content-tools.js')}}"></script>

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            const select = $('select');--}}
{{--            const blockquote = $('.mout-bo-estimation-contact-content-test > blockquote');--}}

{{--            select.change(function (e) {--}}
{{--                blockquote.text($(this).val());--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
@endsection
