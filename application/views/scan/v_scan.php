<div class="container">
	<div class="card  mx-auto mt-5">
		<div class="card-header">Transfer</div>
		<div class="card-body">
			<div class="form-group">
				<div class="form-label-group">
				Barcode
					<input type="number" id="barcode" class="form-control" placeholder="Scan Barcode"
						autofocus="autofocus">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="data" class="text-center"></div>
<script>

  var input = document.getElementById("barcode");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   var angka=$('#barcode').val();
   $.ajax({
        type:'POST',
        url:'<?php echo base_url()."scan/get_wirerod" ?>',
        data:{barcode:angka},
        dataType:'json',
        success:function(data){
            console.log(data)
            if(data==null){

				var audio = new Audio('<?php echo base_url() ?>assets/audio/vno.wav');
				audio.play();
				$('#data').html('<img src="<?php echo base_url()?>assets/img/no.png" class="img-fluid mt-3" width="150px">')
				$('#barcode').val('');
			}else{
				var audio = new Audio('<?php echo base_url() ?>assets/audio/vok.wav');
				audio.play();
				$('#data').html('<img src="<?php echo base_url()?>assets/img/oke.png" class="img-fluid mt-3"  width="150px">')
				$('#barcode').val('');
			}
           
        }
    })
  }
});
</script>
