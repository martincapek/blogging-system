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
<div class="col-md-6">
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
                       value="{{ $post->title or "" }}">
            </div>

            <div class="form-group">
                <label for="perex">Perex</label>
                <textarea name="perex" class="form-control" id="perex" placeholder="">{{ $post->perex or "" }}</textarea>
            </div>

            <div class="form-group">
                <label for="text">Content</label>
                <textarea name="text" class="form-control" id="text" placeholder="">{{ $post->text or "" }}</textarea>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;">

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
                <img id="image_holder" src="{{ $post->image or "" }}" style="margin-top:15px;max-height:100px;">

            </div>

        </div>
        <!-- /.box-body -->


    </div>
</div>


<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">SEO and OG info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->


        <div class="box-body">
            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="">
            </div>
            <div class="form-group">
                <label for="seo_description">SEO Description</label>
                <textarea name="seo_description" class="form-control" id="seo_description"
                          placeholder=""></textarea>
            </div>

            <div class="form-group">
                <label for="seo_tags">SEO Tags</label>
                <textarea name="seo_tags" class="form-control" id="seo_tags" placeholder=""></textarea>
            </div>


            <div class="form-group">
                <label for="og_title">OG:Title</label>
                <input type="text" class="form-control" id="og_title" name="og_title" placeholder="">
            </div>
            <div class="form-group">
                <label for="og_description">OG:Description</label>
                <textarea name="og_description" class="form-control" id="og_description"
                          placeholder=""></textarea>
            </div>

            <div class="form-group">
                <label for="og_tags">OG:Tags</label>
                <textarea name="og_tags" class="form-control" id="og_tags" placeholder=""></textarea>
            </div>

            <div class="form-group">
                <label for="thumbnail">OG:Image</label>
                <div class="input-group">
                          <span class="input-group-btn">
                            <a id="lfm" data-input="og_image" data-preview="og_image_holder" class="btn btn-primary">
                              <i class="fa fa-picture-o"></i> Choose
                            </a>
                          </span>
                    <input id="og_image" class="form-control" type="text" name="og_image">
                </div>
                <img id="og_image_holder" style="margin-top:15px;max-height:100px;">

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
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>
@endsection

