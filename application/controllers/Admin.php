<?php
defined('BASEPATH') or exit('No direct script allowed');

class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // cek Login
    if ($this->session->userdata('status') != "login") {
      redirect(base_url() . 'Welcome?pesan=belumlogin');
    }
  }

  function index()
  {
    $data['ikan'] = $this->db->query("select * from ikan order by ikan_id asc limit 10")->result();
    $data['pembeli'] = $this->db->query("select * from pembeli order by pembeli_id asc limit 10")->result();
    $data['barang'] = $this->db->query("select * from barang order by barang_id asc limit 10")->result();
    $data['transaksi'] = $this->db->query("select * from transaksi,ikan,pembeli where transaksi_ikan=ikan_id and transaksi_pembeli=pembeli_id")->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/index', $data);
    $this->load->view('admin/footer');
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url() . 'welcome?pesan=logout');
  }

  function ikan()
  {
    $data['ikan'] = $this->m_ikan->get_data('ikan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/ikan', $data);
    $this->load->view('admin/footer');
  }

  function barang()
  {
    $data['barang'] = $this->m_ikan->get_data('barang')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/barang', $data);
    $this->load->view('admin/footer');
  }

  function pembeli()
  {
    $data['pembeli'] = $this->m_ikan->get_data('pembeli')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/pembeli', $data);
    $this->load->view('admin/footer');
  }

  function transaksi(){
    $data['transaksi'] = $this->db->query("select transaksi_id,pembeli_id,transaksi_tanggal,pembeli_nama,nama_ikan,jenis_ikan,transaksi_jumlah, (transaksi_jumlah * transaksi_hargaikan) as transaksi_total,transaksi_status from transaksi,ikan,pembeli where transaksi_ikan=ikan_id and transaksi_pembeli=pembeli_id")->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/transaksi',$data);
    $this->load->view('admin/footer');  
  }

  function ikan_add()
  {

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/ikan_add');
    $this->load->view('admin/footer');
  }

  function barang_add()
  {

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/barang_add');
    $this->load->view('admin/footer');
  }

  function transaksi_add(){
    $data['ikan'] = $this->m_ikan->get_data('ikan')->result();
    $data['pembeli'] = $this->m_ikan->get_data('pembeli')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/transaksi_add',$data);
    $this->load->view('admin/footer');
  }

  function transaksi_add_act(){
    $pembeli = $this->input->post('pembeli');
    $ikan = $this->input->post('ikan');
    $jenis_ikan = $this->input->post('jenis_ikan');
    $jumlah = $this->input->post('jumlah');
    $harga_ikan = $this->input->post('harga_ikan');
    $status = $this->input->post('status');
    $total = $harga_ikan * $jumlah;


    $this->form_validation->set_rules('pembeli','Pembeli','required');
    $this->form_validation->set_rules('ikan','Ikan','required');
    $this->form_validation->set_rules('jenis_ikan','Jenis Ikan','required');
    $this->form_validation->set_rules('jumlah','Jumlah','required');
    $this->form_validation->set_rules('harga_ikan','Harga ','required');
    $this->form_validation->set_rules('status','Status ','required');

    if($this->form_validation->run() != false){

      $data = array(
        'transaksi_admin' => $this->session->userdata('id'),
        'transaksi_pembeli' => $pembeli,
        'transaksi_ikan' => $ikan,
        'transaksi_jenisikan' => $jenis_ikan,
        'transaksi_jumlah' => $jumlah,
        'transaksi_hargaikan' => $harga_ikan,
        'transaksi_tanggal' => date('Y-m-d'),
        'transaksi_status' => $status,
        'transaksi_total' => $total
      );

      $this->m_ikan->insert_data($data,'transaksi');
      redirect(base_url().'admin/transaksi');
      $data['ikan'] = $this->m_ikan->get_data('ikan')->result();
      $data['pembeli'] = $this->m_ikan->get_data('pembeli')->result();
      $data['transaksi'] = $this->m_ikan->get_data('transaksi')->result();

      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/transaksi_add',$data);
      $this->load->view('admin/footer');


    }
  }

  function transaksi_hapus($id)
  {
    $where = array(
      'transaksi_id' => $id
    );
    $this->m_ikan->delete_data($where, 'transaksi');
    redirect(base_url() . 'admin/transaksi');
  }

  function transaksi_selesai($id){
    $data['ikan'] = $this->m_ikan->get_data('ikan')->result();
    $data['pembeli'] = $this->m_ikan->get_data('pembeli')->result();
    $data['transaksi'] = $this->db->query("select * from transaksi,ikan,pembeli where transaksi_ikan=ikan_id and transaksi_pembeli=pembeli_id and transaksi_id='$id'")->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/transaksi_selesai',$data);
    $this->load->view('admin/footer');
  }


  function barang_add_act()
  {
    $nama_barang = $this->input->post('nama_barang');
    $kategori_barang = $this->input->post('kategori_barang');
    $stok_barang = $this->input->post('stok_barang');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');

    if ($this->form_validation->run() != false) {
      $data = array(
        'nama_barang' => $nama_barang,
        'kategori_barang' => $kategori_barang,
        'stok_barang' => $stok_barang,
      );
      $this->m_ikan->insert_data($data, 'barang');
      redirect(base_url() . 'admin/barang');
    } else {
      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/barang_add');
      $this->load->view('admin/footer');
    }
  }


  function ikan_add_act()
  {

   $nama_ikan = $this->input->post('nama_ikan');
   $jenis_ikan = $this->input->post('jenis_ikan');
   $ukuran_ikan = $this->input->post('ukuran_ikan');
   $stok_ikan = $this->input->post('stok_ikan');
   $harga_ikan = $this->input->post('harga_ikan');
   $gambar = $_FILES['gambar'];
   if($gambar=''){}else{
    $config['upload_path'] = './assets/gambar';
    $config['allowed_types'] = 'jpg|png|gif|jpeg';

    $this->load->library('upload',$config);
    if(!$this->upload->do_upload('gambar')){
      echo "Upload Gagal"; die();

    }else{

      $gambar=$this->upload->data('file_name');
    }
  }

  $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');

  if ($this->form_validation->run() != false) {
   $data = array(
    'nama_ikan' => $nama_ikan,
    'jenis_ikan' => $jenis_ikan,
    'ukuran_ikan' => $ukuran_ikan,
    'stok_ikan' => $stok_ikan,
    'harga_ikan' => $harga_ikan,
    'gambar' => $gambar
  );
   $this->m_ikan->insert_data($data, 'ikan');
   redirect(base_url() . 'admin/ikan');
 } else {
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
  $this->load->view('admin/ikan_add');
  $this->load->view('admin/footer');
}
}


