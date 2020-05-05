<div class="container mt-4">
	<!-- Jumbotron -->
	<div id="jumbotron" class="card card-image mb-4" style="background-image: url(https://wallpapercave.com/wp/wp2276152.jpg);">
		<div class="text-white text-center py-5 px-4">
			<div>
			
			<h2 class="card-title h1-responsive pt-3 mb-5 font-bold" style="color: white; text-shadow: 1px 50px 50px black, 0 50px 150px black, 0 0 50px black;"><strong>Aplikasi sistem pakar ini akan mendiagnosa secara dini apakah terdapat potensi Kecanduan Game pada diri Anda berdasarkan gejala 
				yang ditimbulkan dengan metode Forward Chaining.</strong></h2>
			<p class="mx-5 mb-5" style="color: white; text-shadow: 1px 1px 50px black, 0 50px 50px black, 0 0 50px black;">Segera input data diri Anda dan klik tombol mulai!</p>
			<a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-clone left"></i> Mulai</a>
			</div>
		</div>
	</div>
	<!-- Jumbotron -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">

		<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">


			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle" style="color:red;">!Attention!</h5>
			</div>
			<div class="modal-body">
				Saya, Chintya Adinda Puri. menjamin seluruh data diri yang diberikan tidak akan disebar luaskan
				dan hanya digunakan untuk kepentingan penelitian
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="mulaiScreenB" data-dismiss="modal">Lanjut</button>
			</div>
			</div>
		</div>
	</div>

	
	<form id="questForm" action="<?php echo site_url("Halaman/add_jawaban") ?>">

	<div id="dataDiri" style="display: none;" class="mb-4">
		<div class="card"> 
			<h5 class="card-header info-color white-text text-center py-4">
				<strong>Data diri</strong>
			</h5>
			<!--Card content-->
			<div class="card-body px-lg-5 pt-0">
				<!-- Name -->
				<div class="md-form mt-3">
					<input type="text" id="namaI" name="nama" class="form-control" required>
					<label for="nama">Nama</label>
				</div>

				<div class="md-form mt-3">
					<!--Blue select-->
					<select class="mdb-select md-form colorful-select dropdown-primary" name="jenisKelamin" id="jenisKelaminI" required>
						<option value="0">Laki-laki</option>
						<option value="1">Perempuan</option>
					</select>
					<label class="mdb-main-label">Jenis Kelamin</label>
				</div>

				<div class="md-form mt-3" required>
					<input type="date" id="tanggalLahirI" name="tanggallahir" class="form-control form-control-sm validate">
					<label data-error="wrong" data-success="right" for="tanggalLahirI">Tanggal Lahir</label>
				</div>

				<div class="md-form mt-3" required>
					<input type="text" id="gameI" name="game" class="form-control">
					<label for="gameI">Game online yang paling sering dimainkan</label>
				</div>

				<!-- E-mail -->
				<div class="md-form mt-3" required>
					<input type="email" id="emailI" name="email" class="form-control">
					<label for="emailI">E-mail</label>
				</div>

				<div class="md-form mt-3" required>
					<input pattern="[0-9]+" type="text" id="hpI" name="hp" class="form-control">
					<label for="hpI">No. Handphone</label>
				</div>

				<button id="dataDiriB" type="button" class="btn btn-primary btn-rounded text-right">Next</button>
			</div>
		</div>
	</div>

	<div class="table-responsive" id="screening" style="display: none;">
		<table class="table" id="screenTb">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Pertanyaan</th>
					<th scope="col">Jawaban</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                    $no = 1;
                    foreach($pertanyaan as $a){ 
                ?>
				<tr>
					<th scope="row"><?php echo $no?></th>
					<td><?php echo $a->gejala ?></td>
					<td>
						<div class="form-check form-check-inline">
							<input required type="radio" value="1" class="form-check-input ansQuest" id="ckBxY_<?php echo $no?>"
								name="<?php echo $a->kode_gejala ?>">
							<label class="form-check-label" for="ckBxY_<?php echo $no?>">Ya</label>
						</div>

						<!-- Material inline 2 -->
						<div class="form-check form-check-inline">
							<input required type="radio" value="0" class="form-check-input ansQuest" id="ckBxN_<?php echo $no?>"
								name="<?php echo $a->kode_gejala ?>">
							<label class="form-check-label" for="ckBxN_<?php echo $no?>">Tidak</label>
						</div>
					</td>
				</tr>
				<?php $no++; }?>
			</tbody>
		</table>
		
		<div class="text-right">
			<button id="submitBtn" type="submit" class="btn btn-primary btn-rounded">Submit</button>
		</div>
	</div>
    </form>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class="alert" role="alert" id="hasilDiagnosa" style="display: none;">
				<h4 class="alert-heading">Berikut diagnosa Anda:</h4>
				<p>Dari hasil jawaban anda, sistem mendiagnosa Anda <b id="hasilScreening"></b> terhadap game</p>
			</div>
			<div id="saranDiagnosa_y"  class="alert alert-warning" role="alert" style="display: none;">
				<p> Pola permainan anda masih dalam batas normal, selalu perhatikan pola permainan anda agar tidak menyebabkan kecanduan </p>
			</div>
			<div id="saranDiagnosa_n"  class="alert alert-info" role="alert" style="display: none;">
				<p> Perlu diperhatikan Anda harus konsultasi kepada Psikolog atau Psikiater terdekat untuk pemeriksaan lebih lanjut. </p>
			</div>
		</div>
		<div class="col-md-5" id="canvasContainer" style="display: none;">
			<p>Hasil seluruh responden sebanyak <b id="responseC"></b>, berikut persentasenya: </p>
			<canvas id="persentaseHasil"></canvas>
		</div>
	</div>

	<button style="display: none;" id="ulangiBtn" type="submit" class="btn btn-primary btn-rounded">Selesai</button>
