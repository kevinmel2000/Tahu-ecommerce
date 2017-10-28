@extends('layout.master')

@section('title')
    Halaman Utama
@endsection

@section('content')
     <div class="page-header">
 		 <h1>Tidak punya akun? <small>Silahkan Daftar</small></h1>
	</div>
	@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
	@endif

	<div class="well">
	<hr>
	<div >
		
		<form class="form-horizontal" action="{{route ('guest.signup') }}" method="post">
		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
		    </div>
		  </div>
		   <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">Nama</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Sign up</button>
		      {{ csrf_field() }}
		    </div>
		  </div>
		</form>
	</div>
</div>
<hr>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>



@endsection

