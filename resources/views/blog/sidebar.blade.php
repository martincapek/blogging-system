<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <div class="input-group" style="width: 100%;">
        <form action="{{ route('blog.search') }}" method="post">
            {{ csrf_field() }}

            <div class="input-group">
                <input type="text" class="form-control" name="s" placeholder="Search for...">
                <span class="input-group-btn">
        <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>

        </form>
    </div>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">


        @foreach($categories as $c)
            @if($loop->iteration % $devided_by == 0)
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        @endif

                        <li class="{{ (isset($cur_cat)&&$cur_cat->id==$c->id)?'active':'' }}"><a
                                    href="{{ route('blog.category', $c->slug) }}">{{ $c->name }}</a>

                        @if($loop->iteration % $devided_by == 0)
                    </ul>
                </div>
            @endif
        @endforeach
    </div>
    <!-- /.row -->


</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Latest posts</h4>
    <div class="row">


    </div>
    <!-- /.row -->
</div>