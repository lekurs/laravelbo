@extends('admin-layout')

@section('title', 'Nos devis')

@section('body')
    <h2 class="admin-title">Nos devis</h2>

    <div class="mout-create-navigation-container">
        <a href="{{route('addClient')}}" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </a>
    </div>

    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75 search-bar" type="text" placeholder="Search"
               aria-label="Search">
    </form>

        <?php var_dump($data); ?>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script>
    $('.search-bar').autocomplete({
        minLength: 3,
        source: <?php $data; ?>
    });
</script>
@endsection
