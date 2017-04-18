@extends('layouts.app')

@section('content')

 <br>

    <div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">List of Marketing Images </div>
            <div class="panel-body">
            <a href="/image/create"> <button type="button" class="btn btn-lg btn-success">
                     Create New </button> </a>
            </div>

            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Id </th>
                    <th>Name </th>
                    <th>Thumbnail </th>
                    <th>Edit </th>
                    <th>Delete </th>
                </tr>
    @foreach($images as $image )

                    <tr>
                        <td>{{ $image->id }}  </td>
                        <td>{{ $image->image_name }} </td>
                        <td> <a href="/productimage/{{ $image->id  }}">
                                <img src="/imgs/product/thumbnails/{{ 'thumb-'. $image->image_name . '.' .
                               $image->image_extension . '?'. 'time='. time() }}"> </a> </td>
                        <td>  <a href="/productimage/{{ $image->id }}/edit">
                                <span class="glyphicon glyphicon-edit"          
                                 aria-hidden="true"> </span> </a> </td>
                        <td>{!! Form::model($image, ['route' => ['image.destroy', $image->id],
                                    'method' => 'DELETE'
                      ]) !!}
                        <div class="form-group">

                        {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}

                         </div>
                         {!! Form::close() !!} </td>
                    </tr>
        @endforeach
            </table>
        </div>
    </div>

   @endsection
@section('scripts')
    <script>

       function ConfirmDelete()
       {
           var x = confirm("Are you sure you want to delete?");
           if (x)
               return true;
           else
               return false;
       }

    </script>

   @endsection