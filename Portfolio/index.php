<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!--? Favicon -->
    <link id="favicon" rel="shortcut icon" href="../assets/img/erpg.webp" type="image/x-png" />

    <!--? Font Awesome -->
    <script src="https://kit.fontawesome.com/92333b2848.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar">
      <a href="/" class="logo">
        <img src="../assets/img/erpg.webp" alt="logo" style="width: 40px; height: 40px" />
        <h4>Epic RPG</h4>
      </a>
      <ul>
        <li><a class="active" href="../index.php">Home</a></li>
        <li><a href="../index.php#about">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../index.php#commands" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Commands </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../php/user/user.php">User</a></li>
            <li><a class="dropdown-item" href="../php/profile/profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="../php/inventory/inventory.php">Inventory</a></li>
            <li><a class="dropdown-item" href="../php/bank/bank.php">Bank</a></li>
            <li><a class="dropdown-item" href="../php/professions/professions.php">Professions</a></li>
            <li><a class="dropdown-item" href="../php/quest/quest.php">Quest</a></li>
            <li><a class="dropdown-item" href="../php/horse/horse.php">Horse</a></li>
            <li><a class="dropdown-item" href="../php/achievements/achievements.php">Achievements</a></li>
          </ul>
        </li>
        <li><a href="#">Portfolio</a></li>
        <li>
          <a href="../php/login.php" aria-label="Login" data-balloon-pos="right" id="login-icon"><i class="fa-solid fa-right-to-bracket"></i></a>
        </li>
      </ul>

      <div class="menu-toggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>

    <!-- make simple portfolio with project photos and using grid style-->
    <h1>Portfolio</h1>
    <!-- make 3 section with gap using flexbox row that 1 in left 2 center and 3 right -->

    <section id="profile">
      <div class="right cf">
        <div class="profile">
          <h3>Profile</h3>
          <img src="../assets/img/erpg.webp" alt="profile" />
          <h3>Zundera</h3>
          <span>Software Engineer | HTML | CSS | JS | Bootstrap | Students | PHP | CodeIgniter |</span>
        </div>

        <div class="biodata">
          <h3>Biodata</h3>
          <div class="biodata-list">
            <ul>
              <li>Suken Muchammad Fauzan</li>
              <li>Bekasi, Pondok Gede</li>
              <li>17 y.o</li>
              <li>Muslim</li>
              <li>71 Vocational High School</li>
            </ul>
          </div>
        </div>

        <div class="tech-stack">
          <h3>Technical Stack</h3>
          <div class="tech-list">
            <ul>
              <li>HTML</li>
              <li>CSS</li>
              <li>JS</li>
              <li>Bootstrap</li>
              <li>PHP</li>
              <li>CodeIgniter</li>
            </ul>
          </div>
        </div>

        <div class="social">
          <h3>Social</h3>
          <div class="social-list">
            <!-- make flex 2 -->
            <ul>
              <li><a href="https://www.facebook.com/suken.muchammad.fauzan" target="_blank"><i class="fab fa-facebook"></i><p>KenZundera</p></a>
              </li>
              <li><a href="https://www.instagram.com/ken.fauzan" target="_blank"><i class="fab fa-instagram"></i><p>ken.fauzan</p></a></li>
              <li><a href="https://www.github.com/KenZundera" target="_blank"><i class="fab fa-github"></i><p>KenZundera</p></a></li>
          </div>
        </div> 

        <div class="experience">
          <h3>Experience</h3>
          <div class="experience-list">
            <ul>
              <li>Freelance</li>
              <li>Internship</li>
              <li>Student</li>
            </ul>
          </div>  
        </div>

        <div class="education">
          <h3>Education</h3>
            <div class="education-list">
              <ul>
                <li>June 2020 - Present</li>
                <li>Student</li>
                <li>71 Vocational High School</li>
              </ul>
            </div>
        </div>
      </div>
      
        <div class="left cf">
          <div class="project">
            <h3>My Project</h3>
            <div class="project-item-flex">
              <div class="project-item">
                <img src="../assets/img/Bootstrap.PNG" alt="project" />
                <h4>Portfolio Bootstrap</h4>
                <p>Web Portfolio dengan framework Bootstrap 5.</p>
              </div>
              <div class="project-item">
                <img src="../assets/img/dashboardPage.PNG" alt="project" />
                <h4>Email Blast.</h4>
                <p>Web Aplikasi untuk mengirim email ke banyak orang.</p>
              </div>
            </div>
            <div class="project-item-flex">
              <div class="project-item">
              <img src="../assets/img/Materialize.PNG" alt="project" />
              <h4>Latihan Framework Materialize</h4>
              <p>Web Portfolio dengan framework Materialize.</p>
            </div>
            <div class="project-item">
              <img src="../assets/img/shipping.PNG" alt="project" />
              <h4>Form Shipping.</h4>
              <p>Form dengan grid style.</p>
            </div>
            </div>
            <div class="project-item-flex">
              <div class="project-item">
                <img src="../assets/img/travel.PNG" alt="project" />
                <h4>Form Dengan Tabel</h4>
                <p>Form dengan style table.</p>
              </div>
              <div class="project-item">
                <img src="../assets/img/WebPerpustakaan.PNG" alt="project" />
                <h4>Web Perpustakaan.</h4>
                <p>Web Perpustakaan dengan HTML & CSS Native.</p>
              </div>
            </div>
            <div class="project-item-flex">
              <div class="project-item">
                <img src="../assets/img/WebSekolah.PNG" alt="project" />
                <h4>Web Sekolah 71</h4>
                <p>Web yang dibuat dengan HTML & CSS Native.</p>
              </div>
              <div class="project-item">
                <img src="../assets/img/webyt.PNG" alt="project" />
                <h4>Latihan Web dengan Flex</h4>
                <p>Web Perpustakaan dengan HTML & CSS Native.</p>
              </div>
            </div>
          </div>
        </div>
    </section>


    </style>
  </body>
</html>
