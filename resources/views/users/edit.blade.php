@extends('layouts.app')

@section('content')
    <div class="row">
        <form role="form" action="{{ route('users.update', $user->id) }}" method="POST">
            <div class="col-md-12 text-right">
                <div class="box">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
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
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder=""
                                   value="{{ $user->name or old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="{{ $user->email or old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control select2" style="width: 100%;" name="role">
                                @foreach($roles as $r)
                                    <option value="{{ $r->id }}" {{ $r->id == $role?"selected":"" }}>{{ $r->name }}</option>
                                @endforeach

                            </select>
                        </div>


                    </div>
                    <!-- /.box-body -->


                </div>
            </div>
        </form>
    </div>
@endsection


@section('additional_scripts')

    <script src="/js/select2.full.min.js"></script>

    <script>
        $(".select2").select2();
    </script>
@endsection

