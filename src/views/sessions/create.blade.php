@extends('krafthaus/bauhaususer::layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">

			<div class="account-wall">
				<img class="profile-img" src="data:image/png;base64,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"/>

				@if (Session::has('message.success'))
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>{{ trans('bauhaususer::messages.success.title') }}</strong>
						{{ Session::get('message.success') }}
					</div>
				@endif

				@if (Session::has('message.error'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>{{ trans('bauhaususer::messages.error.title') }}</strong>
						{{ Session::get('message.error') }}
					</div>
				@endif

				{{ Form::open(['method' => 'POST', 'route' => 'admin.sessions.store', 'class' => 'form-signin']) }}

				{{ Form::text('email',null,['placeholder'=>trans('bauhaususer::form.field.email.title'),'required','autofocus','class'=>'form-control'])}}
				{{ Form::password('password',['placeholder'=>trans('bauhaususer::form.field.password.title'),'required','class'=>'form-control'])}}

				{{Form::submit(trans('bauhaususer::form.field.submit.title'),['class'=>'btn btn-lg btn-primary btn-block'])}}
					<label class="checkbox pull-left">
						<input type="checkbox" value="remember-me">
						{{ trans('bauhaususer::form.remember-me') }}
					</label>
				{{ Form::close() }}


				<div class="clearfix"></div>
			</div>

		</div>
	</div>
@stop
