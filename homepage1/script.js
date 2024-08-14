document.addEventListener('DOMContentLoaded', () => {
    // 로그인 폼 제출 시 유효성 검사
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;

            if (!username || !password) {
                e.preventDefault();
                alert('모든 필드를 채워주세요.');
            }
        });
    }

    // 회원가입 폼 제출 시 유효성 검사
    const signupForm = document.getElementById('signupForm');
    if (signupForm) {
        signupForm.addEventListener('submit', (e) => {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!username || !password) {
                e.preventDefault();
                alert('모든 필드를 채워주세요.');
            }
        });
    }
});
