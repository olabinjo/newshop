@extends('layouts.master')

@section('content')
    

    <h1>Edit {{ $productImage->image_name. '.' . $productImage->image_extension }}</h1>


    <hr/>

    @include('errors.errors')

<div>
    Note: name and path values cannot be changed.  If you wish to change these, then delete and create a new photo:
</div>
    <br>

    {!! Form::model($productImage, ['route' => ['productimage.update', $productImage->id],
    'method' => 'PATCH',
    'class' => 'form',
    'files' => true]
    ) !!}


    <!-- image name Form Input -->
    <div>


        <ul>
            <li><h4>Image Name:   {{ $productImage->image_name. '.' . $productImage->image_extension }}  </h4></li>
            <li><h4>Image Path:   {{ $productImage->image_path }} </h4> </li>
            <li><h4>Mobile Name:   {{ $productImage->mobile_image_name. '.' . $productImage->mobile_extension }} </h4> </li>
            <li><h4>Mobile Path:   {{ $productImage->mobile_image_path }} </h4></li>

        </ul>
    </div>

    <!-- is_something Form Input -->
    <div class="form-group">
        {!! Form::label('is_active', 'Is Active:') !!}
        {!! Form::checkbox('is_active') !!}
    </div>

    <!-- is_featured Form Input -->
    <div class="form-group">
        {!! Form::label('is_featured', 'Is Featured:') !!}
        {!! Form::checkbox('is_featured') !!}
    </div>
    <!-- form field for file -->
    <div class="form-group">
        {!! Form::label('image', 'Primary Image') !!}
        {!! Form::file('image', null, array('class'=>'form-control')) !!}
    </div>

    <!-- form field for file -->
    <div class="form-group">
        {!! Form::label('mobile_image', 'Mobile Image') !!}
        {!! Form::file('mobile_image', null, array('class'=>'form-control')) !!}
    </div>

    <div class="form-group">

        {!! Form::submit('Edit', array('class'=>'btn btn-primary')) !!}

    </div>

    {!! Form::close() !!}
    <div>
        {!! Form::model($productImage, ['route' => ['productimage.destroy', $productImage->id],
        'method' => 'DELETE',
        'class' => 'form',
        'files' => true]
        ) !!}

        <div class="form-group">

            {!! Form::submit('Delete Photos', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}

        </div>

        {!! Form::close() !!}



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