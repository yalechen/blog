@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
					<form action="{{route('FileUpload')}}" method="post" enctype="multipart/form-data">
                        <input type="file" name="file" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="保存" />
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
