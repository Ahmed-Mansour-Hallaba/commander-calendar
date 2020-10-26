<script>
    $('body').on('click', '.transfer-task-show', function () {
        var task_id=$(this).data("id");
        $('#transfer-div_'+task_id).fadeIn(500)
        $(this).fadeOut(500)
    });
    $('body').on('click', '.finish-task', function () {
        var task_id = $(this).data("id");
        var user_id={{auth()->id()}}
        $.ajax({
            type: "GET",
            url: "{{ url('/finishtask')}}"+'/'+user_id+'/'+task_id,
            success: function (data) {
                $('#tmam_'+task_id).fadeOut(500);
                $('#user_task_'+user_id+'_'+task_id)[0].classList.remove('badge-warning')
                $('#user_task_'+user_id+'_'+task_id)[0].classList.add('badge-success')

                toastr.success( 'تم ارسال تمام المهمة بنجاح');

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '.transfer-task-post', function () {
        var task_id=$(this).data("id");
        $.ajax({
            data:$('#transfer_'+task_id).serialize(),
            type: "POST",
            url: "/transfertask",
            success: function (data) {
                // console.log('success ')
                console.log(data);
                $('#tmam_'+task_id).fadeOut(1);
                $('#users_badges_'+task_id).append('<span id="user_task_'+data[0]['id']+'_'+task_id+'" class="badge badge-pill    badge-warning " data-toggle="tooltip" title="" data-original-title="تحت التنفيذ"> '+data[1]+'/ '+data[0]['name']+'</span>')
                $('#transfer-div_'+task_id).fadeOut(1);
                $('#user_task_{{auth()->id()}}'+'_'+task_id).removeClass('badge-warning')
                $('#user_task_{{auth()->id()}}'+'_'+task_id).removeClass('badge-success')
                $('#user_task_{{auth()->id()}}'+'_'+task_id).addClass(' badge-dark')
                $('#user_task_{{auth()->id()}}'+'_'+task_id).attributes('data-original-title','تم تحويل المهمة')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
</script>
