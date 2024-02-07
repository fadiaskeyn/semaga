<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
    </head>
    <body>
    <!-- Main navigation container -->
    <nav>
      <div class="w-full mx-auto p-8 flex items-center justify-between">
        <div class="flex items-center">
          <img src="../../../asset/assets/icon/logosmada.png" alt="logosmada" class="w-[84px]">
          <span class="px-3 text-2xl font-semibold w-[200px]">SMA NEGERI 3 JEMBER </span>
        </div>
        <div class="flex w-64 h-20 items-center border-b-4 border-slate-500 rounded-[45px] bg-green-500 shadow-lg transition delay-100 hover:bg-green-700">
          <a href="users/login" class="flex">
            <img src="../../../asset/assets/icon/user.png" alt="userProfil" class="w-14 mx-3 border rounded-full bg-white">
            <button type="submit" class="text-2xl font-semibold text-white px-3">
              Log In
            </button>
          </a>
        </div>
      </div>
      <!--HERO -->
      <div class="h-screen grid grid-cols-12 mx-auto">
        <!-- COL 1 -->
        <div class="col-span-6">
          <div class="p-32 leading-loose">
            <h1 class="text-5xl ">
              selamat datang di <br>
              <span class="text-green-500 font-bold text-7xl">
              SEMAGA
              </span>
              <br>
             <span class="text-4xl font-semibold block">
              Sistem E-learning  SMAN 3 Jember
              </span>
              <br>
            </h1>
            <p class="text-3xl">
              Semaga adalah Sistem <i>E-learning </i>yang berbasis web,
              untuk tenaga pengajar dan siswa dalam pembelajaran.
            </p>
          </div>
          <!-- sosial media-->
          <div class="col-span-1 ">
            <div class="w-[80px] h-38 mt-2 items-center rounded-r-[20px] border-r-4 border-slate-500 bg-green-500">
              <ul class="p-4 mx-auto place-self-center space-y-8">
                <li>
                  <a href="#twitter"><img src="../../../asset/assets/icon/twitter.svg" alt="twitter" class="w-10"></a>
                </li>
                <li>
                  <a href="#facebook"><img src="../../../asset/assets/icon/facebook.svg" alt="facebook" class="w-10"></a>
                </li>
                <li>
                  <a href="#instagram"><img src="../../../asset/assets/icon/instagram.svg" alt="instagram" class="w-10"></a>
                </li>
                <li>
                  <a href="#youtube"><img src="../../../asset/assets/icon/youtube.svg" alt="youtube" class="w-10"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- COL 2 -->
        <div class="col-span-6 absolute top-0 right-0 -z-10">
          <img src="../../../asset/assets/hero/hero.png" alt="hero">
        </div>
    </nav>
    <!-- ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  </body>
</html>
