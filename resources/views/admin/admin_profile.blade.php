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
						<td>Gambar</td>
						<td>Harga</td>
						<td>Edit</td>
						<td>Hapus</td>
					</tr>
				</thead>
				<tbody>
				
					@foreach($tabul as $tahubulat)
					<tr>
						<td>{{$tahubulat->judul_tahu}}</td>
					    <td>{{$tahubulat->deskripsi}}</td>
					    <td><img src="{{$tahubulat->imagePath}}" class="poto-tahu"></td>
					    <td>{{$tahubulat->harga}}</td>
					    <td><a class="btn btn-default" href="#" role="button">Edit</a></td>
					    <td><a class="btn btn-danger" href="#" role="button">Hapus</a></td>
				    </tr>
				    @endforeach
				
				</tbody>
		  </table>
	  </div>
	</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush