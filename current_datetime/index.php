<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <h1 class="text-center text-danger fw-bold mt-5" id="clock">
</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function updateClock() {
            var now = new Date();

            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            var day = now.getDate();
            var month = now.getMonth() + 1; // JavaScript'te aylar 0-11 arasında indekslenir, bu yüzden +1 ekliyoruz.
            var year = now.getFullYear();

            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            month = month < 10 ? '0' + month : month;
            day = day < 10 ? '0' + day : day;

            var timeString = hours + ':' + minutes + ':' + seconds;
            var dateString = day + '/' + month + '/' + year;

            var fullDateTimeString = "Date And Time: "+dateString +" "+ timeString;

            // Zaman ve tarih bilgisini HTML içindeki h1 etiketinin zaman özelliğine ata
            document.getElementById('clock').innerText = fullDateTimeString;

            setTimeout(updateClock, 1000); // Her saniye güncelle
        }

        window.onload = function () {
            updateClock();
        };
    </script>
  </body>
</html>
