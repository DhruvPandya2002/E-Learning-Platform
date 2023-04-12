// Icons
const moonIcon = document.querySelector(".moon");
const sunIcon = document.querySelector(".sun");

// // Theme
// const userTheme = localStorage.getItem("theme");
// const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
//  console.log(userTheme);
//  console.log(systemTheme);

// Icon Toggle
const iconToggle = () => {
    moonIcon.classList.toggle("hidden");
    sunIcon.classList.toggle("hidden");
}

// // theme check
// const themeCheck = () => {
//     if (userTheme === "dark" || (!userTheme && systemTheme)) {
//         document.documentElement.classList.add("dark");
//         moonIcon.classList.add("hidden");
//         return;
//     }
//     sunIcon.classList.add("hidden");
// }

// // Manual theme change 
const themeChange = () => {
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
        moonIcon.classList.add("hidden")
        sunIcon.classList.remove("hidden")
      } else {
        document.documentElement.classList.remove('dark')
        sunIcon.classList.add("hidden")
        moonIcon.classList.remove("hidden")
      }
}

// // call theme switch on click
sunIcon.addEventListener("click", () => {
    themeChange();
    localStorage.theme = 'light'
});

moonIcon.addEventListener("click", () => {
    themeChange();
    localStorage.theme = 'dark'
});

// // invoke theme check on initial load
// themeCheck();

// On page load or when changing themes, best to add inline in `head` to avoid FOUC

  
  // Whenever the user explicitly chooses light mode
  
  
  // Whenever the user explicitly chooses dark mode
  
  
  // Whenever the user explicitly chooses to respect the OS preference
  localStorage.removeItem('theme')
  