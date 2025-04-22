'use strict';

// Icon classes
const lightThemeIconClass = 'bi-sun-fill';
const darkThemeIconClass = 'bi-moon-fill';
const autoThemeIconClass = 'bi-circle-half';

// get and set theme in local storage
const getStoredTheme = () => localStorage.getItem('theme');
const setStoredTheme = (theme) => localStorage.setItem('theme', theme);

// get stored theme if it exists, otherwise get system theme
const getPreferredTheme = () => {
  const storedTheme = getStoredTheme();
  if (storedTheme) {
    return storedTheme;
  }

  return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}
const getTheme = () => document.documentElement.getAttribute('data-bs-theme');
const setTheme = (theme) => {
  if (theme === 'auto') {
    document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'));
    setIcon(autoThemeIconClass);
  }
  
  else {
    document.documentElement.setAttribute('data-bs-theme', theme);
    theme === 'dark' ? setIcon(darkThemeIconClass) : setIcon(lightThemeIconClass);
  }
}

const setIcon = (iconClass) => {
  document.getElementById("theme-icon").classList.value = '';
  document.getElementById("theme-icon").classList.add('bi', iconClass);
}

const handleChangeTheme = () => {
  const oldTheme = getTheme();

  if (oldTheme === 'dark') {
    setTheme('light');
    setStoredTheme('light');
  }

  else if (oldTheme === 'light') {
    setTheme('dark');
    setStoredTheme('dark');
  }

  else {
    setTheme('auto');
  }
}

const themeBtn = document.querySelector('#theme-btn');
themeBtn.addEventListener('click', handleChangeTheme);


setTheme(getPreferredTheme());