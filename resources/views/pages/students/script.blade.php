<!-- Jasny -->
<script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            radioClass: 'iradio_square-green',
        });
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $('#nisn').bind('keypress', function(e){
            var keyCode = e.which ? e.which : e.keyCode;
            if (!(keyCode >= 48 && keyCode <= 57)) {
                return false;
            }else {
                return true;
            }
        });
        $('#start_year').bind('keypress',function(e){
            var keyCode = e.which ? e.which : e.keyCode;
            if (!(keyCode >= 48 && keyCode <= 57)) {
                return false;
            }else {
                return true;
            }
        });
        $('#nisn').blur(function(){
            var nisn     = $('#nisn').val();
            if (nisn == "") {
                $('#labelNisn').addClass('text-danger').text('NISN *');
                $('#nisn').addClass('border border-danger');
                $('#noticeNisn').addClass('text-danger').text('NISN tidak boleh kosong');
                document.getElementById('tombol').disabled = true;
            }else {
                $('#labelNisn').removeClass('text-danger').text('NISN');
                $('#nisn').removeClass('border border-danger');
                $('#noticeNisn').removeClass('text-danger').text('');
                document.getElementById('tombol').disabled = false;
            }
        });
        $('#name').blur(function(){
            var name     = $('#name').val();
            if (name == "") {
                $('#labelName').addClass('text-danger').text('Nama *');
                $('#name').addClass('border border-danger');
                $('#noticeName').addClass('text-danger').text('Nama tidak boleh kosong');
                document.getElementById('tombol').disabled = true;
            }else if (name.length < 4 || name.length > 100) {
                $('#labelName').addClass('text-danger').text('Nama *');
                $('#name').addClass('border border-danger');
                $('#noticeName').addClass('text-danger').text('Nama minimal 4 dan maksimal 100 karakter');
                document.getElementById('tombol').disabled = true;
            }else {
                $('#labelName').removeClass('text-danger').text('Nama');
                $('#name').removeClass('border border-danger');
                $('#noticeName').removeClass('text-danger').text('');
                document.getElementById('tombol').disabled = false;
            }
        })
        $("#start_year").blur(function(){
            var start_year = $("#start_year").val();
            if (start_year == "") {
                $("#labelSYear").addClass('text-danger').text('Tahun Masuk *');
                $('#start_year').addClass('border border-danger');
                $('#noticeSYear').addClass('text-danger').text('Tahun Masuk tidak boleh kosong');
                document.getElementById('tombol').disabled = true;
            }else{
                $("#labelSYear").removeClass('text-danger').text('Tahun Masuk');
                $('#start_year').removeClass('border border-danger');
                $('#noticeSYear').removeClass('text-danger').text('');
                document.getElementById('tombol').disabled = false;
            }
        })
        $("#email").blur(function(){
          var email   = $("#email").val();
          if (email == "") {
              var pesan   = "Email tidak boleh kosong";
              $("#labelEmail").addClass('text-danger').text('Email');
              $("#email").addClass('border border-danger');
              $("#noticeEmail").addClass('text-danger').text(pesan);
              document.getElementById("tombol").disabled = true;
          }
          else if (email.search('@')>=0) {
            var pesan2   = "Email Terverifikasi";
            $("#labelEmail").remmoveClass('text-danger').text('Email');
            $("#email").remmoveClass('border border-danger');
            $("#noticeEmail").text(pesan2);
            document.getElementById("tombol").disabled = true;
          }else {
            var pesan3   = "Email harus sesuai standar";
            $("#labelEmail").addClass('text-danger').text('Email *');
            $("#email").addClass('border border-danger');
            $("#noticeEmail").text(pesan3);
            document.getElementById("tombol").disabled = false;
          }
        })
        $("#password").blur(function(){
          var passNew   = $("#password").val();
          var noticeCPassword  = $("#confirmation_password").val();
          if (passNew == "" && noticeCPassword == "") {
              $(".text-muted").remove();
              $("#noticePassword").addClass('text-danger').text("Password tidak boleh kosong");
              $("#labelPassword").addClass('text-danger').text('Password *');
              $("#password").addClass('border border-danger');
              document.getElementById("tombol").disabled = true;
          }else if (passNew.length < 8) {
            $(".text-muted").remove();
            $("#labelPassword").addClass('text-danger').text('Password *');
            $("#password").addClass('border border-danger');
            $("#noticePassword").addClass('text-danger').text("Password kurang 8 Karakter");
            document.getElementById("tombol").disabled = true;
          }else {
            $(".text-muted").remove();
            $("#labelPassword").removeClass('text-danger').text('Password');
            $("#password").removeClass('border border-danger');
            $("#noticePassword").removeClass('text-danger').text("");
            document.getElementById("tombol").disabled = false;
          }
        })
        $("#confirmation_password").blur(function(){
          var passNew     = $("#password").val();
          var noticeCPassword  = $("#confirmation_password").val();
          if (passNew == "" && noticeCPassword == "") {
              $("#noticeCPassword").addClass('text-danger').text('Password tidak boleh kosong');
              $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
              $("#confirmation_password").addClass('border border-danger');
              $(".text-muted").text("Password minimal 8 karakter");
              document.getElementById("tombol").disabled = true;
          }else if (noticeCPassword !== passNew) {
            $(".text-muted").remove();
            $("#password").addClass('border border-danger');
            $("#labelPassword").addClass('text-danger').text('Password *');
            $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
            $("#confirmation_password").addClass('border border-danger');
            $("#noticeCPassword").addClass('text-danger').text("Password tidak sama");
            document.getElementById("tombol").disabled = true;
          }else if (noticeCPassword.length < 8) {
            $(".text-muted").remove();
            $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
            $("#confirmation_password").addClass('border border-danger');
            $("#noticeCPassword").addClass('text-danger').text("Lengkapi Password anda");
            document.getElementById("tombol").disabled = true;
          }else {
            $(".text-muted").remove();
            $("#labelCPassword").removeClass('text-danger').text('Konfirmasi Password');
            $("#confirmation_password").removeClass('border border-danger');
            $("#noticeCPassword").removeClass('text-danger').text("Password benar");
            document.getElementById("tombol").disabled = false;
          }
        })
        $("#classroom_id").blur(function(){
            var selek = $("#classroom_id option:selected").val();
            if (selek == "") {
                $("#labelClassroom").addClass('text-danger').text('Kelas *');
                $("#classroom_id").addClass('border border-danger');
                document.getElementById("tombol").disabled = true;
            }else {
                $("#labelClassroom").removeClass('text-danger').text('Kelas');
                $("#classroom_id").removeClass('border border-danger');
                document.getElementById("tombol").disabled = false;
            }
        })
        $("#year").blur(function(){
            var selek = $("#year option:selected").val();
            if (selek == "") {
                $("#labelYear").addClass('text-danger').text('Tahun Ajaran *');
                $("#year").addClass('border border-danger');
                document.getElementById("tombol").disabled = true;
            }else {
                $("#labelYear").removeClass('text-danger').text('Tahun Ajaran');
                $("#year").removeClass('border border-danger');
                document.getElementById("tombol").disabled = false;
            }
        })
   });
</script>
