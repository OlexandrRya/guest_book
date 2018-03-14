<div class="container">
	<div class="row row-task">
		<div class="col"><span>{{$article->user_name}}</span></div>
		<div class="col"><span>{{$article->email}}</span></div>
		<div class="col"><span>{{$article->homepage}}</span></div>
		<div class="col"><p>{{$article->text}}</p></div>
		@if (isset($article->file))
			<div class="col"><img src="/file/{{$article->file}}" ></div>
		@endif
	</div>
</div>