<html>

<head>
    <link rel="icon" type="png" href="Logo\Circle_1980x1980.png">
    <title>DevTown-Admin</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .swal-modal {
            padding: 30px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: false,
                timer: 1500,
            });
        </script>
    <?php } ?>
    <?php unset($_SESSION['status']); ?>
    <script>
        var value = "<?php echo $_SESSION['value']; ?>";
        $(document).ready(function() {
            $('.del_id').click(function(e) {
                e.preventDefault();
                var deleteid = $(this).closest("tr").find('.delete_id').val();
                swal({
                        title: "Are you sure",
                        icon: "warning",
                        title: "Delete Success",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type: "POST",
                                url: value,
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    swal("Data Deleted Success", {
                                        icon: "success",
                                        button: false,
                                        timer: 1500,
                                    }).then((response) => {
                                        location.reload();
                                    });
                                }
                            });
                        } else {
                            swal("Data is Safe", {
                                icon: "success",
                                button: false,
                                timer: 1500,
                            });
                        }
                    });
            });
        });
    </script>
</body>

</html>