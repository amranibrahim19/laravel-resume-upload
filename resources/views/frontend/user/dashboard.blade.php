@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#resumes" aria-controls="resumes" role="tab" data-toggle="tab">All Resumes</a>
                            </li>
                            <li role="presentation">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.my_information') }}</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" role="tabpanel" id="resumes">
                                

                                <table class="table table-bordered">
					<thead>
						<th>Title</th>
						<th>Upload Date</th>
						<th>Action</th>
					</thead>

					<tbody>

					@foreach($downloads as $down)
						<tr>
							<td>{{$down->name}}</td>
							<td>{{$down->created_at}}</td>
							<td>
							<a href="/uploads/resumes/{{$down->file}}" download="/uploads/resumes/{{$down->file}}">
                           
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									Download
								</i>
								</button>
							</a>
                            <a href="../uploads/resumes/{{$down->file}}" download="../uploads/resumes/{{$down->file }}"> <button type="button" class="btn btn-primary">Dowanload</button></a>
							</td>
						</tr>
					@endforeach

					</tbody>
				</table>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="profile">
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
                            </div><!--tab panel profile-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection

