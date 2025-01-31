
// for Event registration time countdown.
document.addEventListener("DOMContentLoaded", function() {
    function updateCountdown(element) {
        const endTime = new Date(element.getAttribute("data-end-time")).getTime();
        function calculateTime() {
            const now = new Date().getTime();
            let diff = endTime - now;
            if (diff <= 0) {
                element.innerHTML = "Registration Closed";
                return;
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((diff % (1000 * 60)) / 1000);

            let countdownStr = "";
            if (days > 0) countdownStr += `${days} Days, `;
            countdownStr += `${hours}H ${minutes}M ${seconds}S`;

            element.innerHTML = countdownStr;
        }
        calculateTime();
        setInterval(calculateTime, 1000);
    }

    document.querySelectorAll(".countdown-timer").forEach(updateCountdown);
});

function eventRegistration(code, title) {
    $('#regEventCode').val(code);
    $('#regEventTitle').text(title);
}