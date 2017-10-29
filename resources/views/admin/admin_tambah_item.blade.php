@extends('layout.master')

@section('title')
    Halaman Admin
@endsection

@section('content')
	
  <div class="page-header">
 		 <h1>Tambah Item Tahu </h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
		<form action="{{route('admin.tambah')}}" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Tahu</label>
			    <input type="text" class="form-control" id="judul_tahu" name="judul_tahu">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Deskripsi Tahu</label>
			   <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Harga</label>
			    <input type="text" class="form-control" id="harga" name="harga">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Url Gambar Tahu</label>
			    <input type="text" class="form-control" id="imagePath" name="imagePath">
			  </div>
		 	 <button type="submit" class="btn btn-default">Tambah</button>
		 	  {{ csrf_field() }}
		</form>
  </div>
</div>
@endsection
