
<option {{ (isset($parent_category)&&$category->id == $parent_category)?'selected':'' }} value="{{ $category->id }}">@for($i = 0; $i < $category->depth; $i++)&nbsp;@endfor @if($category->depth > 0) - @endif{{ $category->name }}</span></option>


@if (count($category->children) > 0)


        @foreach($category->children as $category)
            @include('partials._single_select_option_category', $category)
        @endforeach

@endif