<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="png" href="Logo/Circle_1980x1980.png">
  <title>DevTown-Admin</title>
</head>

<body
  class="flex flex-wrap justify-center items-center h-screen ml-2 mr-2 mb-5 mt-5 bg-gray-300 scroll-smooth md:ml-6 md:mr-6 md:mt-10 md:mb-10 lg:flex-row xl:mr-16 xl:flex-row xl:ml-16 xl:mb-1 xl:mt-1">
  <div class="">
    <div class="container rounded-lg lg:flex drop-shadow-lg">
      <div
        class="left-side bg-gradient-to-tl from-[#759DEA] to-[#30559E] rounded-t-lg md:rounded-tl-xl md:rounded-tr-xl lg:w-fit lg:rounded-tr-none lg:rounded-bl-xl lg:pt-12 xl:pt-8 xl:pb-8 2xl:pl-6 2xl:pr-6">
        <img src="Logo/main_logo_part.png" alt="" class="pt-10 pr-10 pl-10 flex justify-center md:w-[450px] md:m-auto lg:w-[800px] xl:w-[900px] xl:pr-20 xl:pl-20
         2xl:w-[500px]" />
        <p class="flex justify-center  m-auto text-[60px] text-[#17294F] sm:text-[90px] lg:text-[70px]">
          DevTown
        </p>
      </div>
      <div class="right bg-white p-5 rounded-b-xl sm:p-8 md:p-10 lg:rounded-bl-none lg:rounded-tr-xl xl:p-16 2xl:p-12">
        <h1 class="text-3xl font-semibold sm:text-6xl lg:text-4xl xl:text-3xl">Signup</h1>
        <p class="text-gray-700 text-md sm:text-3xl sm:mt-5 lg:text-[24px] lg:mt-2 xl:text-xl 2xl:mt-0">Sign up for Pages</p>
        <form action="index.html">
          <div class="input text-lg flex flex-col relative sm:mt-4 lg:mt-4 xl:mt-3 2xl:mt-0">
            <input type="text" name="fullname"
              class="email border border-gray-500 py-2 px-4 rounded-md focus:outline-[#30559E] mt-6 peer sm:h-20 sm:text-3xl lg:h-14 lg:text-2xl xl:h-14 xl:text-xl 2xl:w-[450px] 2xl:h-12 2xl:text-lg"
              placeholder="Enter Your Fullname..." />
            <span
              class="absolute text-md pl-1 pr-1 mx-2 top-2 bg-white peer-focus:text-[#30559E] text-gray-500 sm:text-3xl sm:-top-0 lg:text-2xl lg:top-1 xl:text-2xl xl:top-1 2xl:text-xl">Fullname</span>
          </div>
          <div class="input text-lg flex flex-col relative sm:mt-4 lg:mt-4 xl:mt-3 2xl:mt-2">
            <input type="email" name="email"
              class="border border-gray-500 py-2 px-4 rounded-md focus:outline-[#30559E] mt-6 peer sm:h-20 sm:text-3xl lg:h-14 lg:text-2xl xl:h-14 xl:text-xl 2xl:w-[450px] 2xl:h-12 2xl:text-lg"
              placeholder="Enter Your Email..." />
            <span class="absolute text-md mx-2 pl-1 pr-1 top-2 bg-white peer-focus:text-[#30559E] text-gray-500 sm:text-3xl sm:-top-0 lg:text-2xl
              lg:top-1 xl:text-2xl xl:top-1 2xl:text-xl">Email</span>
          </div>
          <div class="input text-lg flex flex-col relative sm:mt-4 lg:mt-4 xl:mt-3 2xl:mt-2">
              <input type="number" name="mobile"
                class="border border-gray-500 py-2 px-4 rounded-md focus:outline-[#30559E] mt-6 peer sm:h-20 sm:text-3xl lg:h-14 lg:text-2xl xl:h-14 xl:text-xl 2xl:w-[450px] 2xl:h-12 2xl:text-lg"
                placeholder="Enter Your Mobile No..." />
              <span class="absolute text-md mx-2 pl-1 pr-1 top-2 bg-white peer-focus:text-[#30559E] text-gray-500 sm:text-3xl sm:-top-0 lg:text-2xl
                lg:top-1 xl:text-2xl xl:top-1 2xl:text-xl">Mobile No</span>
            </div>
            <div class="input text-lg flex flex-col relative sm:mt-4 lg:mt-4 xl:mt-3 2xl:mt-2">
              <input type="password" name="password"
                class="border border-gray-500 py-2 px-4 rounded-md focus:outline-[#30559E] mt-6 peer sm:h-20 sm:text-3xl lg:h-14 lg:text-2xl xl:h-14 xl:text-xl 2xl:w-[450px] 2xl:h-12 2xl:text-lg"
                placeholder="Enter Your Password..." />
              <span class="absolute text-md mx-2 pl-1 pr-1 top-2 bg-white peer-focus:text-[#30559E] text-gray-500 sm:text-3xl sm:-top-0 lg:text-2xl
                lg:top-1 xl:text-2xl xl:top-1 2xl:text-xl">Password</span>
            </div>
          <div class="flex justify-center">
            <button
              class="bg-[#30559E] w-full mt-4 text-white border border-2 border-[#30559E] rounded-sm p-2 text-lg hover:bg-white hover:text-[#30559E] sm:h-20 sm:text-4xl sm:mt-6 lg:h-14 lg:text-2xl lg:rounded-lg lg:mt-6 xl:h-16 xl:text-2xl 2xl:w-[450px] 2xl:text-xl 2xl:h-12 2xl:mt-4"
              type="submit">
              Register
            </button>
          </div>
        </form>
        <img src="Logo/OR_new.png" alt="" class="w-full mt-4 sm:mt-6 lg:mt-6 2xl:w-[450px] 2xl:mt-5" />
        <div class="flex justify-between mt-4 sm:mt-8 lg:mt-8 2xl:mt-7">
          <a href="https://www.facebook.com/"><img src="Logo/facebook.png" alt=""
              class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
          <a href="https://www.google.com/"><img src="Logo/google.png" alt=""
              class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
          <a href="https://www.twitter.com/"><img src="Logo/twitter.png" alt=""
              class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
          <a href="https://www.linkedin.com/"><img src="Logo/linkedin.png" alt=""
              class="w-[50px] sm:w-[80px] lg:w-[70px] xl:w-[60px] 2xl:w-[50px]" /></a>
        </div>
        <div class="text-md mt-4 flex justify-center sm:text-3xl sm:mt-6 lg:mt-8 lg:text-2xl xl:text-2xl 2xl:text-xl 2xl:mt-8">
          <p>You have already an account? <a href="index.html" class="text-blue-700">Sign in Account</a></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>