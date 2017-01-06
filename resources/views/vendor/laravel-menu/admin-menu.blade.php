@foreach($items as $item)
    <li class="{{ $item->attributes['class'] or "" }} {{ $item->hasChildren()?"treeview":"" }}">
        @if($item->hasChildren())
            <a href="#"><i class="fa {{ $item->attributes['icon'] or "" }}"></i>
                <span>{{ $item->title }}</span></a>

            <ul class="treeview-menu">
               @include('vendor.laravel-menu.admin-menu', ['items' => $item->children()])
            </ul>
        </li>

        @else
            <a href="{{ $item->url() }}"><i class="fa {{ $item->attributes['icon'] or "" }}"></i>
                <span>{{ $item->title }}</span></a></li>
    @endif
@endforeach

