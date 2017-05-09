@foreach($images as $image)
    <img class="image" src="/uploads/{{$image-> original_filename}}"
         width="100px" height="100px">
@endforeach

<script>
    var response = "";

    @foreach($images as $image)
            response += '<img class="image" src="/uploads/{{$image-> original_filename}}" width="100px" height="100px">'
    @endforeach

        parent.upload_completed(response);
</script>