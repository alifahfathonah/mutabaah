<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Super extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('ses_admin')) {
            redirect(base_url('Admin'));
        }
    }
    
    /**
     * menghasilkan konfigurasi halaman
     * method ini akan di override oleh child class
     *
     * return  null | array
     */
    protected function setup()
    {
        return null;
    }

    /**
     * menampilkan tabel dan tombol aksi halaman admin
     *
     * @return  view
     */
    public function index()
    {
        // tampilkan halaman
        $this->load->view('adm_mutabaah/layout.php', [
            'content' => $this->setup(),
            'page' => 'main'
        ]);
    }

    /**
     * ajax menampilkan data dari tabel
     *
     * @return  json
     */
    public function table()
    {
        // konfigurasi halaman
        $data = $this->setup();

        // data untuk datatable dari database
        $list = $this->database->datatables($data);

        // siapkan baris untuk datatable
        $rows = [];

        // susun setiap baris datatable untuk ditampilkan
        foreach ($list as $l) { // untuk setiap baris dari database

            // buat siapkan baris baru
            $row = [];

            // tambahkan kolom nomor
            $row[] = ++$_POST['start'];

            // tambahkan kolom dari konfigurasi
            foreach ($data['table']['column'] as $c => $t) { // untuk setiap kolom dan tipe

                if ($t == "text") { // jika tipe text

                    // tambahkan kolom berupa string
                    $row[] = $l[$c];

                } elseif ($t == "toggle") { // jika tipe toggle

                    if ($l[$c] == "enabled") { // jika nilainya adalah enabled

                        // tambahkan text berwarna hijau
                        $row[] = '<span style="color:green">'.$l[$c].'</span>';

                    } else { // jika nilainya adalah disabled

                        // tambahkan text berwarna merah
                        $row[] = '<span style="color:red">'.$l[$c].'</span>';

                    }

                } elseif ($t == "image") { // jika tipe image

                    // tampilkan gambar 3x4
                    $row[] = '<a href="'.base_url( ($l[$c]!=""?$l[$c]: "assets/ass_admin/images/noimg.png") ).'" target="_blank"><img width="113px" height="151px"  src="'.base_url( ($l[$c]!=""?$l[$c]: "assets/ass_admin/images/noimg.png") ).'" /></a>';

                }

            }

            // siapkan tombol aksi untuk fitur spesial
            $special = '';
            if ($data['feature']['special'][0] == true) { // jika terdapat fitur spesial

                // bentuk tombol fitur spesial
                foreach ($data['feature']['special']['value'] as $s) { // untuk setiap fitur spesial

                    // tambahkan tombol untuk fitur spesial
                    $special = $special.'<a href="'.base_url($this->uri->segment(1).'/'.$s[0].'/'.$l[$data['idcolumn']]).'" data-toggle="tooltip" data-placement="auto top" title="'.$s[1].'"><i class="'.$s[2].'"></i></a>&nbsp;&nbsp;';

                }

            }

            // tambahkan kolom aksi setiap fitur pada baris
            $row[] = (
                (!$data['feature']['detail'] ?'':('<a href="#" data-toggle="tooltip" data-placement="auto top" title="detail"  onclick="read('."'".$l[$data['idcolumn']]."'".')""><i class="fa fa-eye"></i></a>&nbsp;&nbsp;')).
                (!$data['feature']['edit'] ?'':('<a href="#" data-toggle="tooltip" data-placement="auto top" title="edit" onclick="update('."'".$l[$data['idcolumn']]."'".')""><i class="fa fa-edit"></i></a>&nbsp;&nbsp;')).
                (!$data['feature']['delete'][0] ?'':('<a href="#" data-toggle="tooltip" data-placement="auto top" title="delete" onclick="del('."'".$l[$data['idcolumn']]."'".','."'".($data['feature']['delete']['notifcolumn'][0] != '' ? $l[$data['feature']['delete']['notifcolumn'][0]] : '')."'".','."'".($data['feature']['delete']['notifcolumn'][1] != '' ? $l[$data['feature']['delete']['notifcolumn'][1]] : '')."'".')"><i class="fa fa-times"></i></a>&nbsp;&nbsp;')).
                (!$data['feature']['toggle'][0] ?'':('<a href="#" data-toggle="tooltip" data-placement="auto top" title="rubah status" onclick="toggle('."'".$l[$data['idcolumn']]."'".')""><i class="fa fa-unlock-alt"></i></a>&nbsp;&nbsp;')).
                $special
            );

            // tambahkan ke baris datatable
            $rows[] = $row;
        }

        // kirimkan json datatable
        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->database->hitung($data['database']),
            "recordsFiltered" => $this->database->datatablescount($data),
            "data" => $rows,
        ]);
    }

    /**
     * ajax menyimpan data yang ditambahkan dari form
     *
     * @return  json
     */
    public function create()
    {
        // konfigurasi halaman
        $data = $this->setup();

        // validasi form
        foreach ($data['form'] as $input) { // untuk setiap input field

            // cek tipe input
            if (!($input['type'] == "image") && !($input['type'] == "file")) { // jika input bukan gambar dan file

                // validasi input field
                $this->form_validation->set_rules($input['name'], $input['label'], 'required');

            }

        }

        // masukan input ke database
        if ($this->form_validation->run() == true) { // jika input valid

            // siapkan data yang akan ditambahkan ke database
            foreach ($data['form'] as $input ) {

                // cek tipe input
                if (
                    !($input['type'] == "image") &&
                    !($input['type'] == "date") &&
                    !($input['type'] == "password") &&
                    !($input['type'] == "file")
                ) { // jika bukan gambar, tanggal, password, dan file

                    // tambahkan data berdasarkan input
                    $create[$input['name']] = $this->input->post($input['name']);

                } elseif ($input['type'] == "date") { // jika tanggal

                    // buat array berupa dmy berdasarkan input
                    $dmy = explode("-",$this->input->post($input['name']));

                    // rubah ke ymd
                    $create[$input['name']] = $dmy[2].'-'.$dmy[1].'-'.$dmy[0];

                } elseif ($input['type'] == "password") { // jika password

                    // hash input
                    $create[$input['name']] = md5($this->input->post($input['name']));

                } elseif ($input['type'] == "image") { // jika gambar

                    // inisialisasi konfigurasi upload
                    $this->upload->initialize([
                        "upload_path" => $input["path"],
                        "file_name" => $create[$input["namecolumn"]],
                        "allowed_types" => $input["extension"],
                        "max_size" => $input["size"],
                        "overwrite" => $input["overwrite"]
                    ]);

                    // lakukan upload file
                    if ($this->upload->do_upload($input['name'])) { // jika upload sukses

                        // nama file hasil upload
                        $create[$input['name']] = substr($input['path'],1).$this->upload->data('file_name');

                    }

                } elseif ($input['type'] == "file") { // jika file

                    // inisialisasi konfigurasi upload
                    $this->upload->initialize([
                        "upload_path" => $input["path"],
                        "file_name" => $create[$input["namecolumn"]].'-'.date("Y-m-d h-i-sa"),
                        "allowed_types" => $input["extension"],
                        "max_size" => $input["size"],
                        "overwrite" => $input["overwrite"]
                    ]);

                    // lakukan upload file
                    if ($this->upload->do_upload($input['name'])) { // jika upload sukses

                        // nama file hasil upload
                        $create[$input['name']] = substr($input['path'],1).$this->upload->data('file_name');

                        // catat ukuran file jika diperlukan
                        if ($input['namesize'] != '') { // jika ukuran file dicatat di database

                            // ukuran file hasil upload
                            $create[$input['namesize']] = $_FILES[$input['name']]['size'];

                        }

                    } else { // jika upload gagal

                        // tampilkan error
                        echo json_encode($this->upload->display_errors());

                    }
                }
            }

            // kirimkan notifikasi hasil input
            if ($this->database->create($data['database'],$create)) { // jika insert sukses

                // kirim json notifikasi sukses
                echo json_encode(array("status" => TRUE));

            }

        } else { // jika input tidak valid

            // kirim json validasi gagal
            echo json_encode(validation_errors());

        }
    }

    /**
     * ajax mengirimkan detail data bedasarkan id
     *
     * @param  int  $id
     * @return  json
     */
    public function read($id)
    {
        $data = $this->setup();
        echo json_encode($this->database->select("*",$data['database'],$data['idcolumn'].'='.$id));
    }

    /**
     * ajax menampilkan data untuk di update bedasarkan id
     *
     * @param  int  $id
     * @return  json
     */
    public function edit($id)
    {
        $data = $this->setup();
        echo json_encode($this->database->select("*",$data['database'],$data['idcolumn'].'='.$id));
    }


    /**
     * ajax update data yang ditambahkan dari form
     *
     * @param  int  $id
     * @return  json
     */
    public function update($id)
    {
        // konfigurasi halaman
        $data = $this->setup();

        // validasi form
        foreach ($data['form'] as $input) { // untuk setiap input field

            // cek tipe input
            if (
                !($input['type'] == "image") &&
                !($input['type'] == "file") &&
                !($input['type'] == "password") &&
                !($input['name'] == "mhs_idast")
            ) { // jika input bukan gambar, file, password, dan penanggung jawab mahasiswa

                // validasi input field
                $this->form_validation->set_rules($input['name'], $input['label'], 'required');

            }

        }

        // masukan input ke database
        if ($this->form_validation->run() == true) { // jika input valid

            // siapkan data yang akan ditambahkan ke database
            foreach ($data['form'] as $input) {

                if (
                    !($input['type'] == "image") &&
                    !($input['type'] == "date") &&
                    !($input['type'] == "password") &&
                    !($input['type'] == "file")
                ) { // jika bukan gambar, tanggal, password, dan file

                    // update data berdasarkan input
                    $update[$input['name']] = $this->input->post($input['name']);

                } elseif ($input['type'] == "date") { // jika tanggal

                    // buat array berupa dmy berdasarkan input
                    $dmy = explode("-",$this->input->post($input['name']));

                    // rubah ke ymd
                    $update[$input['name']] = $dmy[2].'-'.$dmy[1].'-'.$dmy[0];

                } elseif ($input['type'] == "password") { // jika password

                    // olah password input
                    if($this->input->post($input['name']) != NULL){ // jika password di isi

                        // hash input
                        $update[$input['name']] = md5($this->input->post($input['name']));

                    }

                } elseif ($input['type'] == "image") { // jika gambar

                    // inisialisasi konfigurasi upload
                    $this->upload->initialize([
                        "upload_path" => $input["path"],
                        "file_name" => $update[$input["namecolumn"]],
                        "allowed_types" => $input["extension"],
                        "max_size" => $input["size"],
                        "overwrite" => $input["overwrite"]
                    ]);

                    // lakukan upload file
                    if ($this->upload->do_upload($input['name'])) { // jika upload sukses

                        $update[$input['name']] = substr($input['path'],1).$this->upload->data('file_name');

                    }

                } elseif ($input['type'] == "file") { // jika file

                    // inisialisasi konfigurasi upload
                    $this->upload->initialize([
                        "upload_path" => $input["path"],
                        "file_name" => $update[$input["namecolumn"]]."-".date("Y-m-d h-i-sa"),
                        "allowed_types" => $input["extension"],
                        "max_size" => $input["size"],
                        "overwrite" => $input["overwrite"]
                    ]);

                    // lakukan upload file
                    if ($this->upload->do_upload($input['name'])) { // jika upload sukses

                        // nama file hasil upload
                        $update[$input['name']] = substr($input['path'],1).$this->upload->data('file_name');

                        // catat ukuran file jika diperkukan
                        if ($input['namesize'] != '') {

                            // ukuran file hasil upload
                            $update[$input['namesize']] = $_FILES[$input['name']]['size'];

                        }

                    } else {

                        // tampilkan error
                        echo json_encode($this->upload->display_errors());

                    }
                }
            }

            // kirimkan notifikasi hasil input
            if ($this->database->update($data['database'],$data['idcolumn']." = ".$id,$update)) { // jika update sukses

                // kirim json notifikasi sukses
                echo json_encode(["status" => TRUE]);

            }

        } else { // jika input tidak valid

            // kirim json validasi gagal
            echo json_encode($this->upload->display_errors());

        }
    }

    /**
     * ajax menghapus data berdasarkan id
     *
     * @param  int  $id
     * @return  json
     */
    public function delete($id)
    {
        // konfigurasi halaman
        $data = $this->setup();

        // hapus dari database bedasarkan id
        $this->database->delete($data['database'], [$data["idcolumn"] => $id]);

        // kirim json notifikasi sukses
        echo json_encode(["status" => true]);
    }

    /**
     * ajax menghapus seluruh data dari tabel
     *
     * @return  json
     */
    public function truncate()
    {
        // konfigurasi halaman
        $data = $this->setup();

        // hapus dari semua data dari tabel database
        $this->database->delete($data['database'], '1 = 1');

        // kirim json notifikasi sukses
        echo json_encode(["status" => true]);
    }

    /**
     * ajax switch toogle data
     *
     * @param  int  $id
     * @return  json
     */
    public function toggle($id)
    {
        // konfigurasi halaman
        $data = $this->setup();

        // pilih data dari database
        $select = $this->database->select($data['feature']['toggle']['togglecolumn'],$data['database'],$data['idcolumn'].'='.$id);

        // set iterator
        $c = 0;

        // cari data toggle saat ini
        while ($data['form'][$c]['name'] != $data['feature']['toggle']['togglecolumn']) { // selama toggle berbeda dengan data

            // tambahkan iterator
            $c++;

        }

        // cari nilai toggle baru
        if ($select[0][$data['feature']['toggle']['togglecolumn']] == $data['form'][$c]['option'][0][$data['form'][$c]['valname']]) { // jika toggle sekarang sama dengan pilihan pertama

            // ganti nilai toggle ke pilihan ke dua
            $update[$data['feature']['toggle']['togglecolumn']] = $data['form'][$c]['option'][1][$data['form'][$c]['valname']];

        } else { // jika toggle sekarang berbeda dengan pilihan pertama

            // ganti nilai toggle ke pilihan pertama
            $update[$data['feature']['toggle']['togglecolumn']] = $data['form'][$c]['option'][0][$data['form'][$c]['valname']];

        }

        // update nilai toggle pada database
        if( $this->database->update($data['database'],$data['idcolumn']."=".$id,$update)) { // jika update sukses

            // kirim notifikasi sukses
            echo json_encode(["status" => true]);

        }
    }

    /**
     * ajax import excel
     *
     * @return  json
     */
    public function import()
    {
        // konfigurasi halaman
        $data = $this->setup();

        // inisialisasi konfigurasi upload
        $this->upload->initialize([
            "upload_path" => "./assets/ass_admin/cache",
            "file_name" => time().$data["title"],
            "allowed_types" => "xls|xlsx",
            "max_size" => "10240"
        ]);

        // upload excel
        if ($this->upload->do_upload('file')) { // jika upload sukses

            // catat path file
            $uploadpath = 'assets/ass_admin/cache/'.$this->upload->data('file_name');

        } else { // jika upload gagal

            // kirimkan json error
            echo $this->upload->display_errors();

        }

        // ambil spreadsheet dari path
        $spreadsheet = IOFactory::load($uploadpath);

        // sheet dari spreadsheet
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // dari baris ke dua
        $row = 2;

        // dari kolom ke A
        $column = 'A';

        // masukan data ke database
        while ($row <= count($sheetData)) { // untuk setiap baris data

            foreach($data['feature']['import']['datatype'] as $c => $type){ // untuk setiap kolom terhadap tipedata

                if ($type != "ignore") { // jika tipedata tidak bisa diabaikan

                    if ($type == "text") { // jika text

                        // ambil text apa adanya
                        $import[$c] = $sheetData[$row][$column];

                    } elseif ($type == "password") { // jika password

                        // hash password
                        $import[$c] = md5($sheetData[$row][$column]);

                    } elseif ($type == "date") { // jika tanggal

                        // ambil tanggal dalam dmy
                        $dmy = explode("-",$sheetData[$row][$column]);

                        // rubah ke ymd
                        $import[$c] = $dmy[2]."-".$dmy[1]."-".$dmy[0];

                    }

                }

                // geser kolom ke kanan
                $column++;
            }

            // geser baris ke bawah
            $row++;

            // kembali ke kolom A
            $column = 'A';

            // simpan data ke database
            $this->database->create($data['database'],$import);

        }

        // hapus file dari cache
        delete_files($uploadpath);

        // kirim notifikasi status sukses
        echo json_encode(["status" => true]);
    }

    /**
     * generate excel template import
     *
     * @return  file
     */
    public function template(){

        // konfigurasi halaman
        $data = $this->setup();

        // instance spreadsheet baru
        $spreadsheet = new Spreadsheet();

        // set properti dokumen
        $spreadsheet->getProperties()
            ->setCreator('HILAB')
            ->setLastModifiedBy('HILAB')
            ->setTitle('Template Import '.$data['title']. "HILAB")
            ->setSubject('Template Import '.$data['title']. "HILAB")
            ->setDescription('Template Import '.$data['title']. "HILAB")
            ->setKeywords('HILAB')
            ->setCategory('Template Import '.$data['title']. "HILAB");

        // set kolom
        $column = 'A';

        // set baris
        $row = '1';

        // tambahkan nama kolom
        foreach ($data['feature']['import']['header'] as $t => $u) { // untuk setiap header terhadap nama kolom database

            // tuliskan nama kolom
            $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.$row, $t);

            // geser kolom ke kanan
            $column++;

        }

        // geser kolom ke kanan
        $column++;

        // tampilkan nama kolom untuk contoh
        $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.$row, 'Kolom');

        // geser baris ke bawah
        $row++;

        // tambahkan kolom sebagai contoh
        foreach ($data['feature']['import']['header'] as $t => $u) { // untuk setiap header terhadap nama kolom database

            // tuliskan nama kolom
            $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.$row, $t);

            // geser baris ke bawah
            $row++;

        }

        // kembali ke baris pertama
        $row = '1';

        // geser kolom ke kanan
        $column++;

        // tuliskan contoh
        $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.$row, 'Contoh');

        // geser baris ke bawah
        $row++;

        // tambahkan contoh isian kolom
        foreach ($data['feature']['import']['example'] as $t) { // untuk setiap contoh isian

            // tuliskan contoh isian
            $spreadsheet->setActiveSheetIndex(0)->setCellValue($column.$row, $t);

            // geser baris ke bawah
            $row++;
        }

        // beri nama worksheet
        $spreadsheet->getActiveSheet()->setTitle($data['title']);

        // set excel untuk membuka halaman ke 0
        $spreadsheet->setActiveSheetIndex(0);

        // konfigurasi header
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.'Template Import '.$data['title'].' HILAB.xls"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        // buat writer
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // simpan excel
        $writer->save('php://output');

        // keluar dari method
        exit;
    }
}
?>