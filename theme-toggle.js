document.addEventListener("DOMContentLoaded", function () {
  // Theme toggle buttons
  const lightModeBtn = document.getElementById("toggle-light");
  const darkModeBtn = document.getElementById("toggle-dark");

  // Load preferred theme from localStorage
  const theme = localStorage.getItem("theme");

  // Function to apply the theme
  function applyTheme(theme) {
    const head = document.querySelector("head");

    // Remove both light and dark mode stylesheets
    const existingLight = document.getElementById("light-mode-css");
    const existingDark = document.getElementById("dark-mode-css");

    if (existingLight) {
      head.removeChild(existingLight);
    }
    if (existingDark) {
      head.removeChild(existingDark);
    }

    // Add the appropriate theme's stylesheet
    if (theme === "light") {
      const lightLink = document.createElement("link");
      lightLink.id = "light-mode-css";
      lightLink.rel = "stylesheet";
      lightLink.href = "style.css";  // Path to your light mode CSS
      head.appendChild(lightLink);
    } else if (theme === "dark") {
      const darkLink = document.createElement("link");
      darkLink.id = "dark-mode-css";
      darkLink.rel = "stylesheet";
      darkLink.href = "dark-mode.css";  // Path to your dark mode CSS
      head.appendChild(darkLink);
    }
  }

  // Apply theme on page load
  if (theme) {
    applyTheme(theme);
  }

  // Function to save theme preference to localStorage and send to the server
  function saveThemePreference(theme) {
    // Save to localStorage
    localStorage.setItem("theme", theme);

    // Use AJAX to send to the server (store in DB)
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "save_theme_preference.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Theme preference saved:", xhr.responseText);
        } else {
          console.error("Error saving theme preference:", xhr.status, xhr.statusText);
        }
      }
    };
    xhr.send("theme=" + encodeURIComponent(theme));
  }

  // Light mode event
  lightModeBtn.addEventListener("click", function () {
    applyTheme("light");
    saveThemePreference("N"); // Save to database as 'light'
  });

  // Dark mode event
  darkModeBtn.addEventListener("click", function () {
    applyTheme("dark");
    saveThemePreference("Y"); // Save to database as 'dark'
  });
});
