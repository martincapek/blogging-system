@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12  clearfix">
            <div class="box box-primary">

                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th class="visible-lg visible-md">Perex</th>
                        <th class="visible-lg visible-md">Category</th>
                        <th class="visible-lg visible-md">Views</th>
                        <th class="visible-lg visible-md">Comments</th>
                        <th class="visible-lg visible-md">Created at</th>
                        <th width="100">Actions</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td class="visible-lg visible-md">{{ $post->perex }}</td>
                            <td class="visible-lg visible-md">{{ $post->category->name or "Doesn't have category" }}</td>
                            <td class="visible-lg visible-md">{{ $post->views }}</td>
                            <td class="visible-lg visible-md">{{ $post->comments->count() }}</td>
                            <td class="visible-lg visible-md">{{ $post->created_at->diffForHumans() }}</td>
                            <td>
                                @if(isset($status) && $status == 'deleted')
                                    <a href="{{ route('posts.restore', $post->id) }}"><i class="fa fa-recycle"
                                                                                         aria-hidden="true"></i></a>
                                @else
                                    @permission('edit-post')
                                    <a href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil"
                                                                                      aria-hidden="true"></i></a>
                                    @endpermission('edit-post')&nbsp;&nbsp;
                                    @permission('list-comment')
                                    <a href="{{ route('posts.comments', $post->id) }}"><i class="fa fa-comment"
                                                                                          aria-hidden="true"></i></a>
                                    @endpermission('list-comment')
                                    &nbsp;
                                    @permission('delete-post')
                                    <a href="{{ route('posts.destroy', $post->id) }}"><i class="fa fa-trash"
                                                                                         aria-hidden="true"></i></a>
                                    @endpermission('delete-post')

                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
