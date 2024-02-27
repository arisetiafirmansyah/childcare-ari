<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_model;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class Home extends BaseController
{
    public function index()
    {
        
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            echo view('login', ['num1' => $num1, 'num2' => $num2]);

    
}
public function aksi_login()
{
    $u = $this->request->getPost('username');
    $p = $this->request->getPost('password');
    $num1 = $this->request->getPost('num1'); // Get the first number from the form
    $num2 = $this->request->getPost('num2'); // Get the second number from the form
    $captchaAnswer = $this->request->getPost('captcha_answer'); // Get captcha answer from the form

    // Check if the CAPTCHA answer is empty
    if (empty($captchaAnswer)) {
        echo '<script>alert("Please enter the CAPTCHA answer."); window.location.href = "' . base_url('/Home') . '";</script>';
        return;
    }

    // Verify CAPTCHA answer
    $correctAnswer = $num1 + $num2;
    if ($captchaAnswer != $correctAnswer) {
        echo '<script>alert("Incorrect CAPTCHA answer. Please try again."); window.location.href = "' . base_url('/Home') . '";</script>';
        return;
    }

    // Proceed with login
    $model = new M_model();
    $data = array(
        'username' => $u,
        'password' => md5($p)
    );
    $cek = $model->getWhere2('user', $data);
    if ($cek > 0) {
        session()->set('id', $cek['id_user']);
        session()->set('username', $cek['username']);
        session()->set('level', $cek['level']);
        return redirect()->to('/Home/dashboard');
    } else {
        return redirect()->to('/Home');
    }
}

    public function reset_password($id)
    {
        if(session()->get('id')>0) {
            $okta=new M_model();
            $where=array('id_user'=>$id);
            $user=array('password'=>md5('12345'));
            $okta->qedit('user', $user, $where);

            echo view('header');
            echo view('menu');
            echo view('footer');

            return redirect()->to('/Home/user');
        }else {
            return redirect()->to('home');

        }
    }

    public function log_out()
    {

        session()->destroy();
        return redirect()->to('Home');
    }

    public function dashboard()
    {
        if(session()->get('id')>0) {
            
            
            echo view('header');
        echo view('menu');
            echo view('dashboard');
            echo view('footer');

        }else{
            return redirect()->to('/Home');
        }
    
    }
    public function user()
{
    if (session()->get('id') > 0) {
        $model = new M_model();
        $on = 'user.level = level.id_level';
        $diva['okta'] = $model->join2('user', 'level', $on);

        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));

        echo view('header');
        echo view('menu',$data);
        echo view('user', $diva);
        echo view('footer');
    } else {
        return redirect()->to('/Home/');
    }
}

public function siswa()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
            $on='siswa.user=user.id_user';
            $diva['okta'] = $model->join2('siswa', 'user',$on);
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header',$data);
            echo view('menu');
            echo view('siswa',$diva);
            echo view('footer');
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_siswa($id)
{
    $model = new M_model(); // Change 'm_model' to 'M_model'
    $where = array('user' => $id);
    $where2 = array('id_user' => $id);
    $model->hapus('siswa', $where);
    $model->hapus('user', $where2);

    $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus siswa dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);

    return redirect()->to('/Home/siswa');


}

public function tambah_siswa()
    {
        
        $model=new m_model();
                
        $diva['okta'] = $model->tampil('level');
        echo view('tambah_siswa', $diva);
     
       
    
    }

    public function aksi_tambah_siswa()
{
    $a = $this->request->getPost('username');
    $f = $this->request->getPost('password');
    $level = $this->request->getPost('level');
    $nama = $this->request->getPost('nama');
    
    $jk = $this->request->getPost('jk');
    $ttl = $this->request->getPost('ttl');

    //  $foto= $this->request->getFile('foto');
    //     if($foto->isValid() && ! $foto->hasMoved())
    //     {
    //         $imageName = $foto->getName();
    //         $foto->move('images/',$imageName);
    //     }

    $data1 = array(
        'username' => $a,
        'password' => md5($f),
        'level' => '2',
        // 'foto' => $imageName
    );

    $darrel = new M_model();
    $darrel->simpan('user', $data1);

    $where = array('username' => $a);
    $ayu = $darrel->getWhere2('user', $where);
    $id = $ayu['id_user'];

    $data2 = array(
        'nama' => $nama,
        'jk' => $jk,
        'ttl' => $ttl,

        'user' => $id
    );

    $darrel->simpan('siswa', $data2);
    

    $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menambah siswa ".$a."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $darrel->simpan('log', $data2);


    return redirect()->to('/Home/siswa');
}

