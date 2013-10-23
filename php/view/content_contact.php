<div id="content">
    <div id="contact">
        <?php
            $this->load->helper("form");
            
            echo $message;
            echo validation_errors();
            
            echo form_open("site/send_email");
            echo form_label("Name: ", "fullName");
            $data = array(
                          "name" => "fullName",
                          "id" => "fullName",
                          "value" => set_value("fullName"),
                          "placeholder" => "Name",
                          "required" => ''
                          );
            echo form_input($data);
            
            echo form_label("From: ", "fromEmail");
            $data = array(
                          "name" => "fromEmail",
                          "id" => "fromEmail",
                          "value" => set_value("fromEmail")
                          );
            echo form_input($data);
            
            echo form_label("To: ", "toEmail");
            $data = array(
                          "name" => "toEmail",
                          "id" => "toEmail",
                          "value" => set_value("toEmail")
                          );
            echo form_input($data);
            
            echo form_label("Message: ", "msg");
            $data = array(
                          "name" => "msg",
                          "id" => "msg",
                          "value" => set_value("msg")
                          );
            echo form_textarea($data);
            
            echo form_submit("contactSubmit", "Send");
            
            echo form_close();
        ?>
    </div>
</div>