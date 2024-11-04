<?php

return [
    'users' => [
        'itemTitle' => 'User',
        'collectionTitle' => 'Users',
        'inputs' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Name',
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Email',
            ],
            'role' => [
                'label' => 'Role',
                'placeholder' => 'Role',
            ],
            'password' => [
                'label' => 'Password',
                'placeholder' => 'Password',
            ],
            'tandaTangan' => [
                'label' => 'Tanda tangan',
                'placeholder' => 'Tanda tangan',
            ],
        ],
    ],
    'pemeliharaans' => [
        'itemTitle' => 'Pemeliharaan',
        'collectionTitle' => 'Pemeliharaans',
        'inputs' => [
            'tanggalPemeliharaan' => [
                'label' => 'Tanggal pemeliharaan',
                'placeholder' => 'Tanggal pemeliharaan',
            ],
            'waktuMulaiPemeliharaan' => [
                'label' => 'Waktu mulai pemeliharaan',
                'placeholder' => 'Waktu mulai pemeliharaan',
            ],
            'periodePemeliharaan' => [
                'label' => 'Periode pemeliharaan',
                'placeholder' => 'Periode pemeliharaan',
            ],
            'cuaca' => [
                'label' => 'Cuaca',
                'placeholder' => 'Cuaca',
            ],
            'no_alatUkur' => [
                'label' => 'No alat ukur',
                'placeholder' => 'No alat ukur',
            ],
            'no_GSM' => [
                'label' => 'No gsm',
                'placeholder' => 'No gsm',
            ],
            'alat_telemetri_id' => [
                'label' => 'Alat telemetri id',
                'placeholder' => 'Alat telemetri id',
            ],
            'user_id' => [
                'label' => 'User id',
                'placeholder' => 'User id',
            ],
        ],
    ],
    'pemeriksaans' => [
        'itemTitle' => 'Pemeriksaan',
        'collectionTitle' => 'Pemeriksaans',
        'inputs' => [
            'hasilPemeriksaan' => [
                'label' => 'Hasil pemeriksaan',
                'placeholder' => 'Hasil pemeriksaan',
            ],
            'catatan' => [
                'label' => 'Catatan',
                'placeholder' => 'Catatan',
            ],
            'pemeliharaan_id' => [
                'label' => 'Pemeliharaan id',
                'placeholder' => 'Pemeliharaan id',
            ],
            'user_id' => [
                'label' => 'User id',
                'placeholder' => 'User id',
            ],
        ],
    ],
];
