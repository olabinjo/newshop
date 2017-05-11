<option value=""></option>
<option value="+">Add New Category</option>
@foreach($categories as $category)
    <option value="{{$category->name}}">{{$category->name}}</option>
@endforeach
