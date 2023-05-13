
<style>
    .border-red{
        border: 3px solid red !important;
    }

    .border-green{
        border: 3px solid green !important;
    }
</style>

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


<script>
    
    let emailChangedButton=document.getElementById('ok-btn');
    let email = document.getElementById('new_email');
    email.addEventListener("keyup", () => {

        let pattern=/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
        if (pattern.test(email.value)) {
            email.classList.remove("border-red");
            email.classList.add("border-green");
            emailChangedButton.disabled=false;
            
        } else {
            email.classList.remove("border-green");
            email.classList.add("border-red");
            emailChangedButton.disabled=true;
          
        }
    })
</script>