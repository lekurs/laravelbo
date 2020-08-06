@extends('admin-layout')
@section('title', 'Navigation')

@section('body')
<h2 class="admin-title">Modification du menu</h2>

<div id="navigation">
    <div class="dd">
        <ol class="dd-list">
        @foreach($navigations as $navigation)
            <li class="dd-item" data-id="{{$navigation->id}}">
                <div class="dd-handle">{{$navigation->wording}}</div>
{{--                <div class="dd-handle">Item 1</div>--}}
{{--            </li>--}}
{{--            <li class="dd-item" data-id="2">--}}
{{--                <div class="dd-handle">Item 2</div>--}}
{{--            </li>--}}
{{--            <li class="dd-item" data-id="3">--}}
{{--                <div class="dd-handle">Item 3</div>--}}
{{--                <ol class="dd-list">--}}
{{--                    <li class="dd-item" data-id="4">--}}
{{--                        <div class="dd-handle">Item 4</div>--}}
{{--                    </li>--}}
{{--                    <li class="dd-item" data-id="5">--}}
{{--                        <div class="dd-handle">Item 5</div>--}}
{{--                    </li>--}}
{{--                </ol>--}}
            </li>
        @endforeach
        </ol>
        <form action="" id="form-navigation">
            <textarea name="navigation" id="nestable-output"></textarea>

        </form>
        <button type="button" class="btn btn-dark mout-add-menus-button">Enregistrer</button>
    </div>

{{--    <ul class="drag-nav">--}}
{{--        @foreach($navigations as $navigation)--}}
{{--        <li class="drag-nav-list" id="{{$navigation->id}}" data-level="0">{{ $navigation->wording }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
</div>
{{--    @empty($navigation)--}}
        <p>Pas de navigation</p>


<div class="mout-create-navigation-container">
    <button type="button" class="btn mout-save-menus-button"><i class="fas fa-plus"></i> </button>
</div>

<div class="mout-create-navigation-content">
</div>

@endsection

{{--@section('js')--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--<script src="https://code   .jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('ul.drag-nav').sortable({--}}
{{--            placeholder: "ui-test",--}}
{{--            change: function (e, ui) {--}}
{{--                //gestion des sous-menus--}}
{{--                ui.item.removeClass('nav-depth')--}}
{{--                if (ui.item.css('left') > 30 + 'px') {--}}
{{--                    ui.item.addClass('nav-depth');--}}
{{--                    console.log($(this).find('input' + '.position-parent-nav-depth'))--}}
{{--                    let child = $(this).find('.nav-depth');--}}
{{--                    console.log(child);--}}
{{--                    child.each(function () {--}}
{{--                        let positionChild = 0;--}}
{{--                        $(this).find('.position-parent-nav-depth').val(positionChild);--}}
{{--                    })--}}
{{--                }--}}
{{--            },--}}
{{--            update: function (e, ui) {--}}
{{--                let list = $(this);--}}
{{--                let position = 0;--}}
{{--                list.find('li').each(function () {--}}
{{--                    position++;--}}
{{--                    $(this).find('input').val(position);--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--        $( "ul.drag-nav" ).disableSelection();--}}
{{--    });--}}
{{--</script>--}}
{{--@endsection--}}
