function handleSignup() {
    // 입력된 값을 가져옴
    const userid = document.getElementById('userid').value;
    const userpwd = document.getElementById('userpwd').value;
    const userpwd_confirm = document.getElementById('userpwd_confirm').value;
    const username = document.getElementById('username').value;
    const usermail = document.getElementById('usermail').value;

    // 모든 필드가 채워졌는지 확인
    if (!userid || !userpwd || !userpwd_confirm || !username || !usermail) {
        alert('모든 항목을 채워주세요.');
        return false;
    }

    // 비밀번호 확인이 맞는지 확인
    if (userpwd !== userpwd_confirm) {
        alert('비밀번호가 일치하지 않습니다.');
        return false;
    }

    // 모든 조건이 충족되면 login.html로 이동
    alert("Success!")
    window.location.href = 'login.html';
    return false; // 폼이 실제로 제출되지 않도록 막음
}
function handleLogin(){
    alert("Success!");

    window.location.href='main.html';
    
    return false;
}