public function edit_siswa($user)
    {
        if(session()->get('id')>0){
        $model=new M_model();

        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jess']=$model->tampil('level');
        $data['jojo']=$model->getWhere('siswa',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('header');
        echo view('menu');
        echo view('edit_siswa',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/siswa');

        }
    }
    public function aksi_edit_siswa()
    {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $level= $this->request->getPost('level');
        $nama= $this->request->getPost('nama');
         $jk= $this->request->getPost('jk');
        $ttl= $this->request->getPost('ttl');
        $id= $this->request->getPost('id');
        $id2= $this->request->getPost('id2');


        $where=array('id_user'=>$id);
        $data1=array(
            'username'=>$a,
            'password'=>md5($b),
            'level' => '2'
            
        );
        $darrel=new M_model();
        $darrel->qedit('user', $data1, $where);
        
        $where2=array('user'=>$id2);
        $data2=array(
            'nama'=>$nama,
            'jk'=>$jk,
            'ttl'=>$ttl

        );
        $model=new M_model();
   
        $darrel->qedit('siswa', $data2,$where2);

        return redirect()->to('/Home/siswa');

    }

    public function orangtua()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
            $on='orangtua.user=user.id_user';
            $diva['okta'] = $model->join2('orangtua', 'user',$on);
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            echo view('header',$data);
            echo view('menu');
            echo view('orangtua',$diva);
            echo view('footer');
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_orangtua($id)
{
    $model = new M_model(); // Change 'm_model' to 'M_model'
    $where = array('user' => $id);
    $where2 = array('id_user' => $id);
    $model->hapus('orangtua', $where);
    $model->hapus('user', $where2);

    $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus orangtua dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);

    return redirect()->to('/Home/orangtua');


}

public function tambah_orangtua()
    {
        if(session()->get('id')>0) {
        $model=new m_model();
        $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
        echo view('header');
        echo view('menu',$data);
        $diva['okta'] = $model->tampil('level');
        

        return view('tambah_orangtua', $diva);
        echo view('footer');
        }else{
            return redirect()->to('/Home');
        }
        
    
    }

    public function aksi_tambah_orangtua()
{
    $a = $this->request->getPost('username');
    $f = $this->request->getPost('password');
    $level = $this->request->getPost('level');
    $nama = $this->request->getPost('nama');
    $jk = $this->request->getPost('jk');
    $ttl = $this->request->getPost('ttl');
    $nik = $this->request->getPost('nik');
    $alamat = $this->request->getPost('alamat');

    //  $foto= $this->request->getFile('foto');
    //     if($foto->isValid() && ! $foto->hasMoved())
    //     {
    //         $imageName = $foto->getName();
    //         $foto->move('images/',$imageName);
    //     }

    $data1 = array(
        'username' => $a,
        'password' => md5($f),
        'level' => '3',
        // 'foto' => $imageName
    );

    $darrel = new M_model();
    $darrel->simpan('user', $data1);

    $where = array('username' => $a);
    $ayu = $darrel->getWhere2('user', $where);
    $id = $ayu['id_user'];

    $data2 = array(
        'nama' => $nama,
        'jk' => $jk,
        'ttl' => $ttl,
        'nik' => $nik,
        'alamat' => $alamat,

        'user' => $id
    );

    $darrel->simpan('orangtua', $data2);
    

    $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menambah orangtua ".$a."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $darrel->simpan('log', $data2);


    return redirect()->to('/Home/orangtua');
}

public function edit_orangtua($user)
    {
        if(session()->get('id')>0){
        $model=new M_model();

        $where=array('user'=>$user);
        $where2=array('id_user'=>$user);
        $data['jess']=$model->tampil('level');
        $data['jojo']=$model->getWhere('orangtua',$where);
        $data['rizkan']=$model->getWhere('user',$where2);
        echo view('header');
        echo view('menu');
        echo view('edit_orangtua',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/orangtua');

        }
    }
    public function aksi_edit_orangtua()
    {
        $a= $this->request->getPost('username');
        $b= $this->request->getPost('password');
        $level= $this->request->getPost('level');
        $nama= $this->request->getPost('nama');
         $jk= $this->request->getPost('jk');
        $ttl= $this->request->getPost('ttl');
        $nik= $this->request->getPost('nik');
        $alamat= $this->request->getPost('alamat');
        $id= $this->request->getPost('id');
        $id2= $this->request->getPost('id2');


        $where=array('id_user'=>$id);
        $data1=array(
            'username'=>$a,
            'password'=>md5($b),
            'level' => '3'
            
        );
        $darrel=new M_model();
        $darrel->qedit('user', $data1, $where);
        
        $where2=array('user'=>$id2);
        $data2=array(
            'nama'=>$nama,
            'jk'=>$jk,
            'ttl'=>$ttl,
            'nik'=>$nik,
            'alamat'=>$alamat

        );
        $model=new M_model();
   
        $darrel->qedit('orangtua', $data2,$where2);

        return redirect()->to('/Home/orangtua');
    }

   public function bayar()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
            $on='bayar.nama=siswa.id_siswa';

            $diva['okta'] = $model->join2('bayar', 'siswa',$on);

            echo view('header');
            echo view('menu');
            echo view('bayar',$diva);
            echo view('footer');
             $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Melihat data Pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        }else{
            return redirect()->to('/Home');
    }   
}

