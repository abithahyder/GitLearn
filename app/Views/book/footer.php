</body>
    </html>
    <script>
        function deleteConfirm(id){
            if(confirm("Are you sure you want to delete")){
                window.location.href='<?php echo base_url('books/delete')?>'+"/"+id;
            }
        }

    </script>