</div>

<script>
	var daftarEmail = '<?php echo json_encode($email)?>';
	function IsEmail(email) {
		let regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email)) {
			return false;
		}else{
			return true;
		}
	}

	function IsHp(hp) {
		let regex = /^(^\+62\s?|^0)(\d{3,4}-?){2}\d{3,4}$/g;
		if(!regex.test(hp)) {
			return false;
		}else{
			return true;
		}
	}

	$(document).ready(function(){
		//submit quest

		let nama, jenisKelamin, tanggalLahir, email, gameList, noHandphone;

		$("#mulaiScreenB").on("click", function(e){
			$("#jumbotron").hide();
			$("#dataDiri").css("display", "block");
		});

		$("#ulangiBtn").on("click", function(e){
			location.reload();
		});

		$("#dataDiriB").on("click", function(e){

			nama = $("#namaI").val();
			jenisKelamin = $("#jenisKelaminI").val();
			tanggalLahir = $("#tanggalLahirI").val();
			gameList	= $("#gameI").val();
			noHandphone = $("#hpI").val();
			email = $("#emailI").val();

			if(nama != "" && tanggalLahir != "" && jenisKelamin >= 0 && email != "" && gameList != "" && noHandphone != ""){
				if(IsEmail(email)){
					if(IsHp(noHandphone) && noHandphone >= 9){
						if(daftarEmail.includes(email)){
							toastr["error"]("email anda sudah terdaftar, Jawaban anda sudah terekam. Jika anda ingin mengedit jawaban anda silahkan hubungi wa:083890904464");
						}else{
							$("#dataDiri").hide();
							$("#screening").css("display", "block");
						}
					}else{
						toastr["error"]("No. HP tidak valid");
					}
				}else{
					toastr["error"]("Format email salah");
				}
			}else{
				toastr["error"]("Tolong isi semua data");
			}
		});

		$('#questForm').submit(function(e) {
				e.preventDefault();
				let checkInput = $("#screenTb input:checked").map(function(i, el) { 
					return {
						kode_gejala : $(this).attr("name"), 
						value : $(this).val()
					}  
				}).toArray();

				$.ajax({
					type: 'post',
					url: $(this).attr("action"),
					data: {"jawaban" : checkInput, "nama" : nama, "gameList" : gameList, "jenisKelamin": jenisKelamin, "noHandphone": noHandphone, "tanggalLahir" : tanggalLahir, "email" : email},
					dataType: 'json',
					success: function(data) {
						console.log(data);
						if(data.status == "fail"){
							toastr["error"](data.msg);
						}else{
							if(data.kecanduan){								
								$('#hasilScreening').text('Kecanduan');
								$("#hasilDiagnosa").css("display", "block");
								$("#hasilDiagnosa").addClass("alert-danger");
								$("#saranDiagnosa_n").css("display", "block");
								$("#ulangiBtn").css("display", "block");
								$("#screening").hide();
							}else{	
								$('#hasilScreening').text('Tidak Kecanduan');
								$("#hasilDiagnosa").addClass("alert-success");
								$("#hasilDiagnosa").css("display", "block");
								$("#saranDiagnosa_y").css("display", "block");
								$("#ulangiBtn").css("display", "block");
								$("#screening").hide();
							}
							$('#hasilModal').modal('show');
							$("#canvasContainer").css("display", "block");
							$('#responseC').text(data.responseC + " Orang");

							var ctxP = document.getElementById("persentaseHasil").getContext('2d');
							var myPieChart = new Chart(ctxP, {
								plugins: [ChartDataLabels],
								type: 'pie',
								data: {
									labels: ["Kecanduan", "Tidak kecanduan"],
										datasets: [{
										data: [data.kecanduanC, data.tKecanduanC],
										backgroundColor: ["#F7464A","#46BFBD"],
										hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
									}]
								},
								options: {
									responsive: true,
									legend: {
									position: 'right',
									labels: {
										padding: 20,
										boxWidth: 10
									}
									},
									plugins: {
									datalabels: {
										formatter: (value, ctx) => {
											let sum = 0;
											let dataArr = ctx.chart.data.datasets[0].data;

											dataArr.map(data => {
												sum += data;
											});
											let percentage = (value * 100 / sum).toFixed(2) + " %";
											
											return percentage + " \n " + " [ " +  dataArr[ctx.dataIndex] + " Orang " + " ] " ;
										},
										color: 'white',
										labels: {
										title: {
											font: {
											size: '12'
											}
										}
										}
									}
									}
								}
							});
						}
					}
				});
			});

			
	});
</script>