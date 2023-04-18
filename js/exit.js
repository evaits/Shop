function exit(way) {
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    if(way == undefined){way=''}
    setTimeout(function() {
        window.location.href = way+"register/login.html";
    }, 100);
}