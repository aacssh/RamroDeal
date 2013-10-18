<div id="content">
    <div id="contact">
        <h3>New Deal</h3><hr />

        <?php
            $this->load->helper("form");
            
            //echo $message;
            echo validation_errors();
            
            echo form_open_multipart("site/addDeal");

            $data = array(
                          "type" => "hidden",
                          "name" => "Maxsize",
                          "value" => "20485760"
                          );
            echo form_input($data);
            
            echo form_label("Name: ", "name");
            $data = array(
                          "name" => "name",
                          "id" => "name",
                          "value" => set_value("fullName"),
                          "placeholder" => "Deal Name",
                          "required" => '',
                          "title" =>"Deal name may contain space and string"
                          );
            echo form_input($data);
            
            echo form_label("Original Price: ", "org_price");
            $data = array(
                          "name" => "o_price",
                          "id" => "o_price",
                          "value" => set_value("o_price"),
                          "required" => '',
                          "pattern" => '[0-9]{2,9}',
                          "title" =>"Numbers only"
                          );
            echo form_input($data);
            
            echo form_label("Offered Price: ", "offered_price");
            $data = array(
                          "name" => "o_price",
                          "id" => "o_price",
                          "value" => set_value("offered_price"),
                          "required" => '',
                          "pattern" => '[0-9]{2,9}',
                          "title" =>"Numbers only"
                          );
            echo form_input($data);
            
            echo form_label("Min. no. of people: ", "min_people");
            $data = array(
                          "type" => "number",
                          "name" => "min_people",
                          "id" => "min_people",
                          "value" => set_value("min_people"),
                          "required" => '',
                          "pattern" => '[0-9]{2,9}',
                          "title" =>"Numbers only"
                          );
            echo form_input($data);
            
            echo form_label("Max. no. of people: ", "max_people");
            $data = array(
                          "type" => "number",
                          "name" => "max_people",
                          "id" => "max_people",
                          "value" => set_value("max_people"),
                          "required" => '',
                          "pattern" => '[0-9]{2,9}',
                          "title" =>"Numbers only"
                          );
            echo form_input($data);

            echo form_label("Start Date: ", "s_date");
            $data = array(
                          "type" => "date",
                          "name" => "s_date",
                          "id" => "s_date",
                          "value" => set_value("s_date"),
                          "required" => ''
                          );
            echo form_input($data);
            
            echo form_label("End Date: ", "e_date");
            $data = array(
                          "type" => "date",
                          "name" => "e_date",
                          "id" => "e_date",
                          "value" => set_value("e_date"),
                          "required" => ''
                          );
            echo form_input($data);
            
            echo form_label("Coupon valid from: ", "coupon_valid_from");
            $data = array(
                          "type" => "date",
                          "name" => "coupon_valid_from",
                          "id" => "coupon_valid_from",
                          "value" => set_value("coupon_valid_from"),
                          "required" => ''
                          );
            echo form_input($data);
            
            echo form_label("Coupon valid till: ", "coupon_valid_till");
            $data = array(
                          "type" => "date",
                          "name" => "coupon_valid_till",
                          "id" => "coupon_valid_till",
                          "value" => set_value("coupon_valid_till"),
                          "required" => ''
                          );
            echo form_input($data);

            echo form_label("Cover image: ", "cover_image");
            $data = array(
                          "type" => "file",
                          "name" => "cover_image",
                          "id" => "cover_image",
                          "value" => set_value("cover_image"),
                          "required" => ''
                          );
            echo form_input($data);
            
            echo form_label("Secondary image 1: ", "image1");
            $data = array(
                          "type" => "file",
                          "name" => "image1",
                          "id" => "image1",
                          "value" => set_value("image1"),
                          "required" => ''
                          );
            echo form_input($data);
            
            echo form_label("Secondary image 2: ", "image2");
            $data = array(
                          "type" => "file",
                          "name" => "image2",
                          "id" => "image2",
                          "value" => set_value("image2"),
                          "required" => ''
                          );
            echo form_input($data);
            
            $data = array ("class" => "btn btn-info");
            
            echo form_submit($data, "Submit", "Send");
            
            echo form_close();
        ?>
    </div>
</div>