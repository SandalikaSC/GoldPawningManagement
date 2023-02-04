var forget = document.getElementsByClassName('forget')[0];
var forgetPw = document.getElementsByClassName('forget-pw')[0];
var form = document.getElementsByClassName('form')[0];

forget.addEventListener('click', function() {
  forgetPw.style.display = forgetPw.style.display === 'none' ? 'flex' : 'none';
  form.style.display = form.style.display === 'flex' ? 'none' : 'flex';
});
var back = document.getElementsByClassName('back')[0];
var forgetPw = document.getElementsByClassName('forget-pw')[0];
var form = document.getElementsByClassName('form')[0];

back.addEventListener('click', function() {
    form.style.display = form.style.display === 'none' ? 'flex' : 'none';
  forgetPw.style.display = forgetPw.style.display === 'flex' ? 'none' : 'flex';
});