public function hapus_bayar($id)
    {
        $model=new M_model();
        $where=array('id_bayar'=>$id);
        echo view('header');
            echo view('menu');
            echo view('footer');
        $model->hapus('bayar',$where);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus data pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/bayar');
    }

    public function tambah_bayar()
    {
        if(session()->get('id')>0) {
        $model=new m_model();
        echo view('header');
        echo view('menu');
        $diva['okta'] = $model->tampil('siswa');

        $diva['k'] = $model->tampil('ta');
        

        return view('tambah_bayar', $diva);
        echo view('footer');
        }else{
            return redirect()->to('/Home');
        }
        
    
    }

    public function aksi_tambah_bayar()
    {
        $a=$this->request->getPost('id_bayar');
        $b=$this->request->getPost('nama');

        $f=$this->request->getPost('januari');
        $g=$this->request->getPost('februari');
        $h=$this->request->getPost('maret');
        $i=$this->request->getPost('april');
        $j=$this->request->getPost('mei');
        $k=$this->request->getPost('juni');
        $l=$this->request->getPost('juli');
        $m=$this->request->getPost('agustus');
        $n=$this->request->getPost('september');
        $o=$this->request->getPost('oktober');
        $p=$this->request->getPost('november');
        $q=$this->request->getPost('desember');
        $r=$this->request->getPost('tahun');
        
        
        $simpan=array(
            'id_bayar'=>$a,
            'nama'=>$b,

            'januari'=>$f,
            'februari'=>$g,
            'maret'=>$h,
            'april'=>$i,
            'mei'=>$j,
            'juni'=>$k,
            'juli'=>$l,
            'agustus'=>$m,
            'september'=>$n,
            'oktober'=>$o,
            'november'=>$p,
            'desember'=>$q,
            'tahun'=>$r
            


            
        );
        $model=new M_model();
        $model->simpan('bayar',$simpan);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"menambah data pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/bayar');



    }

    public function edit_bayar($id)
    {
        if(session()->get('id')>0) {
        $model=new m_model();
        $where=array('id_bayar '=>$id);
        $data['a']=$model->tampil('siswa');
        $data['e']=$model->tampil('ta');
        $data['jojo']=$model->getWhere('bayar',$where);
        echo view('header');
        echo view('menu');
        return view('edit_bayar',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/edit_bayar');
        }
    }

    public function aksi_edit_bayar()
    {
        $id=$this->request->getPost('id');
        $b=$this->request->getPost('nama');

        $f=$this->request->getPost('januari');
        $g=$this->request->getPost('februari');
        $h=$this->request->getPost('maret');
        $i=$this->request->getPost('april');
        $j=$this->request->getPost('mei');
        $k=$this->request->getPost('juni');
        $l=$this->request->getPost('juli');
        $m=$this->request->getPost('agustus');
        $n=$this->request->getPost('september');
        $o=$this->request->getPost('oktober');
        $p=$this->request->getPost('november');
        $q=$this->request->getPost('desember');
        $r=$this->request->getPost('tahun');

        // $d=$this->request->getPost('nik');

        $where=array('id_bayar'=>$id);
        $simpan=array(
            'nama'=>$b,

            'januari'=>$f,
            'februari'=>$g,
            'maret'=>$h,
            'april'=>$i,
            'mei'=>$j,
            'juni'=>$k,
            'juli'=>$l,
            'agustus'=>$m,
            'september'=>$n,
            'oktober'=>$o,
            'november'=>$p,
            'desember'=>$q,
            'tahun'=>$r
            

            // 'nik'=>$d
        );
        $model=new M_model();
        $model->qedit('bayar',$simpan, $where);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Mengedit data pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/bayar');

    }

public function ta()
    {
        // if(session()->get('id')>0) {
            $model=new M_model();
            $diva['okta'] = $model->tampil('ta');
            echo view('header');
            echo view('menu');
            echo view('ta',$diva);
            echo view('footer');
             $data2 = array(
     
       
    );
     $model->simpan('log', $data2);
        // }else{
            // return redirect()->to('/Home/guru');
    }

    public function hapus_ta($id)
    {
        $model=new m_model();
        $where=array('id_ta'=>$id);
        echo view('header');
            echo view('menu');
            echo view('footer');
        $model->hapus('ta ',$where);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus ta dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/ta');
    }

    public function tambah_ta()
    {
        // if(session()->get('id')>0) {
        $model=new m_model();
        echo view('header');
        echo view('menu');
        $diva['okta'] = $model->tampil('ta');
        return view('tambah_ta', $diva);
        echo view('footer');
        // }else{
        //  return redirect()->to('/Home');
        // }
        
    
    }

    public function aksi_tambah_ta()
    {
        $a=$this->request->getPost('id_ta');
        $b=$this->request->getPost('tahun');
        // $c=$this->request->getPost('jam_klr');
        // $d=$this->request->getPost('sesi');
        
        
        $simpan=array(
            'id_ta'=>$a,
            'tahun'=>$b
            
            
        );
        $model=new M_model();
        $model->simpan('ta',$simpan);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"menambah ta dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/ta');

    }

    public function edit_ta($id)
    {
        // if(session()->get('id')>0) {
        $model=new m_model();
        $where=array('id_ta'=>$id);
        echo view('header');
        echo view('menu');
        $data['jojo']=$model->getWhere('ta',$where);
        return view('edit_ta',$data);
        echo view('footer');
        // }else{
        //  return redirect()->to('/Home/edit_jadwal');
        // }
    }

    public function aksi_edit_ta()
    {
        $id=$this->request->getPost('id');
        $a=$this->request->getPost('tahun');
        // $b=$this->request->getPost('jam_klr');
        // $c=$this->request->getPost('sesi');
        // $d=$this->request->getPost('nik');

        $where=array('id_ta'=>$id);
        $simpan=array(
            'tahun'=>$a
            // 'jam_klr'=>$b,
            // 'sesi'=>$c
            // 'nik'=>$d
        );
        $model=new M_model();
        $model->qedit('ta',$simpan, $where);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"mengedit ta dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/ta');

    }

     public function pembayaran()
    {
        if(session()->get('id')>0) {
            $model=new M_model();
            $on='pembayaran.nama=siswa.id_siswa';

            
            $diva['okta'] = $model->join2('pembayaran', 'siswa',$on);

            
            echo view('header');
            echo view('menu');
            echo view('pembayaran',$diva);
            echo view('footer');
             $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"melihat pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        }else{
            return redirect()->to('/Home');
    }   
}

  public function hapus_pembayaran($id)
    {
        $model=new M_model();
        $where=array('id_pembayaran'=>$id);
        echo view('header');
            echo view('menu');
            echo view('footer');
        $model->hapus('pembayaran',$where);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"Menghapus pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/pembayaran');
    }

public function tambah_pembayaran()
    {
        if(session()->get('id')>0) {
        $model=new m_model();
        echo view('header');
        echo view('menu');
        $diva['okta'] = $model->tampil('siswa');

        
        

        return view('tambah_pembayaran', $diva);
        echo view('footer');
        }else{
            return redirect()->to('/Home');
        }
        
    
    }

    public function aksi_tambah_pembayaran()
    {
        $a=$this->request->getPost('id_pembayaran');
        $b=$this->request->getPost('nama');

        $f=$this->request->getPost('bulan');
        $t=$this->request->getPost('denda');
        $g=$this->request->getPost('jumlah');
        $z=$this->request->getPost('tanggal');
        $h=$this->request->getPost('status');
       
        
        
        $simpan=array(
            'id_pembayaran'=>$a,
            'nama'=>$b,

            'bulan'=>$f,
            'jumlah'=>$g,
            'denda'=>$t,
            'tanggal'=>$z,


            'status'=>$h
            
            


            
        );
        $model=new M_model();
        $model->simpan('pembayaran',$simpan);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"menambah pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/pembayaran');



    }

    public function edit_pembayaran($id)
    {
        if(session()->get('id')>0) {
        $model=new m_model();
        $where=array('id_pembayaran '=>$id);
        $data['a']=$model->tampil('siswa');

       
        $data['jojo']=$model->getWhere('pembayaran',$where);
        echo view('header');
        echo view('menu');
        return view('edit_pembayaran',$data);
        echo view('footer');
        }else{
            return redirect()->to('/Home/edit_pembayaran');
        }
    }

    public function aksi_edit_pembayaran()
    {
        $id=$this->request->getPost('id');
        $b=$this->request->getPost('nama');
        $f=$this->request->getPost('bulan');
        $g=$this->request->getPost('jumlah');
        $t=$this->request->getPost('denda');
        $z=$this->request->getPost('tanggal');
        $h=$this->request->getPost('status');
       
        // $d=$this->request->getPost('nik');

        $where=array('id_pembayaran'=>$id);
        $simpan=array(
            'nama'=>$b,
            'bulan'=>$f,
            'jumlah'=>$g,
            'denda'=>$t,
            'tanggal'=>$z,
            'status'=>$h
        

            // 'nik'=>$d
        );
        $model=new M_model();
        $model->qedit('pembayaran',$simpan, $where);
         $data2 = array(
        'id_user' => session()->get('id'),
        'aktiviti' =>"mengedit pembayaran dengan Id ".$id."",
        'waktu' => date('Y-m-d H:i:s')
       
    );
     $model->simpan('log', $data2);
        return redirect()->to('/Home/pembayaran');

    }

    public function cari_b()
    {
        if(session()->get('level')== 1) {

            $model=new M_model();
            $awal= $this->request->getPost('awal');
            $akhir= $this->request->getPost('akhir');
            $kui['duar']=$model->filter2('pembayaran',$awal,$akhir);

            echo view('c_b',$kui);

        }else{
            return redirect()->to('/home/');
        }
    }

public function pdf_b()
    {
        $model = new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['duar']=$model->filter2('pembayaran',$awal,$akhir);
        $dompdf = new\Dompdf\Dompdf();
            // $dompdf->set_option('isRemoteEnabled',TRUE);
        $dompdf->loadHtml(view('c_b',$kui));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));

    }
