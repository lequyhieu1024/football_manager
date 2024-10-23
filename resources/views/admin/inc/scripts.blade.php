   <!-- build:js assets/vendor/js/core.js -->
   <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
   <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
   <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>
   <script src="{{ asset('admin/js/main.js') }}"></script>
   <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>
   <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

   <script>
       CKEDITOR.replace('editor');
       $(document).ready(function() {
           $('#imageInput').on('change', function() {
               const files = this.files;
               $('#imagePreviewContainer').empty(); // Xóa các ảnh trước đó

               for (let i = 0; i < files.length; i++) {
                   const file = files[i];
                   const reader = new FileReader();

                   reader.onload = function(event) {
                       const img = $('<img>')
                           .attr('src', event.target.result)
                           .css({ width: '100px', maxWidth: '200px', margin: '10px' });

                       $('#imagePreviewContainer').append(img); // Thêm ảnh vào container
                   };

                   reader.readAsDataURL(file);
               }
           });
       });

       $(document).ready(function() {
           $('#imageInput2').on('change', function() {
               const files2 = this.files;
               $('#imagePreviewContainer2').empty(); // Xóa các ảnh trước đó

               for (let i = 0; i < files2.length; i++) {
                   const file2 = files2[i];
                   const reader2 = new FileReader();

                   reader2.onload = function(event) {
                       const img2 = $('<img>')
                           .attr('src', event.target.result)
                           .css({ width: '100px', maxWidth: '200px', margin: '10px' });

                       $('#imagePreviewContainer2').append(img2); // Thêm ảnh vào container
                   };

                   reader2.readAsDataURL(file2);
               }
           });
       });


   </script>
