<div class="row">
	<div class="col-12">
		<div class="page-title-box d-flex align-items-center justify-content-between">
			<h4 class="page-title mb-0 font-size-18">Daftar Mobil</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">				
			
			<div class="float-end">
				<div class="btn-toolbar" role="toolbar">
					<div class="btn-group me-2 mb-5 mb-sm-0">
						
					</div>
				</div>
			</div>
			<h4 class="card-title mb-4"></h4>
				
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<button type="button" id="btnTambah" class="btn btn-outline-primary waves-effect waves-light"><i class="bx bx-bookmark-plus"></i>&nbsp;Tambah Data</button>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group">
							<input type="text" id="txtcari" class="form-control form-control" onkeyup="kEnter(event,'btnCari')" autocomplete="off" />
							<div class="input-group-append">							
								<button type="button" id="btnCari" class="btn btn-outline-danger waves-effect waves-light"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col" id="respon"></div>
			</div>
			
			</div>
		</div>
	</div>
</div>

<div class="loading">
	<div class="block"></div>
	<div class="block"></div>
	<div class="block"></div>
	<div class="block"></div>
</div>

<script type="text/javascript">
	var sdhcari		= false;
	var firstLoad	= true;
	
	getDefault = function(){
		$(".loading").css("display", "block");
		
		$.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>cars/defaultData",
			success: function(html){
				$("#respon").html(html);
				$(".loading").css("display", "none");
			}
		}); 
	};
	
	getDefault();
	
	$(document).on("click", "#btnTambah", function(){
		$(".loading").css("display", "block");
		
		$.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>cars/frmTambah",
			success: function(html){
				$("#respon").html(html);
				
				$("#status").select2({});
				
				$(".loading").css("display", "none");
			}
		});
	});
	
	$(document).on("click", "#batal", function(){
		getDefault();
	})	
	
	$(document).on("click", "#simpan", function(){
		$(".loading").css("display", "block");
		
		$.ajax({
			type     :"POST",
			url      :$("#frm").attr("action"),
			data     :new FormData($("#frm")[0]),
			processData: false,
			contentType: false,
			dataType : "JSON",
			success  : function(r){
				if(r.error==true){
					$(".loading").css("display", "none");
					Swal.fire('', r.msgErr, 'error');
					return false;
				}
				
				getDefault();
			}
		});
	});
	
	$(document).on("click", "#btnEdit", function(){
		var ids 		=$(this).attr("rel");
		
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>cars/frmEdit",
			data : {id: ids},
			success: function(html, statusTxt, xhr){
				if( statusTxt == "success" ){
					$("#respon").html(html);
					$("#status").select2({});
				}
			}
		});
		
	});
	
	$(document).on("click", "#btnHapus", function(){
		var ids		=$(this).attr("rel");
		
		Swal.fire({
				title: "Adan Yakin?",
				text: "Data tidak bisa lagi dikembalikan!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#34c38f",
				cancelButtonColor: "#f46a6a",
				confirmButtonText: "<li class='fas fa-check-circle'></li> Ya, Hapus!",
				cancelButtonText: "<li class='far fa-times-circle'></li> Batal",
				allowOutsideClick: false,
				allowEscapeKey: false,
				focusCancel: true
			}).then((result)=> {
				
				if(result.value){
					
					$(".loading").css("display","block");
					
					$.ajax({
						type     :"POST",
						url      :"<?php echo base_url(); ?>cars/hapus",
						data     :{id: ids},
						dataType : "JSON",
						success  : function(r){
							if(r.error==true){
								$(".loading").css("display","none");
								Swal.fire('', r.msgErr, 'error');
								return false;
							}
							
							getDefault();

						}
					});
				}
			});
		
	});
	
	$(document).on("click", "#paging a", function(){
		$(".loading").css("display","block");
		
		var url 	=$(this).attr("data-href");
		
		$.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>wilayah/cek_sesi",
			dataType : "JSON",
			success: (res)=>{
				
				$.ajax({
					type: "GET",
					url: url ,
					success: (html)=>{
						$("#respon").html(html);
						$(".loading").css("display","none");
					}
				});
				
				return false;
				
			},
			error: (jqXHR, timeout, message)=>{
				var contentType = jqXHR.getResponseHeader("Content-Type");
				if (jqXHR.status === 200 && contentType.toLowerCase().indexOf("text/html") >= 0) {
					window.location.reload();
				}
			}
		});
	});
	
	
	$(document).on("click", "#btnCari", function(){
		var keys	=$("#txtcari").val();
		
		if(!keys){
			if(sdhcari == true) {
				getDefault();
				sdhcari = false;
				return false;  
			} else {
				Swal.fire('', 'Please input keywords', 'error');
				return false;
			}
		}		
		
		$(".loading").css("display", "block");
		
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>cars/cari",
			data : {keys: keys},
			success: function(html, statusTxt, xhr){
				if( statusTxt == "success" ){
					$("#respon").html(html);
					sdhcari = true;
					$(".loading").css("display", "none");
				}
			}
		});
	});
	
	
</script>