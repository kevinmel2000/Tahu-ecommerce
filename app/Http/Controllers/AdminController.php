<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TahuBulat;
use Auth;


class AdminController extends Controller
{
    //
    public function getTambah(){
    	return view('admin.admin_tambah_item');
    }

    public function postEdit(Request $request){
        $id = $request['postId'];

        $this->validate($request,[
            'judul' => 'required',
            'desk'  => 'required',
            'img'  =>  'required',
            'hrg'  =>  'required'
        ]);

        $tahu = TahuBulat::find($id);
        $tahu->judul_tahu = $request['judul'];
        $tahu->deskripsi = $request['desk'];
        $tahu->imagePath = $request['img'];
        $tahu->harga     = $request['hrg'];

        $tahu->update();
        return response()->json(['judulbaru' => $tahu->judul_tahu,
                                 'hargabaru' => $tahu->harga,
                                 'deskripsibaru'=> $tahu->deskripsi ,
                                 'imgbaru' => $tahu->imagePath
                                ],200);
        /*return response()->json(['message'  => $request['judul'],
                                 'message1' => $request['desk'],
                                 'message2' => $request['hrg'],
                                 'message3' => $request['img'],
                                 'message4' => $request['postId'],
                                 'message6' => $id
                                             ]);*/
    }


    public function postTambah(Request $request){

    	$this->validate($request,[
				'judul_tahu'=> 'required | max:50',
				'deskripsi'=>  'required | max:100',
				'imagePath'=>  'required | max:300',
				'harga'    =>  'required | max:5'
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

   public function getDeletePost($post_id)
   {
    $tahu = TahuBulat::where('id', $post_id)->first();
    if (Auth::user()->id != $tahu->user_id) {
        # code...
        return redirect()->back();
    }
    $tahu->delete();
    return redirect()->route('admin.profile')->with(['message'=>' berhasil dihapus']);
   }

   
}
