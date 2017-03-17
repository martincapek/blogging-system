<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{ $comment->user->name }}
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </h4>


        {{ $comment->content }}.

        @if (count($comment->children) > 0)
            @foreach($comment as $comment)
                @include('blog._single_comment', $comment->children)
            @endforeach
        @endif
    </div>
</div>
