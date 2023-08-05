@extends('frontend.layouts.master')

@section('content')
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="card">
            <div class="card-header">{{ trans('navs.frontend.dashboard') }}</div>

            <div class="card-body">

                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">
                            All Resumes
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">
                            My Information
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">
                            My Download
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <table class="table table-bordered">
                            <thead>
                                <th>Title</th>
                                <th>Upload Date</th>
                                <th>Action</th>
                            </thead>

                            <tbody>

                                @foreach($resume as $data)
                                <tr>
                                    <td>
                                        <input type="text" name="id" id="id" value="{{$data->id}}">
                                    </td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <!-- <a href="{{$data->file}}" download="{{$data->file}}">

                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-download"></i>
                                                Download
                                            </button>
                                        </a> -->

                                        <a href="{{route('frontend.user.download')}}">

                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-download"></i>
                                                Download
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <table class="table table-striped table-hover table-bordered dashboard-table">
                            <tr>
                                <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
                                <td><img src="{!! $user->picture !!}" class="user-profile-image" /></td>
                            </tr>
                            <tr>
                                <th>{{ trans('labels.frontend.user.profile.name') }}</th>
                                <td>{!! $user->name !!}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('labels.frontend.user.profile.email') }}</th>
                                <td>{!! $user->email !!}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
                                <td>{!! $user->created_at !!} ({!! $user->created_at->diffForHumans() !!})</td>
                            </tr>
                            <tr>
                                <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                                <td>{!! $user->updated_at !!} ({!! $user->updated_at->diffForHumans() !!})</td>
                            </tr>
                            <tr>
                                <th>{{ trans('labels.general.actions') }}</th>
                                <td>
                                    <a href="{!! route('frontend.user.profile.edit') !!}" class="btn btn-primary btn-xs">{{ trans('labels.frontend.user.profile.edit_information') }}</a>

                                    @if ($user->canChangePassword())
                                    <a href="{!! route('auth.password.change') !!}" class="btn btn-warning btn-xs">{{ trans('navs.frontend.user.change_password') }}</a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                        <table class="table table-bordered">
                            <thead>
                                <th>No.</th>
                                <th>Download Date</th>
                                <!-- <th>Action</th> -->
                            </thead>

                            <tbody>

                                @foreach($resume as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <!-- <td>
                                        <a href="{{$data->file}}" download="{{$data->file}}">

                                            <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-download"></i>
                                                Download
                                            </button>
                                        </a>
                                    </td> -->
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection