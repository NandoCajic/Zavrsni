
<!DOCTYPE html>
<html>
<head>
<!-- Head Sadržaj -->
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <script src='main.js'></script>
  <style>
/* Forma u css-u */
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f4f4;
    }

    .container {
    width: 80%;
    max-width: 600px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .my-form {
    display: flex;
    flex-direction: column;
    }

    h2 {
    text-align: center;
    margin-bottom: 20px;
    }

    label {
    margin-bottom: 8px;
    }

    input,
    textarea {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    }

    button {
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    button:hover {
    background-color: #0056b3;
    }

  </style>
</head>
<body>
<!-- Forma -->
    <div class="container">
        <form action="#" method="post" class="my-form">
        <h2>Adimska Ploča</h2>

        <label for="name">Izvođači:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <select placeholder="Grad" class="input-field" name="Grad" id="Grad" required>
            <option value="Split">Split</option>
            <option value="Zagreb">Zagreb</option>
            <option value="Rijeka">Rijeka</option>
            <option value="Dubrovnik">Dubrovnik</option>
            <option value="Osijek">Osijek</option>
            <option value="Pula">Pula</option>
            <option value="Varaždin">Varaždin</option>
            <option value="Karlovac">Karlovac</option>
            <option value="Sibenik">Šibenik</option>
            <option value="Slavonski Brod">Slavonski Brod</option>
            <option value="Zadar">Zadar</option>
            <option value="Makarska">Makarska</option>
        </select>
        <br>
        <select placeholder="Klub" class="input-field" name="Grad" id="Grad" required>
            <option value="Outim">Otium</option>
            <option value="Boogaloo">Boogaloo</option>
            <option value="Depo">Depo</option>
            <option value="KlubKocka">Klub Kocka</option>
            <option value="Crkva">Crkva</option>
            <option value="Ultra">Ultra</option>
            <option value="Dekmantel">Dekmantel</option>
            <option value="Sonus">Sonus</option>
            <option value="Aurora">Aurora</option>
            <option value="Tunel">Tunel</option>
            <option value="Deep">Deep</option>
        </select>
        <br>
        <label for="message">Zanrovi:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <br>
        <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>