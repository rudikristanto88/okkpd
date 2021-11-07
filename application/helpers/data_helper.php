<?php
if (!function_exists('data_jenis_kelamin')) {
    function data_jenis_kelamin()
    {
        return array(array("key" => "L", "value" => "Laki-Laki"), array("key" => "P", "value" => "Perempuan"));
    }
}

if (!function_exists('data_pendidikan')) {
    function data_pendidikan()
    {
        return array(
            array("key" => "SD", "value" => "SD/Sederajat"),
            array("key" => "SLTP", "value" => "SLTP"),
            array("key" => "SLTA", "value" => "SLTA"),
            array("key" => "Diploma", "value" => "Diploma (D-1, D-2, D-3)"),
            array("key" => "Sarjana", "value" => "Sarjana (S-1)"),
            array("key" => "PascaSarjana", "value" => "Pasca Sarjana (S-2, S-3)")
        );
    }
}

if (!function_exists('data_pekerjaan')) {
    function data_pekerjaan()
    {
        return array("PNS/TNI/POLRI", "Pensiunan", "Pegawai Swasta", "Wiraswasta", "Buruh (Tani/Bangunan)", "Pelajar/Mahasiswa", "Tidak Bekerja", "Petani", "Lainnya");
    }
}

if (!function_exists('data_pelayanan')) {
    function data_pelayanan($jenis)
    {
        if ($jenis == "okkpd") {
            return array(
                array("key" => "prima_2", "value" => "Pelayanan Sertifikasi Prima 2"),
                array("key" => "prima_3", "value" => "Pelayanan Sertifikasi Prima 3"),
                array("key" => "psat", "value" => "Pelayanan Sertifikasi PSAT"),
                array("key" => "kemas", "value" => "Pelayanan Sertifikasi Rumah Kemas"),
                array("key" => "hc", "value" => "Pelayanan Sertifikasi HC")
            );
        } else {
            return array(
                array("key" => "lab_ungaran", "value" => "Pelayanan Laboratorium Ungaran"),
                array("key" => "lab_surakarta", "value" => "Pelayanan Laboratorium Surakarta"),
            );
        }
    }
}

if (!function_exists('data_identitas_survey')) {
    function data_identitas_survey($jenis)
    {
        if ($jenis == "okkpd") {
            return array(
                array("tanggal_survey","Tanggal Survey", "text"),
                array("nama","Nama", "text"),
                array("email","Email", "text"),
                array("no_telp","No. Telp/HP", "text"),
                array("umur","Umur", "number"),
                array("jenis_kelamin","Jenis Kelamin", "jenis_kelamin"),
                array("alamat","Alamat", "text"),
                array("kecamatan","Kecamatan", "text"),
                array("kota","Kabupaten/Kota", "text"),
                array("provinsi","Provinsi", "text"),
                array("pendidikan","Pendidikan Terakhir", "pendidikan"),
                array("pekerjaan","Pekerjaan Utama", "pekerjaan"),
                array("kode_layanan", "Pelayanan","pelayanan", "okkpd"),
            );
        } else {
            return array(
                array("nama","Nama Responden", "text"),
                array("email","Email", "text"),
                array("no_telp","No. Telp/HP", "text"),
                array("alamat","Alamat", "text"),
                array("umur","Umur", "number"),
                array("jenis_kelamin","Jenis Kelamin", "jenis_kelamin"),
                array("pendidikan","Pendidikan Terakhir", "pendidikan"),
                array("pekerjaan","Pekerjaan", "pekerjaan"),
                array("kode_layanan","Pelayanan", "pelayanan", "uji_mutu"),
            );
        }
    }
}
