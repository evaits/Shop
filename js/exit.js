function exit() {
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    setTimeout(function() {
        window.location.href = "register/login.html";
    }, 100);
}