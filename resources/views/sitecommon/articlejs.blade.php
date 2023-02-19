<script>
    $(document).on('click', '.reply_this', function () {

        var parent = $(this).data('parent');


        $('#parent_change').val(parent);


        $('html, body').animate({
            scrollTop: $("#comment_form").offset().top
        }, 1000);
    });

    $('.visuhide').click(function () {
        $(this).parent().parent().submit();
    });

</script>

<script>
    $(document).ready(function () {
        $('#print').click(function () {

            window.print();
        });
    });
</script>


<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{ route('captcha.reload') }}',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });







</script>