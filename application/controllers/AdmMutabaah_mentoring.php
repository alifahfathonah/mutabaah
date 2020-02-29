<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class AdmMutabaah_mentoring extends Super
{
    protected function setup()
    {
        return [
            'title' => "Mentoring",
            'database' => "mentoring",
            'idcolumn' => "idmentoring",
            'table' => [
                'select' => '*',
                'join' => [
                    "kelompok" => "Kelompok_idkelompok=idkelompok",
                    "user" => "User_iduser=iduser"
                ],
                'condition' => "",
                'entries' => 10,
                'header' => ['Kelompok','Hari','Jam','E-mail','Role','Status'],
                'column' => [
                    'kode_kelompok' => 'text',
                    'hari_kelompok' => 'text',
                    'jam_kelompok' => 'text',
                    'email_user' => 'text',
                    'role_mentoring' => 'text',
                    'status_mentoring' => 'toggle'
                ],
                'ordercolumn' => "kode_kelompok",
                'sort' => "asc",
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
                        0 => 'kode_kelompok',
                        1 => ''
                    ]
                ],
                'toggle' => [
                    0 => true,
                    'togglecolumn' => "status_mentoring",
                ],
                'special' => [
                    0 => false,
                    'value' => [[],[]]
                ],
                'import' => [
                    0 => false,
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
                    'label' => 'Kelompok',
                    'name' => 'Kelompok_idkelompok',
                    'id' => 'Kelompok_idkelompok',
                    'type' => 'select',
                    'value' => '',
                    'option' => $this->database->select("idkelompok,kode_kelompok", "kelompok", "1=1"),
                    'valname' => 'idkelompok',
                    'optname' => 'kode_kelompok',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'User',
                    'name' => 'User_iduser',
                    'id' => 'User_idUser',
                    'type' => 'select',
                    'value' => '',
                    'option' => $this->database->select("iduser,email_user", "user", "1=1"),
                    'valname' => 'iduser',
                    'optname' => 'email_user',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Role',
                    'name' => 'role_mentoring',
                    'id' => 'role_mentoring',
                    'type' => 'select',
                    'value' => '',
                    'option' => [
                        [
                            'val' => 'murobi',
                            'opt' => 'murobi',
                        ],
                        [
                            'val' => 'mutarobi',
                            'opt' => 'mutarobi',
                        ]
                    ],
                    'valname' => 'val',
                    'optname' => 'opt',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Status',
                    'name' => 'status_mentoring',
                    'id' => 'status_mentoring',
                    'type' => 'select',
                    'value' => '',
                    'option' => array(
                        array(
                            'val' => 'enabled',
                            'opt' => 'Enabled'
                        ),
                        array(
                            'val' => 'disabled',
                            'opt' => 'Disabled'
                        )
                    ),
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