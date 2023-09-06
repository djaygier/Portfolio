<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio Djay | GLR 2023</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.3/lottie_svg.min.js"></script>

  <script src="js/index.js" defer></script>

  <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
  <main>
    <nav>
      <nav-buttons>
        <a href="https://djay.nl/">
          <nav-button class="blue no-left-padding">
            <span class="material-symbols-outlined"> public </span>Djay.nl</nav-button></a>
      </nav-buttons>
      <nav-buttons>
        <a href="index.html"><nav-button>Home</nav-button></a>
        <a href="projecten.php"><nav-button>Projecten</nav-button></a>
        <a href="contact.php"><nav-button class="no-right-padding">Contact</nav-button></a>
        <a href="about.html"><nav-button>About</nav-button></a>
      </nav-buttons>
    </nav>

    <row class="margin130px spacebetween">
      <text>
        <h1>Contact</h1>
        <form novalidate onsubmit="sendForm();" target="frame" method="POST" action="">
          <error>Invalid input</error>
          <row>
            <column>
              <div class="input-text">Naam</div>
              <div class="input-text">Email</div>
              <div class="input-text">Telefoonnummer</div>
              <div class="input-text">Bedrijfsnaam</div>
              <div class="input-text">Bericht</div>
            </column>
            <column>
              <row>
                <input type="text" oninput="onInput(this)" placeholder="Naam" name="name" id="name" />
                <input type="text" oninput="onInput(this)" placeholder="Achternaam" name="surname" id="surname" />
              </row>
              <input type="email" oninput="onInput(this)" placeholder="Email" name="email" id="email" />
              <input type="text" oninput="onInput(this)" placeholder="Telefoonnummer *Optioneel*" name="telefoonnummer"
                id="telefoonnummer" />
              <input type="text" oninput="onInput(this)" placeholder="Bedrijfsnaam *Optioneel*" name="bedrijfsnaam"
                id="bedrijfsnaam" />
              <textarea placeholder="Bericht" oninput="onInput(this)" name="bericht" id="bericht"></textarea>
              <input type="submit" value="Verstuur" />
            </column>
          </row>
          <div class="checkAnimation"></div>
        </form>

      </text>
      <div class="contactAnimation"></div>
    </row>
  </main>


  <iframe id="none" name="frame"></iframe>
</body>

</html>