@if(isset($errors) && count($errors)>0)
	<div class="alert alert-dimissable alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidde="true">&times;</span>			
		</button>
		@foreach($errors->all() as $error)
			<li><strong>{{ $error }}</strong></li>
		@endforeach
	</div>
@endif