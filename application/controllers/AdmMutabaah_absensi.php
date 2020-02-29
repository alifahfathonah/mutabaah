<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class AdmMutabaah_absensi extends Super
{
    
    protected function setup()
    {
        return [
            'title' => "pertemuan",
            'database' => "pertemuan",
            'idcolumn' => "idpertemuan",
            'table' => [
                'select' => '*',
                'join' => [
                    'mentoring' => "mentoring_idmentoring = idmentoring",
                    'kelompok' => "idkelompok = Kelompok_idkelompok"
                ],
                'condition' => "",
                'entries' => 10,
                'header' => ['Waktu' ,'Kode Kelompok' ,'Judul Materi', 'Tilawah', 'MC', 'Kultum', 'Infaq'],
                'column' => [
                    'waktu_pertemuan' => 'text',
                    'kode_kelompok' => 'text',
                    'materi_pertemuan' => 'text',
                    'tilawah_pertemuan' => 'text',
                    'mc_pertemuan' => 'text',
                    'kultum_pertemuan' => 'text',
                    'infaq_pertemuan' => 'text'
                ],
                'ordercolumn' => "waktu_pertemuan",
                'sort' => "desc",
            ],
            'feature' => [
                'tambah' => true,
                'edit' => true,
                'hapusall' => true,
                'refresh' => true,
                'detail' => true,
                'delete' => [
                    0 => true,
                    'notifcolumn' => [
                        0 => 'idpertemuan',
                        1 => 'waktu_pertemuan'
                    ]
                ],
                'toggle' => [
                    0 => false,
                    'togglecolumn' => "",
                ],
                'special' => [
                    0 => false,
                    'value' => [
                        [
                            'login',
                            'login sebagai',
                            'fa fa-sign-in'
                        ],
                        [
                            "download",
                            "download tugas terakhir",
                            "fa fa-download"
                        ]
                    ]
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
                    'label' => 'Waktu',
                    'name' => 'waktu_pertemuan',
                    'id' => 'waktu_pertemuan',
                    'type' => 'date',
                    'view' => 'decade',
                    'value' => '',
                    'placeholder' => '',
                    'valname' => 'val',
                    'optname' => 'opt',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Kelompok',
                    'name' => 'mentoring_idmentoring',
                    'id' => 'mentoring_idmentoring',
                    'type' => 'select',
                    'value' => '',
                    'option' => $this->database->select("idmentoring, CONCAT(kode_kelompok,'-', nama_user) as kelompok"
                                                            , "mentoring,kelompok,user"
                                                            , 'mentoring.Kelompok_idkelompok = kelompok.idkelompok AND '
                                                                .'mentoring.User_iduser = user.iduser AND '
                                                                .'mentoring.status_mentoring = "enabled" AND '
                                                                .'mentoring.role_mentoring = "murobi"'
                                                            ),
                    'valname' => 'idmentoring',
                    'optname' => 'kelompok',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Judul Materi',
                    'name' => 'materi_pertemuan',
                    'id' => 'materi_pertemuan',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'Judul Materi',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Tilawah',
                    'name' => 'tilawah_pertemuan',
                    'id' => 'tilawah_pertemuan',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'Nama tilawah',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'MC',
                    'name' => 'tilawah_pertemuan',
                    'id' => 'tilawah_pertemuan',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'Nama MC',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Kultum',
                    'name' => 'kultum_pertemuan',
                    'id' => 'kultum_pertemuan',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'Nama pemateri Kultum',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Infaq',
                    'name' => 'infaq_pertemuan',
                    'id' => 'infaq_pertemuan',
                    'type' => 'number',
                    'value' => '',
                    'placeholder' => '',
                    'left' => '2',
                    'right' => '10'
                ]
            ]
        ];
    }
    
}
?>