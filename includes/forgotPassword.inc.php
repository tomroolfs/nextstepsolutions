<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Wachtwoord vergeten</title>
  <style>
    .body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #ffff;
    }

    .wrapper {
      width: 460px;
      background: #d9d9d9;
      color: #ffff;
      border-radius: 10px;
      padding: 30px 40px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .wrapper img {
      max-width: 400px;
      max-height: 100px;
      border-radius: 10px;
      margin-left: 80px;

    }

    .blokje {
      background-color: #AEAEAE;
      margin-top: 10%;
      margin-bottom: 10%;
      padding: 50px;
      border-radius: 15px;
    }

    .text {
      color: black;
      font-size: 20px;
      font-weight: 500;
    }

    .wrapper .btn {
      width: 100%;
      height: 45px;
      background: #EC830B;
      border: none;
      outline: none;
      border-radius: 45px;
      cursor: pointer;
      font-size: 16px;
      color: black;
      font-weight: 500;
    }
  </style>
</head>

<body class="bg-gray-100">
  <div class="wrapper">
    <img src="../images/image.png">
    <div class="blokje">
      <div class="text">
        U lijkt uw wachtwoord te zijn vergeten. Neem contact op met uw systeembeheerder om een nieuw wachtwoord aan te vragen en hulp te krijgen bij het herstellen van uw account.
      </div>
    </div>

    <button
      type="button"
      class="btn"
      onclick="window.location.href='login.inc.php'">
      Terug naar login
    </button>
  </div>


</body>

</html>