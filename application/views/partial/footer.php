        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/blockui/blockui.js"></script>
                <script>
                    function blockUI() {
                        $.blockUI({
                            css: {
                                backgroundColor: 'transparent',
                                border: 'none'
                            },
                            message: '<div class="loader"></div>',
                            baseZ: 1500,
                            overlayCSS: {
                                backgroundColor: '#FFFFFF',
                                opacity: 0.7,
                                cursor: 'wait'
                            }
                        });
                    }

                    function unBlockUI() {
                        $.unblockUI();
                    }

                    function blockModal() {
                        $(".modal").block({
                            css: {
                                backgroundColor: 'transparent',
                                border: 'none'
                            },
                            message: '<div class="loader"></div>',
                            baseZ: 1500,
                            overlayCSS: {
                                backgroundColor: '#FFFFFF',
                                opacity: 0.7,
                                cursor: 'wait'
                            }
                        });
                    }

                    function unBlockModal() {
                        $(".modal").unblock();
                    }

                    function create_notif(type, message) {
                        return `<div class="alert alert-${type}" role="alert">
                                    ${message}
                                </div>`;
                    }
                </script>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <?php  
            $js = isset($js) ? $js : '';

            if ($js != '') {
                $this->load->view($js);
            }
        ?>
    </body>
</html>