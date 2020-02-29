<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class AdmMutabaah_user extends Super
{
    protected function setup()
    {
        return [
            'title' => "List User",
            'database' => "user",
            'idcolumn' => "iduser",
            'table' => [
                'select' => '*',
                'join' => [],
                'condition' => "",
                'entries' => 10,
                'header' => ["Nama","Email","Role","Status"],
                'column' => [
                    'nama_user' => 'text',
                    'email_user' => 'text',
                    'role_user' => 'text',
                    'status_user' => 'toggle'
                ],
                'ordercolumn' => "nama_user",
                'sort' => "asc",
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
                        0 => 'email_user',
                        1 => ''
                    ]
                ],
                'toggle' => [
                    0 => true,
                    'togglecolumn' => "status_user",
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
					'label' => 'Nama',
                    'name' => 'nama_user',
                    'id' => 'nama_user',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'Nama User',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'NIM',
                    'name' => 'nim_user',
                    'id' => 'nim_user',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'NIM User',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'E-mail',
                    'name' => 'email_user',
                    'id' => 'email_user',
                    'type' => 'text',
                    'value' => '',
                    'placeholder' => 'E-mail User',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Password',
                    'name' => 'password_user',
                    'id' => 'password_user',
                    'type' => 'password',
                    'value' => '',
                    'placeholder' => 'Password Login',
                    'left' => '2',
                    'right' => '10'
                ],
                [
                    'label' => 'Role',
                    'name' => 'role_user',
                    'id' => 'role_user',
                    'type' => 'select',
                    'value' => '',
                    'option' => [
                        [
                            'val' => 'user',
                            'opt' => 'User'
                        ],
                        [
                            'val' => 'admin',
                            'opt' => 'Admin'
                        ]
                    ],
                    'valname' => 'val',
                    'optname' => 'opt',
                    'left' => '2',
                    'right' => '10'
                ],
                [
					'label' => 'Status',
                    'name' => 'status_user',
                    'id' => 'status_user',
                    'type' => 'select',
                    'value' => '',
                    'option' => [
                        [
                            'val' => 'enabled',
                            'opt' => 'Enabled'
                        ],
                        [
                            'val' => 'disabled',
                            'opt' => 'Disabled'
                        ]
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