document.addEventListener('DOMContentLoaded', () => {
    // 회원 데이터 저장소 (단순한 예시)
    const users = [];

    // 로그인 폼 제출 처리
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const username = document.getElementById('loginUsername').value;
        const password = document.getElementById('loginPassword').value;

        const user = users.find(user => user.username === username && user.password === password);

        if (user) {
            alert('로그인 성공');
        } else {
            alert('아이디 또는 비밀번호가 틀렸습니다.');
        }
    });

    // 회원가입 폼 제출 처리
    const signupForm = document.getElementById('signupForm');
    signupForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const username = document.getElementById('signupUsername').value;
        const password = document.getElementById('signupPassword').value;

        if (users.find(user => user.username === username)) {
            alert('이미 존재하는 아이디입니다.');
        } else {
            users.push({ username, password });
            alert('회원가입 성공');
        }
    });
});