function pembeli_add()
{
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
  $this->load->view('admin/pembeli_add');
  $this->load->view('admin/footer');
}

function pembeli_add_act()
{
  $pembeli_nama = $this->input->post('pembeli_nama');
  $jenis_kelamin = $this->input->post('jenis_kelamin');
  $pembeli_alamat = $this->input->post('pembeli_alamat');
  $pembeli_hp = $this->input->post('pembeli_hp');
  $this->form_validation->set_rules('pembeli_nama', 'Nama', 'required');

  if ($this->form_validation->run() != false) {
    $data = array(
      'pembeli_nama' => $pembeli_nama,
      'jenis_kelamin' => $jenis_kelamin,
      'pembeli_alamat' => $pembeli_alamat,
      'pembeli_hp' => $pembeli_hp,
    );
    $this->m_ikan->insert_data($data, 'pembeli');
    redirect(base_url() . 'admin/pembeli');
  } else {
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/pembeli_add');
    $this->load->view('admin/footer');
  }
}

function pembeli_edit($id)
{
  $where = array(
    'pembeli_id' => $id
  );
  $data['pembeli'] = $this->m_ikan->edit_data($where, 'pembeli')->result();
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
  $this->load->view('admin/pembeli_edit', $data);
  $this->load->view('admin/footer');
}

