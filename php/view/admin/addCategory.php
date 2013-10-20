<div class="span9>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
        <div class="text-center"><legend>New Special Customer</legend></div>
        <div class="row">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="name">Name:</label>
                    <div class="controls">
                        <input type="text" name="name" pattern="[A-Za-z ]{6,30}" placeholder="name" required/>
                    </div>
                </div>
                <div class="control-group">		
                    <label class="control-label" for="email">Email:</label>
                    <div class="controls">
                            <input type="email" name="email" id="email" placeholder="something@something.com" required/>
                    </div>
                </div>
                <div class="control-group">	
                    <label class="control-label" for="nation">Nationality:</label>
                    <div class="controls">
                            <input type="text" name="nation" id="nation" max="20" placeholder="Your Country" required/>
                    </div>	
                </div>
                <div class="control-group">		
                    <label class="control-label" for="doc_type">Document Type:</label>
                    <div class="controls">
                    <input type="text" name="doc_type" value="citizenship" required/>
                    </div>
                </div>
            </div>	
    
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="city">City:</label>
                    <div class="controls">	
                            <input type="text" name="city" id="city" max="12" placeholder="Location" required/>
                    </div>	
                </div>
                <div class="control-group">		
                    <label class="control-label" for="contact_no">Contact Number:</label>
                    <div class="controls">
                            <input type="text" name="contact_no" id="contact_no" pattern="[0-9]{8,10}" placeholder="Office, Mobile" required/>
                    </div>	
                </div>
                <div class="control-group">	
                    <label class="control-label" for="sex">Sex:</label>
                    <div class="controls">
                        <select name="sex">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>	
                </div>
                <div class="control-group">			
                    <label class="control-label" for="doc_no">Document Number:</label>
                    <div class="controls">
                        <input type="text" name= "doc_no" id="doc_no" pattern="[0-9]{2,10}" placeholder="It should consist of 10 digits" required/>
                    </div>	
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="hidden" name="position" value="Special Member" />
                        <button type="submit" name="submit" id="submit" class="btn btn-large btn-primary input-large"/>Next</button>
                    </div>	
                </div>
            </div>	
    </div>
</form>
</div>