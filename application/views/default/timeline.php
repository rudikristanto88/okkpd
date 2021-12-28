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

/*
button {
position: absolute;
width: 100px;
min-width: 100px;
padding: 20px;
margin: 20px;
font-family: "Titillium Web", sans serif;
border: none;
color: white;
font-size: 16px;
text-align: center;
} */


</style>

<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<center><h3>Status Layanan <?= $kode ?></h3></center>
<div style="overflow-x:scroll" class="scrollbar" id="style-6">

<ul class="timelines" id="timeline" style="width:130%">
  <?php if ($status['manager_adm'] != null): ?>
  <li class="li complete">
    <div class="timestamp">
      <!-- <span class="author">Abhi Sharma</span> -->
        <span class="date"><?= date('d', strtotime($status['manager_adm'])) .
            ' ' .
            $bulan[date('n', strtotime($status['manager_adm'])) - 1] .
            ' ' .
            date('Y', strtotime($status['manager_adm'])) ?><span>
    </div>
    <div class="status">
      <h4>Manager Admin </h4>
    </div>
  </li>
<?php endif; ?>

<?php if ($status['w_inspeksi'] != null): ?>
<li class="li complete">
  <div class="timestamp">
    <!-- <span class="author">Abhi Sharma</span> -->
    <span class="date"><?= date('d', strtotime($status['w_inspeksi'])) .
        ' ' .
        $bulan[date('n', strtotime($status['w_inspeksi'])) - 1] .
        ' ' .
        date('Y', strtotime($status['w_inspeksi'])) ?><span>
  </div>
  <div class="status">
    <h4>Inspeksi Layanan</h4>
  </div>
</li>
<?php endif; ?>

<?php if ($status['w_ppc'] != null): ?>
<li class="li complete">
  <div class="timestamp">
    <!-- <span class="author">Abhi Sharma</span> -->
    <span class="date"><?= date('d', strtotime($status['w_ppc'])) .
        ' ' .
        $bulan[date('n', strtotime($status['w_ppc'])) - 1] .
        ' ' .
        date('Y', strtotime($status['w_ppc'])) ?><span>
  </div>
  <div class="status">
    <h4>Pengambilan Contoh</h4>
  </div>
</li>
<?php endif; ?>

<?php if ($status['w_hasil_mt'] != null): ?>
<li class="li complete">
  <div class="timestamp">
    <!-- <span class="author">Abhi Sharma</span> -->
    <span class="date"><?= date('d', strtotime($status['w_hasil_mt'])) .
        ' ' .
        $bulan[date('n', strtotime($status['w_hasil_mt'])) - 1] .
        ' ' .
        date('Y', strtotime($status['w_hasil_mt'])) ?><span>
  </div>
  <div class="status">
    <h4>Uji Laboratorium</h4>
  </div>
</li>
<?php endif; ?>

<?php if ($status['w_komtek'] != null): ?>
<li class="li complete">
  <div class="timestamp">
    <!-- <span class="author">Abhi Sharma</span> -->
    <span class="date"><?= date('d', strtotime($status['w_komtek'])) .
        ' ' .
        $bulan[date('n', strtotime($status['w_komtek'])) - 1] .
        ' ' .
        date('Y', strtotime($status['w_komtek'])) ?><span>

  </div>
  <div class="status">
    <h4>Komisi Teknis</h4>
  </div>
</li>
<?php endif; ?>

<?php if ($status['tanggal_ditolak'] != null): ?>
<li class="li uncomplete">
  <div class="timestamp">
    <!-- <span class="author">Abhi Sharma</span> -->
      <span class="date"><?= date('d', strtotime($status['tanggal_ditolak'])) .
          ' ' .
          $bulan[date('n', strtotime($status['tanggal_ditolak'])) - 1] .
          ' ' .
          date('Y', strtotime($status['tanggal_ditolak'])) ?><span>
  </div>
  <div class="status">
    <h4>Ditolak</h4>
  </div>
</li>
<?php endif; ?>

</div>

<script type="text/javascript">
  var myDiv = $("#timeline");
  var scrollto = myDiv.offset().left + (myDiv.width() / 2);
  myDiv.animate({ scrollLeft:  scrollto});
</script>
