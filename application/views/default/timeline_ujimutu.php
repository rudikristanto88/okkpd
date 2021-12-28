<style media="screen">
.timelines {
list-style-type: none;
display: flex;
align-items: left;
justify-content: left;
}

.li {
transition: all 200ms ease-in;
}

.timestamp {
margin-bottom: 20px;
padding: 0px 40px;
display: flex;
flex-direction: column;
align-items: center;
font-weight: 100;
}

.status {
padding: 0px 40px;
display: flex;
justify-content: center;
border-top: 2px solid #D6DCE0;
position: relative;
transition: all 200ms ease-in;
}
.status h4 {
font-weight: 600;
}
.status:before {
content: "";
width: 25px;
height: 25px;
background-color: white;
border-radius: 25px;
border: 1px solid #ddd;
position: absolute;
top: -15px;
left: 42%;
transition: all 200ms ease-in;
}

.li.complete .status {
border-top: 2px solid #66DC71;
}
.li.complete .status:before {
background-color: #66DC71;
border: none;
transition: all 200ms ease-in;
}
.li.uncomplete .status:before {
background-color: #e74c3c;
border: none;
transition: all 200ms ease-in;
}

.li.complete .status h4 {
color: #66DC71;
}

@media (min-device-width: 320px) and (max-device-width: 700px) {
.timeline {
  list-style-type: none;
  display: block;
}

.li {
  transition: all 200ms ease-in;
  display: flex;
  width: inherit;
}

.timestamp {
  width: 100px;
}

.status:before {
  left: -8%;
  top: 30%;
  transition: all 200ms ease-in;
}
}


#style-6::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#style-6::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-6::-webkit-scrollbar-thumb
{
	background-color: #F90;
	background-image: -webkit-linear-gradient(45deg,
	                      rgba(255, 255, 255, .2) 25%,
											  transparent 25%,
											  transparent 50%,
											  rgba(255, 255, 255, .2) 50%,
											  rgba(255, 255, 255, .2) 75%,
											  transparent 75%,
											  transparent)
}
</style>

<?php 

function setTanggal($bulan, $tanggal){
  return $tanggal == null || $tanggal == '0000-00-00' ? '-' : date('d', strtotime($tanggal))
    . ' '
    . $bulan[date('n', strtotime($tanggal)) - 1]
    . ' '
    . date('Y', strtotime($tanggal));
}

$data = array(
  array(
    "tanggal" => setTanggal($bulan, $status['tanggalSampleLab']),
    "status" => $status['sampleLab'],
    "title" => $status['sampleLab'] == 0 ? 'Menunggu Sample' : 'Sample Diterima'
  ),
  array(
    "tanggal" => setTanggal($bulan, $status['tanggalValidLab']),
    "status" => $status['validLab'],
    "title" => $status['validLab'] == 0 ? 'Menunggu Validasi' : 'Tervalidasi'
  ),
  array(
    "tanggal" => setTanggal($bulan, $status['tanggalManTek']),
    "status" => $status['validManTek'],
    "title" => $status['validManTek'] == 0 || $status['validManTek'] == 2 ? 'Menunggu Hasil' : 'Validasi Manager Teknis'
  ),
  array(
    "tanggal" => setTanggal($bulan, $status['tglcetak']),
    "status" => $status['tglcetak'] == '0000-00-00' ? 0 : 1,
    "title" => $status['tglcetak'] == '0000-00-00' ? 'Proses Validasi LHU' : 'Sudah Terbit'
  )
);
?>

<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<center><h3>Status Layanan <?= $kode ?></h3></center>
<div style="overflow-x:scroll" class="scrollbar" id="style-6">

<ul class="timelines" id="timeline" style="width:100%">

<?php foreach($data as $element): ?>
  <li class="li <?= $element['status'] == '1' ? 'complete' : 'uncomplete' ?>">
    <div class="timestamp">
        <span class="date"><?= $element['tanggal'] ?><span>
    </div>
    <div class="status">
      <h5><?= $element['title']  ?>  </h5>
    </div>
  </li>
<?php endforeach; ?>

</ul>

</div>

<script type="text/javascript">
  var myDiv = $("#timeline");
  var scrollto = myDiv.offset().left + (myDiv.width() / 2);
  myDiv.animate({ scrollLeft:  scrollto});
</script>
