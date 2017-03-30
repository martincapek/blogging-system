@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 clearfix">
            <div class="box box-primary">

                <table class="table table-bordered">
                    <tr>
                        <th class="">Author</th>
                        <th class="">Content</th>
                        <th class="">Actions</th>
                    </tr>
                    @foreach($comments as $comment)
                        <tr class=" {{ (!$comment->allowed)?'text-danger':"" }}">
                            <td>{{ $comment->user->name}}</td>
                            <td class="visible-lg visible-md">{{ $comment->content }}</td>
                            <td>
                                @if(!$comment->allowed)
                                    <a href="{{ route('comment.allow', $comment->id) }}"><i class="fa fa-check"
                                                                                            aria-hidden="true"></i></a>
                                @endif
                                <a href="{{ route('comment.destroy', $comment->id) }}"><i class="fa fa-trash"
                                                                                          aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
