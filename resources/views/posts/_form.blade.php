<div class="col-md-12 text-right">
    <div class="box">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="publish" value="1">Publish</button>
            <button type="submit" class="btn btn-warning" name="publish" value="0">Save as draft</button>
            <a type="submit" class="btn btn-danger" href="{{ route('posts.list') }}">Cancel</a>
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
                <input type="text" class="form-control" id="title" name="title" placeholder=""
                       value="{{ $post->title or old('title') }}">
            </div>

            <div class="form-group">
                <label for="perex">Perex</label>
                <textarea name="perex" class="form-control" id="perex"
                          placeholder="">{{ $post->perex or old('perex') }}</textarea>
            </div>

            <div class="form-group">
                <label for="text">Content</label>
                <textarea name="text" class="form-control" id="text"
                          placeholder="">{{ $post->text or old('text') }}</textarea>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;" name="category_id">
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach

                </select>
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
                <img id="image_holder" src="{{ $post->image or old('image') }}"
                     style="margin-top:15px;max-height:100px;">

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
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.

            CKEDITOR.replace('text', {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
               //  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
               // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>
@endsection

