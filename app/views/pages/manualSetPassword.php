<div style="display:none;" class="page-manual-password-enter" id="manual-password-change-form">
    <div class="content-manual-password-enter">
        <form class="entire-password-form" id="password-popup-form">
            <div class="password-form-group">
                <label for="password"><b>Current Password:</b></label>
                <input type="password" placeholder="Enter Current password" name="curr-password" id="curr-password" required>
            </div>
            <div class="password-form-group">
                <label for="password"><b>New password:</b></label>
                <input type="password" placeholder="Enter New password" name="new-password" id="npw" Title="At least 8.two upper case,two lower case,two number,two symbols among ~!@#$%&*" required>
            </div>
            <div class="password-form-group">
                <label for="password"><b>Confirm New password:</b></label>
                <input type="password" placeholder="Enter Confirm New password" name="confirm-password" id="confirm-password" required>
            </div>
            <small style="display:none;color:red;" class="error" id="password-warning1">At least 8.two upper case,two lower case</small>
            <small style="display:none;color:red;" class="error" id="password-warning2">two number,two symbols among ~!@#$%&*</small>
            <div class="twoButtons">
                <button type="submit" id="password-change-btn" class="ok-btn">OK</button>
                <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
            </div>
        </form>

    </div>
</div>


