<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('web/layout/head'); ?>
    <body>
        <?php $this->load->view('web/layout/header'); ?>
        <?php 
            if(isset($subview) && is_array($subview)) {
                foreach ($subview as $key => $value) {
                    $this->load->view($value); 
                }
            }
        ?>

        <?php $this->load->view('web/layout/footer'); ?>
    </body>
</html>