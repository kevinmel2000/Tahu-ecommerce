<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TahuBulat;


class AdminController extends Controller
{
    //
    public function getTambah(){
    	return view('admin.admin_tambah_item');
    }


    public function postTambah(Request $request){

    	$this->validate($request,[
				'judul_tahu'=> 'required | max:50',
				'deskripsi'=>  'required | max:100',
				'imagePath'=>  'required | max:300',
				'harga'    =>  'required| max:5'
			]);

    	$tahu = new TahuBulat();
    	$tahu->judul_tahu = $request['judul_tahu'];
    	$tahu->deskripsi = $request['deskripsi'];
    	$tahu->imagePath = $request['imagePath'];
    	$tahu->harga	 = $request['harga'];
    	$message = 'ada error';
    	if ($request-> user()->tahubulat()->save($tahu)) {
    		# code...
    		$message= '1item Tahu berhasil d tambah';
    	}
    	return redirect()->route('admin.profile')->with(['message'=> $message]);
    	
    }

}