function ikan_edit($id)
{
  $where = array(
    'ikan_id' => $id
  );
  $data['ikan'] = $this->m_ikan->edit_data($where, 'ikan')->result();
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
  $this->load->view('admin/ikan_edit', $data);
  $this->load->view('admin/footer');
}

function barang_edit($id)
{
  $where = array(
    'barang_id' => $id
  );
  $data['barang'] = $this->m_ikan->edit_data($where, 'barang')->result();
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
  $this->load->view('admin/barang_edit', $data);
  $this->load->view('admin/footer');
}

function transaksi_edit($id)
{
  $where = array(
    'transaksi_id' => $id
  );
  $data['transaksi'] = $this->db->query("select transaksi_id,pembeli_id,transaksi_tanggal,pembeli_nama,nama_ikan,jenis_ikan,transaksi_jumlah, (transaksi_jumlah * transaksi_hargaikan) as transaksi_total,transaksi_status from transaksi,ikan,pembeli where transaksi_ikan=ikan_id and transaksi_pembeli=pembeli_id")->result();
  $data['ikan'] = $this->m_ikan->get_data('ikan')->result();
  $data['pembeli'] = $this->m_ikan->get_data('pembeli')->result();
  $data['transaksi'] = $this->m_ikan->edit_data($where, 'transaksi')->result();
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
  $this->load->view('admin/transaksi_edit', $data);
  $this->load->view('admin/footer');
}

function transaksi_update()
{
  $id = $this->input->post('id');
  $status = $this->input->post('status');

  $this->form_validation->set_rules('status', 'Status', 'required');
  if ($this->form_validation->run() != false) {
    $where = array(
      'transaksi_id' => $id
    );
    $data = array(
      'transaksi_status' => $status
    );
    $this->m_ikan->update_data($where, $data, 'transaksi');
    redirect(base_url() . 'admin/transaksi');
  } else {
    $where = array(
      'transaksi_id' => $id
    );
    $data['transaksi'] = $this->m_ikan->edit_data($where, 'transaksi')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/transaksi_edit', $data);
    $this->load->view('admin/footer');
  }
}

function pembeli_update()
{
  $id = $this->input->post('id');
  $pembeli_nama = $this->input->post('pembeli_nama');
  $jenis_kelamin = $this->input->post('jenis_kelamin');
  $pembeli_alamat = $this->input->post('pembeli_alamat');
  $pembeli_hp = $this->input->post('pembeli_hp');

  $this->form_validation->set_rules('pembeli_nama', 'Nama', 'required');
  if ($this->form_validation->run() != false) {
    $where = array(
      'pembeli_id' => $id
    );
    $data = array(
      'pembeli_nama' => $pembeli_nama,
      'jenis_kelamin' => $jenis_kelamin,
      'pembeli_alamat' => $pembeli_alamat,
      'pembeli_hp' => $pembeli_hp
    );
    $this->m_ikan->update_data($where, $data, 'pembeli');
    redirect(base_url() . 'admin/pembeli');
  } else {
    $where = array(
      'pembeli_id' => $id
    );
    $data['pembeli'] = $this->m_ikan->edit_data($where, 'pembeli')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/pembeli_edit', $data);
    $this->load->view('admin/footer');
  }
}

function barang_update()
{
  $id = $this->input->post('id');
  $nama_barang = $this->input->post('nama_barang');
  $kategori_barang = $this->input->post('kategori_barang');
  $stok_barang = $this->input->post('stok_barang');

  $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
  if ($this->form_validation->run() != false) {
    $where = array(
      'barang_id' => $id
    );
    $data = array(
      'nama_barang' => $nama_barang,
      'kategori_barang' => $kategori_barang,
      'stok_barang' => $stok_barang
    );
    $this->m_ikan->update_data($where, $data, 'barang');
    redirect(base_url() . 'admin/barang');
  } else {
    $where = array(
      'barang_id' => $id
    );
    $data['barang'] = $this->m_ikan->edit_data($where, 'barang')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/barang_edit', $data);
    $this->load->view('admin/footer');
  }
}

