<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function(e){
        $('#chkCheckAll').click(function(){
            $('.checkBoxClass').prop('checked',$(this).prop('checked'));
        })

        $('#deleteAllSelectedRecord').click(function(e){
            e.preventDefault();
            var allids = [];

            $('input:checkbox[name=ids]:checked').each(function(){
                allids.push($(this).val());
            });

            $.ajax({
                url:'{{ route('project.deleteAll') }}',
                type:'DELETE',
                data:{
                    _token:$('input[name=_token]').val(),
                    ids:allids
                },
                success:function(response){
                    $.each('#sid'+val).remove();
                    
                }
                
            })

            alert('Project has been deleted')
            window.location.href = "{{ url('/') }}";

            
        })
    });

    $('#clear').click(function(){
        $('#name').val('');
        $('#dataTable').DataTable().destroy();
    });
</script>
