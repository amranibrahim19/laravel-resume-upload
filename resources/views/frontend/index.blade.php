@extends('frontend.layouts.master')

@section('content')
<div class="jumbotron">
    <!-- <h1>Resume Uploader</h1> -->
    <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <p><a class="btn btn-primary btn-lg">Learn more</a></p>
</div>
<div class="col-md-12"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->


    <form action="{{route('frontend.submit')}}" method="post" enctype='multipart/form-data'>
        @csrf

        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">PERSONAL DETAILS</h3>
            </div>

            <div class="panel-body">
                <label>Name*</label>
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
                <label>Phone Number*</label>
                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
                </div>

                <label>Gender</label>
                <div class="radio">

                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" required>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" required>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>

                <label>Address*</label>
                <div class="form-group">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>State*</label>
                        <div class="form-group">
                            <input type="text" name="state" id="state" class="form-control" placeholder="State" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Postcode*</label>
                        <div class="form-group">
                            <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Post Code" required>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="date_of_birth">DOB</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" required class="form-control" placeholder="01-01-1900">
                </div>

                <div class="form-group">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="btn-file">
                            <span class="fileupload-new">Upload your resume</span>

                            <input type="file" name="file" id="file" accept=".pdf, .doc" required>
                            <small class="text-warning">Format: DOC and PDF format only</small>
                        </span>
                    </div>
                </div>

            </div>

            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


</div>

@endsection

@section('after-scripts-end')
<script>
    //Being injected from FrontendController
    console.log(test);
</script>
@stop