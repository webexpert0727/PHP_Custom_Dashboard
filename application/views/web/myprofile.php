

<div class="content-wrap">
    <div class="row">
        <br /><br />
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                value="<?php echo $data['profile']->name; ?>">
            <?php echo form_error('name'); ?>
          </div>
          <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                value="<?php echo $data['profile']->email; ?>">
            <?php echo form_error('email'); ?>
          </div>
          <div>
            <label for="name">Profile Image:</label>
            <input type="file" id="profile_picture" name="profile_picture" >
          </div>
           <br />
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>



