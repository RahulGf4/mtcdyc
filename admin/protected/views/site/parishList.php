<style type="text/css">
    .sendEmail{
        cursor: pointer;
    }
</style>
<div class="center wow fadeInDown">
    <h2>Registered Parish List</h2>
    <br />
    <form role="form" id="registerForm" name="registerForm" novalidate="novalidate">
        <div class="box-border">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Parish</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Send Email</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                        foreach ($dataReader as $key => $value) { ?>
                             <tr>
                              <th><?= $value['id']; ?></th>
                              <td><?= $value['church_name']; ?></td>
                              <td><?= $value['email']; ?></td>
                              <td><?= $value['pass']; ?></td>
                              <td><a id="<?= $value['email']; ?>" pass="<?= $value['pass']; ?>" class="sendEmail" >Send</a><td>
                            </tr>
                      <?php  }
                     ?>
                           
                          </tbody>
                        </table>
                        </div>
                    </div>
        
               </div>
            <br />
                                                          
                                                            </div>

   <script type="text/javascript">
        $(document).ready(function() {
             $(".sendEmail").on('click', function(){
             // var datastring = $("#registerForm").serialize();
            var data = this.id;
            var pass = $(this).attr('pass');
             $.ajax({
                url: "ParishList",
                method: "POST",
                 data : { email : data, pass : pass },
    
                 success: function(result){
                     $("#msg").html('Details updated successFully');
                        $('#modalSuccess').modal('show');
                }
            });
        });

                   });
             
    </script>