function ikan_update()
{
  $id = $this->input->post('id');
  $nama_ikan = $this->input->post('nama_ikan');
  $jenis_ikan = $this->input->post('jenis_ikan');
  $ukuran_ikan = $this->input->post('ukuran_ikan');
  $stok_ikan = $this->input->post('stok_ikan');
  $harga_ikan = $this->input->post('harga_ikan');
  $gambar     = $_FILES['gambar'];
  if ($gambar =''){}else{
    $config ['upload_path'] = './assets/gambar';
    $config ['allowed_types'] = 'jpg|jpeg|png|gif';

    $this->load->library('upload', $config);
    if(!$this->upload->do_upload('gambar')){
      echo "Gambar Gagal Di Upload!!";
    }else{
      $gambar=$this->upload->data('file_name');
    }
  }

  $this->form_validation->set_rules('nama_ikan', 'Nama Ikan', 'required');
  if ($this->form_validation->run() != false) {
    $where = array(
      'ikan_id' => $id
    );
    $data = array(
      'nama_ikan' => $nama_ikan,
      'jenis_ikan' => $jenis_ikan,
      'ukuran_ikan' => $ukuran_ikan,
      'stok_ikan' => $stok_ikan,
      'harga_ikan' => $harga_ikan,
      'gambar' => $gambar
    );


    $this->m_ikan->update_data($where, $data, 'ikan');
    redirect(base_url() . 'admin/ikan');
  } else {
    $where = array(
      'ikan_id' => $id
    );
    $data['ikan'] = $this->m_ikan->edit_data($where, 'ikan')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/ikan_edit', $data);
    $this->load->view('admin/footer');
  }
}

function laporan(){
  $dari = $this->input->post('dari');
  $sampai = $this->input->post('sampai');
  $this->form_validation->set_rules('dari','Dari Tanggal','required');
  $this->form_validation->set_rules('sampai','Sampai Tanggal','required');

  if($this->form_validation->run() != false){
    $data['laporan'] = $this->db->query("select transaksi_id,pembeli_id,transaksi_tanggal,pembeli_nama,nama_ikan,jenis_ikan,transaksi_jumlah, (transaksi_jumlah * transaksi_hargaikan) as transaksi_total,transaksi_status from transaksi,ikan,pembeli where transaksi_ikan=ikan_id and transaksi_pembeli=pembeli_id and date(transaksi_tanggal) >= '$dari'")->result();
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/laporan_filter',$data);
    $this->load->view('admin/footer');
  }else{
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/laporan');
    $this->load->view('admin/footer');
  }
}

function laporan_print(){
  $dari = $this->input->get('dari');
  $sampai = $this->input->get('sampai');

  if($dari != "" && $sampai != ""){
    $data['laporan'] = $this->db->query("select * from transaksi,ikan,pembeli where transaksi_ikan=ikan_id and transaksi_pembeli=pembeli_id and date(transaksi_tanggal) >= '$dari'")->result();
    $this->load->view('admin/laporan_print',$data);
  }else{
    redirect("admin/laporan");
  }
}


function pembeli_hapus($id)
{
  $where = array(
    'pembeli_id' => $id
  );
  $this->m_ikan->delete_data($where, 'pembeli');
  redirect(base_url() . 'admin/pembeli');
}

function ikan_hapus($id)
{
  $where = array(
    'ikan_id' => $id
  );
  $this->m_ikan->delete_data($where, 'ikan');
  redirect(base_url() . 'admin/ikan');
}

function barang_hapus($id)
{
  $where = array(
    'barang_id' => $id
  );
  $this->m_ikan->delete_data($where, 'barang');
  redirect(base_url() . 'admin/barang');
}
}