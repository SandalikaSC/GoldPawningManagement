
    let profileImg=document.getElementById('profileImg');
    let changeBtn=document.getElementById('change-btn');

    profileImg.addEventListener('mouseover',()=>{
        profileImg.classList.add('profile-hidden');
        changeBtn.classList.remove('hidden');
    })

    profileImg.addEventListener('mouseout',()=>{
        profileImg.classList.remove('profile-hidden');
        changeBtn.classList.add('hidden');
    })