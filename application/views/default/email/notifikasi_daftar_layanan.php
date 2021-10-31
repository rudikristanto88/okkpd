<!DOCTYPE html>
<html>
<head>
<meta charset=”utf-8″ />
<title>Codeigniter email template</title>
<meta name=”viewport” content=”width=device-width, initial-scale=1.0″ />
<style media="screen">
  body{
    font-family: Helvetica, Arial, sans-serif
  }
  .btn-konfirmasi{
    padding: 8px 12px;
    border: 1px solid #46b8da;
    background: #46b8da;
    border-radius: 2px;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #ffffff;
    text-decoration: none;
    font-weight:bold;
    text-align:center;
    display: inline-block;
  }
  .header{
    border-bottom: 1px solid #ddd;
    width: 100%;
    padding: 8px 0;
    margin-bottom: 16px;
    font-size: 18px;
  }
</style>
</head>
  <body>
    <div class="header">
    <h3>Kode Pendaftaran</h3>
    </div>

    <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td>Kepada Yth<br/><?= $nama ?><br/><br/></td>
              </tr>
              <tr>
                <td align="center">Berikut adalah kode registrasi anda yang dapat digunakan untuk keperluan tracking pengajuan layanan<br/><br/>
                    <?= $kode ?>
                  <br/><br/>
                  Kartu pendaftaran anda dapat diunduh dibawah ini : <br/><br/>
                  <a href="<?= $link ?>" target="_blank" class="btn-konfirmasi">
                      Download
                  </a> <br/><br/>

                </td>
              </tr>

    </table>

  </body>
</html>
