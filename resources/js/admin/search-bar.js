const $search = $('.search-bar');

$search.search({
    minLength: 3,
    source: $search.data('source')
});
