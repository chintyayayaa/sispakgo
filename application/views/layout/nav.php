<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #373737;">
	<a class="navbar-brand" href="<?php echo base_url() ?>">Sistem Pakar Kecanduan Game Online</a>
</nav>

<!-- Modal: Login / Register Form -->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Register</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

            <!--Body-->
            <form id="loginForm" action="<?php echo site_url("Halaman/login") ?>">
            <div class="modal-body mb-1">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" name="username" id="modalLRInput10" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="modalLRInput10">Your Username</label>
              </div>

              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" name="password" id="modalLRInput11" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
              </div>
              <div class="text-center mt-2">
                <button class="btn btn-info">Log in <i class="fas fa-sign-in ml-1"></i></button>
              </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
              <div class="options text-center text-md-right mt-1">
                <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                <p>Forgot <a href="#" class="blue-text">Password?</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
          </form>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">

            <!--Body-->
            <form id="regForm" action="<?php echo site_url("Halaman/daftar") ?>">
            <div class="modal-body">
              <div class="md-form form-sm mb-5">
                <i class="far fa-address-card prefix"></i>
                <input type="text" id="namaRegister" name="nama" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="namaRegister">Nama</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="usernameRegister" name="username" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="usernameRegister">UserName</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix"></i>
                <input type="email" id="modalLRInput12" name="email" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
              </div>

              <div class="md-form form-sm mb-4">
                <i class="fas fa-calendar-alt prefix"></i>
                <input type="date" id="tanggalLahir" name="tanggallahir" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="tanggalLahir">Tanggal Lahir</label>
              </div>

              <div class="md-form form-sm mb-4">
                <i class="fas fa-map-marker-alt prefix"></i>
                <input type="text" id="tempatLahir" name="tempatlahir" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="tempatLahir">Tempat Lahir</label>
              </div>

              <div class="md-form form-sm mb-4">
                    <select class="mdb-select md-form" name="jeniskelamin">
                      <option value="" disabled selected>Choose your option</option>
                      <option value="0">Laki-laki</option>
                      <option value="1">Perempuan</option>
                    </select>
                  <label class="mdb-main-label"> Jenis Kelamin </label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="modalLRInput13" name="password" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
              </div>

              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix"></i>
                <input type="password" id="modalLRInput14" name="repass" class="form-control form-control-sm validate">
                <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
              </div>

              <div class="text-center form-sm mt-2">
                <button class="btn btn-info">Sign up <i class="fas fa-sign-in ml-1"></i></button>
              </div>

            </div>
            <!--Footer-->
            <div class="modal-footer">
              <div class="options text-right">
                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Panel 8-->
          </form>
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-->

<script>
  //submit login
  $('#loginForm').submit(function(e) {
         e.preventDefault();

         $.ajax({
             type: 'post',
             url: $(this).attr("action"),
             data: $(this).find('input').serialize(),
             dataType: 'json',
             success: function(data) {
                 console.log(data);
                 if(data.status == "fail"){
                     toastr["error"](data.msg);
                 }
             }
         });
     });

     //submit register
     $('#regForm').submit(function(e) {
         e.preventDefault();

         $.ajax({
             type: 'post',
             url: $(this).attr("action"),
             data: $(this).find('input, select').serialize(),
             dataType: 'json',
             success: function(data) {
                 console.log(data);
                 if(data.status == "fail"){
                     toastr["error"](data.msg);
                 }else{
                   
                  toastr["success"](data.msg);

                 }
             }
         });
     });
</script>
