@foreach($items as $item)

    <li  class="@if($item->hasChildren()) dropdown @endif @if($item->isActive) active @endif"   >
        @if($item->hasChildren())
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">{!! $item->title !!} <span
                        class="caret"></span></a>
        @else
            <a href="{!! $item->url() !!}">{!! $item->title !!} </a>
        @endif
        @if($item->hasChildren())
            <ul class="dropdown-menu">
                @include('frontend.custom-menu', array('items' => $item->children()))
            </ul>
        @endif
    </li>
@endforeach
