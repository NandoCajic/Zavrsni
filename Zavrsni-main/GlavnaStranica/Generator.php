<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DJ Information</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
 
    body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #1c1c1c;
  color: #ffffff;
  width: 70%;
  text-align: center;
  margin: 0 auto; /* Center the body content */
}

.wrapper {
  max-width: 1200px; /* Set your desired maximum width */
  margin: 0 auto; /* Center the content within the wrapper */
}

header {
  background: url('background.jpg') center/cover no-repeat;
  text-align: center;
  padding: 50px;
  color: #fff;
  position: relative;
  overflow: hidden;
}

    header h1 {
      font-size: 3em;
      margin-bottom: 20px;
    }

    header img.profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 5px solid #fff;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }

    main {
      padding: 20px;
      max-width: 800px;
      margin: 0 auto;
    }

    main p {
      font-size: 1.2em;
      line-height: 1.6;
      color: #ccc;
    }

    section.ranking {
      margin-top: 40px;
    }

    section.ranking h2 {
      font-size: 2em;
      color: #fff;
      margin-bottom: 20px;
    }

    .audio-players {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .audio-player {
      flex-basis: 30%;
      background-color: #333;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #111;
      color: #777;
      position: fixed;
      bottom: 0;
      width: 70%;
    }
/* Nešto */
.socket {
  width: 200px;
  height: 200px;
  position: absolute;
  left: 50%;
  margin-left: -100px;
  top: 50%;
  margin-top: -100px;
  z-index: -1;
}

.hex-brick {
  background: #000000;
  width: 30px;
  height: 17px;
  position: absolute;
  top: 5px;
  animation-name: fade00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  -webkit-animation-name: fade00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  z-index: -1;
}

.h2 {
  transform: rotate(60deg);
  -webkit-transform: rotate(60deg);
}

.h3 {
  transform: rotate(-60deg);
  -webkit-transform: rotate(-60deg);
}

.gel {
  height: 30px;
  width: 30px;
  transition: all .3s;
  -webkit-transition: all .3s;
  position: absolute;
  top: 50%;
  left: 50%;
}

.center-gel {
  margin-left: -15px;
  margin-top: -15px;
  animation-name: pulse00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  -webkit-animation-name: pulse00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
}

.c1 {
  margin-left: -47px;
  margin-top: -15px;
}

.c2 {
  margin-left: -31px;
  margin-top: -43px;
}

.c3 {
  margin-left: 1px;
  margin-top: -43px;
}

.c4 {
  margin-left: 17px;
  margin-top: -15px;
}

.c5 {
  margin-left: -31px;
  margin-top: 13px;
}

.c6 {
  margin-left: 1px;
  margin-top: 13px;
}

.c7 {
  margin-left: -63px;
  margin-top: -43px;
}

.c8 {
  margin-left: 33px;
  margin-top: -43px;
}

.c9 {
  margin-left: -15px;
  margin-top: 41px;
}

.c10 {
  margin-left: -63px;
  margin-top: 13px;
}

.c11 {
  margin-left: 33px;
  margin-top: 13px;
}

.c12 {
  margin-left: -15px;
  margin-top: -71px;
}

.c13 {
  margin-left: -47px;
  margin-top: -71px;
}

.c14 {
  margin-left: 17px;
  margin-top: -71px;
}

.c15 {
  margin-left: -47px;
  margin-top: 41px;
}

.c16 {
  margin-left: 17px;
  margin-top: 41px;
}

.c17 {
  margin-left: -79px;
  margin-top: -15px;
}

.c18 {
  margin-left: 49px;
  margin-top: -15px;
}

.c19 {
  margin-left: -63px;
  margin-top: -99px;
}

.c20 {
  margin-left: 33px;
  margin-top: -99px;
}

.c21 {
  margin-left: 1px;
  margin-top: -99px;
}

.c22 {
  margin-left: -31px;
  margin-top: -99px;
}

.c23 {
  margin-left: -63px;
  margin-top: 69px;
}

.c24 {
  margin-left: 33px;
  margin-top: 69px;
}

.c25 {
  margin-left: 1px;
  margin-top: 69px;
}

.c26 {
  margin-left: -31px;
  margin-top: 69px;
}

.c27 {
  margin-left: -79px;
  margin-top: -15px;
}

.c28 {
  margin-left: -95px;
  margin-top: -43px;
}

.c29 {
  margin-left: -95px;
  margin-top: 13px;
}

.c30 {
  margin-left: 49px;
  margin-top: 41px;
}

.c31 {
  margin-left: -79px;
  margin-top: -71px;
}

.c32 {
  margin-left: -111px;
  margin-top: -15px;
}

.c33 {
  margin-left: 65px;
  margin-top: -43px;
}

.c34 {
  margin-left: 65px;
  margin-top: 13px;
}

.c35 {
  margin-left: -79px;
  margin-top: 41px;
}

.c36 {
  margin-left: 49px;
  margin-top: -71px;
}

.c37 {
  margin-left: 81px;
  margin-top: -15px;
}

.r1 {
  animation-name: pulse00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-delay: .2s;
  -webkit-animation-name: pulse00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-delay: .2s;
}

.r2 {
  animation-name: pulse00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-delay: .4s;
  -webkit-animation-name: pulse00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-delay: .4s;
}

.r3 {
  animation-name: pulse00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-delay: .6s;
  -webkit-animation-name: pulse00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-delay: .6s;
}

.r1 > .hex-brick {
  animation-name: fade00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-delay: .2s;
  -webkit-animation-name: fade00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-delay: .2s;
}

.r2 > .hex-brick {
  animation-name: fade00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-delay: .4s;
  -webkit-animation-name: fade00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-delay: .4s;
}

.r3 > .hex-brick {
  animation-name: fade00;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-delay: .6s;
  -webkit-animation-name: fade00;
  -webkit-animation-duration: 2s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-delay: .6s;
}

@keyframes pulse00 {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  50% {
    -webkit-transform: scale(0.01);
    transform: scale(0.01);
  }

  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes fade00 {
  0% {
    background: #252525;
  }

  50% {
    background: #000000;
  }

  100% {
    background: #353535;
  }
}

    


    #djList {
  display: flex;
  flex-wrap: wrap;
}

.djImage {
  width: 100px;
  height: 100px;
  margin: 10px;
  cursor: pointer;
}

  </style>
</head>
<body>
<div class="wrapper">
    <!-- Your existing content -->
 
  <header>
    <img src="profile-picture.jpg" alt="Profile Picture" class="profile-picture">
    <div id="Naslov"></div>
    <div class="socket">
			<div class="gel center-gel">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c1 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c2 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c3 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c4 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c5 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c6 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
			<div class="gel c7 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
			<div class="gel c8 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c9 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c10 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c11 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c12 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c13 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c14 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c15 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c16 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c17 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c18 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c19 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c20 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c21 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c22 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c23 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c24 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c25 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c26 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c28 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c29 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c30 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c31 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c32 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c33 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c34 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c35 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c36 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c37 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
		</div>
	
  
  </header>

  <main>
    <section class="description">
  
    </section>

    <section class="ranking">
      <h2>Ranking</h2>
      <p>Your ranking details and achievements can be displayed here.</p>
    </section>

    <section class="audio-players">
      <!-- Audio Player 1 -->
      <div class="audio-player">
        <h3>Audio Track 1</h3>
        <!-- Embed your audio player code here -->
      </div>

      <!-- Audio Player 2 -->
      <div class="audio-player">
        <h3>Audio Track 2</h3>
        <!-- Embed your audio player code here -->
      </div>

      <!-- Audio Player 3 -->
      <div class="audio-player">
        <h3>Audio Track 3</h3>
        <!-- Embed your audio player code here -->
      </div>
    </section>
  </main>

  <footer>
    <p>© 2024 Your Name. All rights reserved.</p>
  </footer>



<div id="djList">

</div>

<div id="djDetails">

</div>

<script >

  $(document).ready(function () {
    const djListContainer = $("#djList");
    const djDetailsContainer = $("#Naslov");
    const djOpis=$(".description");
    // Get DJ name from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const selectedDj = urlParams.get('dj');

    // Fetch JSON data using jQuery AJAX
    $.ajax({
      url: "JSON-Podatci/DJgallery.json",
      dataType: "json",
      success: function (data) {
        // Find the selected DJ in the data
        const dj = data.djs.find(item => item.name.toLowerCase() === selectedDj);

        // Display DJ details if found
        if (dj) {
          showDjDetails(dj);
        } else {
          console.error("DJ not found in the JSON data.");
        }
      },
      error: function (error) {
        console.error("Error fetching JSON:", error);
      }
    });

    // Function to display DJ details
    function showDjDetails(dj) {
      // Clear previous details
      djDetailsContainer.empty();

      // Create and append details elements
      const detailsHeading = $("<h2>").text(dj.name1);
      const detailsParagraph = $("<p>").html(`Entered Scene: ${dj.enteredScene}<br>Popularity Ranking: ${dj.popularityRanking}<br>Most Popular Song: ${dj.mostPopularSong}<br>Popularity Since: ${dj.popularitySince}<br><br>${dj.description}`);
      const djname =$("<p>").text(dj.description);
      djOpis.append(dj.description)
      djDetailsContainer.append(detailsHeading);
    }
  });



</script>
</body>
</html>
