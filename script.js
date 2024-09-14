

document.addEventListener('DOMContentLoaded', function() {
    
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!username || !password) {
                alert('Please fill in both fields');
                event.preventDefault(); 
            }
        });
    }


    navButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            
            const target = this.getAttribute('data-page');
            if (target) {
                navigateTo(target);
            }
        });
    });

    function navigateTo(target) {
        
        window.location.href = target + '.php'; 
    }
    function redirectToHome() {
        window.location.href = 'home.php';
    }
    function navigateTo(page) {
        window.location.href = page + '.php';
    }
    
});
