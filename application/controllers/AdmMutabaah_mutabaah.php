<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class AdmMutabaah_mutabaah extends Super
{
    protected function setup()
    {
        return [
            'title' => "List Mutabaah",
            'database' => "mutabaah",
            'idcolumn' => "idmutabaah",
            'table' => [
                'select' => '*',
                'join' => [
                    "pertemuan" => "pertemuan_idpertemuan=idpertemuan",
                    "mentoring" => "mentoring_idmentoring=idmentoring",
                    "user" => "mentoring.user_iduser=iduser",
                    "kelompok" => "idkelompok=Kelompok_idkelompok"
                ],
                'condition' => "",
                'entries' => 10,
                'header' => ["Nama","kode kelompok","waktu"],
                'column' => [
                    'nama_user' => 'text',
                    'kode_kelompok' => 'text',
                    'waktu_pertemuan' => 'text'
                ],
                'ordercolumn' => "idmutabaah",
                'sort' => "desc",
            ],
            'feature' => [
                'tambah' => true,
                'edit' => true,
                'hapusall' => false,
                'refresh' => true,
                'detail' => true,
                'delete' => [
                    0 => true,
                    'notifcolumn' => [
                        0 => 'idmutabaah',
                        1 => ''
                    ]
                ],
                'toggle' => [
                    0 => false,
                    'togglecolumn' => "",
                ],
                'special' => [
                    0 => false,
                    'value' => [[],[]]
                ],
                'import' => [
                    0 => true,
                    'header' => [
                        'No' => "ignore",
                        'Ruangan' => 'kmp_ruangan',
                        'Nomor' => 'kmp_nomor',
                        'IP' => 'kmp_ip'
                    ],
                    'example' => [
                        '{1,2,3,...}',
                        '{adm,d2h,d2i}',
                        '{0,1,2,...}',
                        '{192.168.1.2,192.168.1.3,...}'
                    ],
                    'datatype' => [
                        'ignore' => 'ignore',
                        'kmp_ruangan' => 'text',
                        'kmp_nomor' => 'text',
                        'kmp_ip' => 'text'
                    ],
                    'form' => [
                        [
                            'label' => 'File',
                            'name' => 'file',
                            'id' => 'file',
                            'type' => 'file',
                            'value' => '',
                            'placeholder' => '',
                            'accept' => ['.xls', '.xlsx'],
                            'left' => '2',
                            'right' => '10'
                        ]
                    ]
                ]
            ],
            'form' => [
                [
					'label' => 'User',
                    'name' => 'user_iduser',
                    'id' => 'user_iduser',
                    'type' => 'select',
                    'value' => '',
                    'option' => $this->database->select("iduser,nama_user", 'user,mentoring', 'mentoring.role_mentoring= "mutarobi" AND user.iduser = mentoring.User_iduser AND user.status_user = "enabled"'),
                    'valname' => 'iduser',
                    'optname' => 'nama_user',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Kelompok',
                    'name' => 'pertemuan_idpertemuan',
                    'id' => 'pertemuan_idpertemuan',
                    'type' => 'select',
                    'value' => '',
                    'option' => $this->database->select("CONCAT(kode_kelompok,' - ',waktu_pertemuan) AS absen, idpertemuan", "pertemuan,mentoring,kelompok", "pertemuan.mentoring_idmentoring =" . "mentoring.idmentoring AND kelompok.idkelompok =" . " mentoring.Kelompok_idkelompok"),
                    'valname' => 'idpertemuan',
                    'optname' => 'absen',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Terlambat',
                    'name' => 'terlambat',
                    'id' => 'terlambat',
                    'type' => 'number',
                    'value' => '0',
                    'placeholder' => '',
                    'left' => '2',
                    'right' => '10'
                ],
                [
					'label' => 'Tilawah',
                    'name' => 'tilawah',
                    'id' => 'tilawah',
                    'type' => 'number',
                    'value' => '0',
                    'placeholder' => '',
                    'left' => '2',
                    'right' => '10'
                ],
                [
					'label' => 'Hafalan',
                    'name' => 'hafalan',
                    'id' => 'hafalan',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
					'label' => 'Puasa',
                    'name' => 'puasa',
                    'id' => 'puasa',
                    'type' => 'number',
                    'value' => '0',
                    'placeholder' => '',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Qiamullail',
                    'name' => 'qiamulail',
                    'id' => 'qiamulail',
                    'type' => 'number',
                    'value' => '0',
                    'placeholder' => '',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Baca Buku',
                    'name' => 'baca_buku',
                    'id' => 'baca_buku',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Memberi Hadiah',
                    'name' => 'memberi_hadiah',
                    'id' => 'memberi_hadiah',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Sodaqoh',
                    'name' => 'sodaqoh',
                    'id' => 'sodaqoh',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Berita Islam',
                    'name' => 'update_berita_islam',
                    'id' => 'update_berita_islam',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Berita Nasional',
                    'name' => 'update_berita_nasional',
                    'id' => 'update_berita_nasional',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                // [
                //     'label' => 'Berita Internasional',
                //     'name' => 'update_berita_internasional',
                //     'id' => 'update_berita_internasional',
                //     'type' => 'text',
                //     'value' => '',
                //     'placeholder' => '',
                //     'valname' => 'update_internasional',
                //     'optname' => 'update_internasional',
                //     'left' => '2',
                //     'right' => '10'
                // ],
                [
                    'label' => 'Berita Internasional',
					'name' => 'update_berita_internasional',
					'id' => 'update_berita_internasional',
					'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Olahraga',
                    'name' => 'olahraga',
                    'id' => 'olahraga',
                    'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '1',
							'opt' => 'Ya'
						],
						[
							'val' => '0',
							'opt' => 'Tidak'
						],
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
            ]
        ];
    }
}
?>