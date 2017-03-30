<div class="col-md-12 text-right">
    <div class="box">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Publish</button>
            <a type="submit" class="btn btn-danger" href="{{ route('categories.list') }}">Cancel</a>
        </div>
    </div>

</div>
{{ csrf_field() }}
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Basic info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->


        <div class="box-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="name" name="name" placeholder=""
                       value="{{ $category->name or "" }}">
            </div>

            <div class="form-group">
                <label for="perex">Perex</label>
                <textarea name="description" class="form-control" id="description"
                          placeholder="">{{ $category->description or "" }}</textarea>
            </div>



            <div class="form-group">
                <label for="thumbnail">Featured Image</label>
                <div class="input-group">
                          <span class="input-group-btn">
                            <a id="lfm" data-input="image" data-preview="image_holder" class="btn btn-primary">
                              <i class="fa fa-picture-o"></i> Choose
                            </a>
                          </span>
                    <input id="image" class="form-control" type="text" name="image" value="{{ $post->image or "" }}">
                </div>
                <img id="image_holder" src="{{ $post->image or "" }}" style="margin-top:15px;max-height:100px;">

            </div>

        </div>
        <!-- /.box-body -->


    </div>
</div>






@section('additional_scripts')

    <script src="/js/select2.full.min.js"></script>

    <script>
        $(".select2").select2();

        $('#lfm').filemanager('image');


    </script>
@endsection

