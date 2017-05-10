// After the API loads, call a function to enable the search box.
function handleAPILoaded() {
    $('#search-button').attr('disabled', false);
}

// Search for a specified string.
function search() {
    var q = $('#product_name').val();
    var request = gapi.client.youtube.search.list({
        q: q,
        part: 'snippet'
    });

    request.execute(function (response) {
        var str = JSON.stringify(response.result);
        $('#search-container').html('');
        if (response.items && response.items.length > 0) {
            response['items'].forEach(function (item) {
                $('#search-container').append('<div class="media"><div class="media-left"><a target="_blank" href="https://www.youtube.com/watch?v=' + item.id.videoId + '"><img class="media-object" src="' + item.snippet.thumbnails.default.url + '" alt="' + item.snippet.title + '"> </a> </div> <div class="media-body"> <a target="_blank" href="https://www.youtube.com/watch?v=' + item.id.videoId + '"><h4 class="media-heading">' + item.snippet.title + '</h4></a>' + item.snippet.description + '<div><button type="button" class="btn embed-youtube" data-youtubeid="' + item.id.videoId + '">Embed</button></div> </div></div>')
            });
        }

        embedClick();
    });

    function embedClick() {
        $(".embed-youtube").click(function () {
            $(".embed-youtube").removeClass("btn-success");
            $(this).addClass("btn-success");
            $("#youtube_id").val($(this).data('youtubeid'));
        });
    }

}
