@extends('frontend.layouts.master')

@section('content')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_posting_photo.svg" alt="" style="width: 50%;">
    <h1 class="display-5 fw-bold">Centered hero</h1>
    <div class="col-lg-10 mx-auto">
        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
        </div>
    </div>
</div>

<div class="col-md-12">

    <form action="{{route('frontend.submit')}}" method="post" enctype='multipart/form-data'>
        @csrf

        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">PERSONAL DETAILS</h3>
            </div>

            <div class="card-body">
                <label class="form-label">Name*</label>
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Name" required>
                </div>
                <label class="form-label">Email*</label>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email" required>
                </div>
                <label class="form-label">Phone Number*</label>
                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control mb-3" placeholder="Phone Number" required>
                </div>

                <label class="form-label">Gender</label>
                <div class="radio">

                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input mb-3" type="radio" name="gender" value="male" required>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input mb-3" type="radio" name="gender" value="female" required>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>

                <label class="form-label">Address*</label>
                <div class="form-group">
                    <input type="text" name="address" id="address" class="form-control mb-3" placeholder="Address" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">State*</label>
                        <div class="form-group">
                            <input type="text" name="state" id="state" class="form-control mb-3" placeholder="State" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Postcode*</label>
                        <div class="form-group">
                            <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Post Code" required>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="date_of_birth" class="form-label">DOB</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" required class="form-control mb-3" placeholder="01-01-1900">
                </div>

                <div class="form-group">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <span class="btn-file">
                            <span class="fileupload-new" class="form-label">Upload your resume</span>

                            <input type="file" name="file" id="file" accept=".pdf, .doc" required>
                            <small class="text-warning">Format: DOC and PDF format only</small>
                        </span>
                    </div>
                </div>

            </div>

            <div class="card-footer">
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