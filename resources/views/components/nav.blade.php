<div>
  <nav class="bg-white w-full shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-[50px] ">
      <div>
        {{ $path }}
      </div>
      <a href="/" class="w-32 h-auto sm:w-auto flex items-center">
        <img src="./assets/logo.png" class="mr-3" alt="Flowbite Logo" />
      </a>

      {{-- login --}}
      <div class="flex md:order-2 items-center justify-center">
        <a href="./login" type="button"
          class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
          Login
        </a>
        <button data-collapse-toggle="navbar-cta" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-cta" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>

      
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
        <ul
          class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
          {{-- index --}}
          <li>
            <a href="/" class="block py-2 pl-3 pr-4 rounded md:p-0 md:hover:text-purple-700 HOME-NAV"
              aria-current="page">Home</a>
          </li>

          {{-- books --}}
          <li>
            <a href="./books"
              class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-200 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 BOOK-NAV">Books</a>
          </li>

          {{-- authors --}}
          <li>
            <a href="./author_list"
              class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-200 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 AUTHOR-NAV">Authors</a>
          </li>

          {{-- about us --}}
          <li>
            <a href="./about_us"
              class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-200 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 ABOUT-US-NAV">About
              Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</div>
