
        <div style="display:none;" class="page-manual-email-enter" id="manual-set-email-form">
                <div class="content-manual-email-enter">
                
                        <form action="<?php echo URLROOT ?>/mgEditProfile/manualSetEmail" method="POST" class="entire-form" id="email-change-popup">
                           <div class="email-form-group">
                                <label for="email"><b>Enter New Email:</b></label>
                                <input type="text" placeholder="New Email" name="new_email" id="new_email" required />
                            </div>
                            <div class="email-form-group">
                                <label for="email"><b>Confirm New Email:</b></label>
                                <input type="text" placeholder="Confirm New Email" name="confirm_email" id="confirm_email" required />
                            </div>
                            <div class="two-buttons">
                                <button type="submit" id="ok-btn" class="ok-btn">OK</button>
                                <a href="<?php echo URLROOT ?>/mgEditProfile/index"><button type="button" id="cancel-btn" class="cancel-btn">Cancel</button></a>
                            </div>
                        </form>
                   
                </div>
        </div>
  