public function excel_barang()
    {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data=$model->filter2('pembayaran',$awal,$akhir);
        

        $spreadsheet=new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Siswa')

        ->setCellValue('E1', 'Bulan')
        ->setCellValue('F1', 'Jumlah')
        ->setCellValue('G1', 'Tanggal')
        ->setCellValue('H1', 'Status');

        $column=2;

        foreach($data as $data){
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'. $column, $data->nama)

             ->setCellValue('E'. $column, $data->bulan)
            ->setCellValue('F'. $column, $data->jumlah)
            ->setCellValue('G'. $column, $data->tanggal)
            ->setCellValue('H'. $column, $data->status);
            $column++;
        }

        $writer = new XLsx($spreadsheet);
        $fileName = 'Data Laporan pembayaran';

        //  Coba Redirect hasilnya xlsx ke web client
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename='.$fileName.'.xls');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    

    }

    public function l_brg()
    {
        if(session()->get('level')== 1) {

            $model=new M_model();
            $data['status']=$model->getWhere('user',array('id_user'=>session()->get('id')));
            $kui['kunci']='view_b';

            echo view('header');
            echo view('menu',$data);
            echo view('filter',$kui);
            echo view('footer');

        }else{
            return redirect()->to('/home/');
        }
    }

     public function log()
    {
        if(session()->get('level')== 1) {
        $model=new M_model();
        $where=array('log.id_user'=>session()->get('id'));
            $on='log.id_user=user.id_user';
            $diva ['okta']= $model->join_w('log', 'user',$on, $where);
            echo view('header');
            echo view('menu');
            echo view('log',$diva);
            echo view('footer');
        
    }else{
        return redirect()->to('/Home');
    }
    }





}
