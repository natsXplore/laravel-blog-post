
<script>
  $(document).ready(function () {
      setTimeout(function () {
          $("#success-alert").alert('close');
      }, 1000);
  });

  function validateFileSize() {
      var input = document.getElementById('image');
      if (input.files.length > 0) {
          var fileSize = input.files[0].size;
          var maxSize = 2 * 1024 * 1024;

          if (fileSize > maxSize) {
              alert('File size exceeds 2MB.');
              input.value = '';
          }
      }
  }
  function validateForm() {
      return true;
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/templatemo-script.js') }}"></script>
  {{-- <script src="{{asset ('assets/libs/jquery/dist/jquery.min.js')}}"></script> --}}
  <script src="{{asset ('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset ('assets/js/app.min.js')}}"></script>
  <script src="{{asset ('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset ('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset ('assets/js/dashboard.js')}}"></script>
  
</body>

</html>