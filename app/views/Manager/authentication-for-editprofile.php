<div style="display:none;" class="auth-page" id="popup-form">

    <div class="content">

        <form class="auth-whole-form" id="change-form">
            <div class="auth-form-group">
                <label for="password"><b>Enter Password:</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
            </div>
            <div id="otp-input-field" class="auth-form-group" style="display:none;">
                <label for="otp"><b>Enter OTP:</b></label>
                <input type="text" placeholder="Enter OTP" name="otp" id="otp" required>
            </div>
            <small id="message" style="text-align:center;"></small>
            <div class="btns">
                <button type="button" id="otpbtn" class="otpbtn">Send OTP</button>
                <button type="submit" id="okbtn" class="okbtn">OK</button>
                <a><button id="cancel" class="canbtn">Cancel</button></a>
            </div>
        </form>

    </div>
</div>