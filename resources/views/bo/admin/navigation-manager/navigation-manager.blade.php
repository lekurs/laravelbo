@extends('admin-layout')
@section('title', 'Navigation')

@section('body')
<h2 class="admin-title">Modification du menu</h2>

<div id="navigation">
    <form action="#" id="my-nav" class="form" method="post">
        <ul class="drag-nav">
            @foreach($navigations as $navigation)
            <li class="drag-nav-list">{{ $navigation->wording }}
                <input type="text" class="position-nav" value="{{ $navigation->position }}">
                <input type="text" class="position-parent-nav-depth" value="{{ $navigation->parentOrder }}">
            </li>
{{--            <li class="drag-zone"></li>--}}
@endforeach
        </ul>
{{--        <button type="submit" class="btn btn-dark">Enregistrer</button>--}}
    </form>
</div>
{{--    @empty($navigation)--}}
        <p>Pas de navigation</p>


<div class="mout-create-navigation-container">
    <button type="button" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </button>
</div>

<div class="mout-create-navigation-content">
</div>

@endsection

{{--@section('js')--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>--}}
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
