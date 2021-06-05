function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? +seconds : seconds;

        display.textContent = seconds;

        if (--timer < 0) {
            window.location.replace("home.html");
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveSeconds = 5,
        display = document.querySelector('#time');
    startTimer(fiveSeconds, display);
};