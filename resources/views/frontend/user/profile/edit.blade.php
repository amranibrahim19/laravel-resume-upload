@extends('frontend.layouts.master')

@section('content')
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                Update Profile
            </div>

            <div class="panel-body">

                <form action="{{route('frontend.user.profile.update')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-4 control-label'">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4 control-label'">
                            <label for="name">Email:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!--panel body-->

        </div><!-- panel -->

    </div><!-- col-md-10 -->

</div><!-- row -->
@endsection