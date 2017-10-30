@extends('layout.master')

@section('title')
    Halaman Admin
@endsection

@section('content')
@include('notif.message')

	<div class="row panel panel-default">
	  <div class="panel-heading">Tabel Tahu</div>
	  <div class="panel-body">
	  	<a  href="{{route('admin.tambah')}}" class="btn btn-success">Tambah Item</a>
	  	<hr>
		   <table id="example" class="table table-hover">
				<thead>
					<tr>
						<td>Jenis Tahu</td>
						<td>Deskripsi</td>
						<td>Harga</td>
						<td>Gambar</td>
						<td>Edit</td>
						<td>Hapus</td>
					</tr>
				</thead>
				<tbody>
				
					@foreach($tabul as $tahubulat)
					<tr class="isitahu" data-postid="{{ $tahubulat->id }}">
						<td id="judul_tahu1" name="judul_tahu1" >{{$tahubulat->judul_tahu}}</td>
					    <td id="deskripsi1" name="deskripsi">{{$tahubulat->deskripsi}}</td>
					    <td id="harga_tahu1" name ="harga_tahu1">{{$tahubulat->harga}}</td>
					    <td id="imagePath1" name="imagePath1"><img src="{{$tahubulat->imagePath}}" class="poto-tahu" id="gambartahu"></td>
					    <td class="interaction"><a class="btn btn-default edit" href="#" role="button">Edit</a></td>
					    <td><a class="btn btn-danger" href="{{ route('post.delete' ,['post_id' => $tahubulat->id]) }}" role="button">Hapus</a></td>
				    </tr>
				    @endforeach
				
				</tbody>
		  </table>
	  </div>
	</div>

		<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Edit </h4>
		      </div>
		      <div class="modal-body">
		       <form>
		        	<div class="form-group">
		       			<label for="post-body">Judul Tahu</label>
		       			<input type="text" class="form-control" id="judul_tahu" name="judul_tahu">
		       		</div>
		       		<div class="form-group">
		       			<label for="post-body">Harga Tahu</label>
		       			<input type="text" class="form-control" id="harga_tahu" name="harga_tahu">
		       		</div>
		       		<div class="form-group">
		       			<label for="post-body">Gambar Tahu</label>
		       			<input type="text" class="form-control" id="imagePath" name="imagePath
		       			">
		       		</div>
		       		<div class="form-group">
		       			<label for="post-body">Deskripsi</label>
		       			<textarea class="form-control" name="post-body" id="deskripsi" name="deskripsi" rows="5"></textarea>
		       		</div>
		       </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
var token ='{{Session::token()}}'
var url  = '{{route('admin.edit')}}'
</script>

@endpush