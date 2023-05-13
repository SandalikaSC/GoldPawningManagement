<style>
    .border-red{
        border: 3px solid red !important;
    }

    .border-green{
        border: 3px solid green !important;
    }
</style>

<div style="display:none;" class="page-manual-password-enter" id="manual-password-change-form">
    <div class="content-manual-password-enter">
        <form class="entire-password-form" id="password-popup-form">
            <div class="password-form-group">
                <label for="password"><b>Current Password:</b></label>
                <input type="password" placeholder="Enter Current password" name="curr-password" id="curr-password" required>
            </div>
            <div class="password-form-group">
                <label for="password"><b>New password:</b></label>
                <input type="password" placeholder="Enter New password" name="new-password" id="npw" Title="At least 5 characters.One upper case,One lower case,One digit,one symbol among !@#$%&*" required>
            </div>
            <div class="password-form-group">
                <label for="password"><b>Confirm New password:</b></label>
                <input type="password" placeholder="Enter Confirm New password" name="confirm-password" id="confirm-password" required>
            </div>
            <div class="twoButtons">
                <button type="submit" id="password-change-btn" class="ok-btn">OK</button>
                <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    
    let passwordChangedButton=document.getElementById('password-change-btn');
    let password = document.getElementById('npw');
    password.addEventListener("keyup", () => {
        // let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let pattern=/^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%&*])(?=.*[0-9]).{5,}$/;
        if (pattern.test(password.value)) {
            password.classList.remove("border-red");
            password.classList.add("border-green");
            passwordChangedButton.disabled=false;
            
        } else {
            password.classList.remove("border-green");
            password.classList.add("border-red");
            passwordChangedButton.disabled=true;
          
        }
    })
</script>