<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class AdmMutabaah_kelompok extends Super
{
	protected function setup()
    {
        return [
            'title' => "List Kelompok",
            'database' => "kelompok",
            'idcolumn' => "idkelompok",
            'table' => [
                'select' => '*',
                'join' => [],
                'condition' => "",
                'entries' => 10,
                'header' => ['Kode','Hari','Jam','Status'],
                'column' => [
                    'kode_kelompok' => 'text',
					'hari_kelompok' => 'text',
					'jam_kelompok' => 'text',
					'status_kelompok' => 'toggle'
                ],
                'ordercolumn' => "kode_kelompok",
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
                        0 => 'kode_kelompok',
                        1 => ''
                    ]
                ],
                'toggle' => [
                    0 => true,
                    'togglecolumn' => "status_kelompok",
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
					'label' => 'Kode',
					'name' => 'kode_kelompok',
					'id' => 'kode_kelompok',
					'type' => 'text',
					'value' => '',
					'placeholder' => '',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Hari',
					'name' => 'hari_kelompok',
					'id' => 'hari_kelompok',
					'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => 'senin',
							'opt' => 'Senin'
						],
						[
							'val' => 'selasa',
							'opt' => 'Selasa'
						],
						[
							'val' => 'rabu',
							'opt' => 'Rabu'
						],
						[
							'val' => 'kamis',
							'opt' => 'Kamis'
						],
						[
							'val' => 'jumat',
							'opt' => 'Jumat'
						],
						[
							'val' => 'sabtu',
							'opt' => 'Sabtu'
						],
						[
							'val' => 'minggu',
							'opt' => 'Minggu'
						]
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
                    'label' => 'Jam',
					'name' => 'jam_kelompok',
					'id' => 'jam_kelompok',
					'type' => 'select',
					'value' => '',
					'option' => [
						[
							'val' => '07:00',
							'opt' => '07:00'
						],
						[
							'val' => '08:00',
							'opt' => '08:00'
						],
						[
							'val' => '09:00',
							'opt' => '09:00'
						],
						[
							'val' => '10:00',
							'opt' => '10:00'
						],
						[
							'val' => '11:00',
							'opt' => '11:00'
						],
						[
							'val' => '12:00',
							'opt' => '12:00'
						],
						[
							'val' => '13:00',
							'opt' => '13:00'
						],
						[
							'val' => '14:00',
							'opt' => '14:00'
						],
						[
							'val' => '15:00',
							'opt' => '15:00'
						],
						[
							'val' => '16:00',
							'opt' => '16:00'
						],
						[
							'val' => '17:00',
							'opt' => '17:00'
						],
						[
							'val' => '18:00',
							'opt' => '18:00'
						],
						[
							'val' => '19:00',
							'opt' => '19:00'
						],
						[
							'val' => '20:00',
							'opt' => '20:00'
						],
						[
							'val' => '21:00',
							'opt' => '21:00'
						]
					],
					'valname' => 'val',
					'optname' => 'opt',
					'left' => '2',
					'right' => '10'
                ],
                [
					'label' => 'Status',
					'name' => 'status_kelompok',
					'id' => 'status_kelompok',
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