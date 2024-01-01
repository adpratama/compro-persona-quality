<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['email_must_be_array'] = 'Metode validasi email harus disertakan dalam bentuk array.';
$lang['email_invalid_address'] = 'Alamat email tidak valid: %s';
$lang['email_attachment_missing'] = 'Tidak dapat menemukan lampiran email berikut: %s';
$lang['email_attachment_unreadable'] = 'Tidak dapat membuka lampiran ini: %s';
$lang['email_no_recipients'] = 'Anda harus menyertakan penerima: To, Cc, atau Bcc';
$lang['email_send_failure_phpmail'] = 'Tidak dapat mengirim email menggunakan PHP mail(). Server Anda mungkin tidak dikonfigurasi untuk mengirim email dengan metode ini.';
$lang['email_send_failure_sendmail'] = 'Tidak dapat mengirim email menggunakan PHP Sendmail. Server Anda mungkin tidak dikonfigurasi untuk mengirim email dengan metode ini.';
$lang['email_send_failure_smtp'] = 'Tidak dapat mengirim email menggunakan PHP SMTP. Server Anda mungkin tidak dikonfigurasi untuk mengirim email dengan metode ini.';
$lang['email_sent'] = 'Pesan Anda telah berhasil dikirim menggunakan protokol berikut: %s';
$lang['email_no_socket'] = 'Tidak dapat membuka soket ke Sendmail. Silakan periksa pengaturan.';
$lang['email_no_hostname'] = 'Anda tidak menentukan host SMTP.';
$lang['email_smtp_error'] = 'Error SMTP berikut ditemui: %s';
$lang['email_no_smtp_unpw'] = 'Error: Anda harus menetapkan nama pengguna dan password SMTP.';
$lang['email_failed_smtp_login'] = 'Gagal mengirimkan perintah AUTH LOGIN. Error: %s';
$lang['email_smtp_auth_un'] = 'Gagal mengotentikasi nama pengguna. Error: %s';
$lang['email_smtp_auth_pw'] = 'Gagal mengotentikasi password. Error: %s';
$lang['email_smtp_data_failure'] = 'Tidak dapat mengirimkan data: %s';
$lang['email_exit_status'] = 'Exit status code: %s';
