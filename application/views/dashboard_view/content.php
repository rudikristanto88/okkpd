<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">



    </div>

    <!-- Widgets -->

    <!-- #END# Widgets -->

  </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
  $.ajax({
    url: "<?= base_url()?>dashboard/dashboard/<?= $menu ?>",
    success: function(result){
      $("#konten").html(result);
    }
  });
})
</script>
