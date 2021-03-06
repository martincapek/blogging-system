<tr>
    <td>
        <div style="padding-left: {{ $category->depth*10 }}px">@if($category->depth > 0)
                - @endif{{ $category->name }}</div>
    </td>
    <td>{{ $category->description }}</td>
    <td class="visible-lg visible-md">{{ $category->created_at->format('j. F Y, H:i') }}</td>
    <td>
        @if(!($category->slug == 'uncategorized'))
        <a href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;
        &nbsp; <a href="{{ route('categories.destroy', $category->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
        @endif

    </td>
</tr>


@if (count($category->children) > 0)
    <tr>
        @foreach($category->children as $category)
            @include('partials._single_row_table_category', $category)
        @endforeach
    </tr>
@endif