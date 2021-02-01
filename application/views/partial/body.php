<div class="main-content p-4">
    <div class="page-width h-100 w-100 position-relative">
    	<?php  
            $content = isset($content) ? $content : '';

            if ($content != '') {
                $this->load->view($content);
            }
        ?>
    </div>
</div>