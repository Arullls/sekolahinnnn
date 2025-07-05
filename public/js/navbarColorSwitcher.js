document.addEventListener('DOMContentLoaded', () => {
  let currentColor = 'red'; // default

  function updateNavbarColor(color) {
    const navbar = document.getElementById('navbar');
    const title = document.getElementById('navbar-title');
    const roleBadge = document.getElementById('role-badge');
    const userName = document.getElementById('user-name');

    let bgOpacityClass, borderColorClass, shadowColorClass, textColorClass, badgeBgClass;

  switch (color) {
  case 'red':
    bgOpacityClass = 'bg-red-100/70';
    borderColorClass = 'border-red-300';
    shadowColorClass = 'shadow-red-200/50';
    textColorClass = 'text-red-800';
    badgeBgClass = 'bg-red-600';
    break;
  case 'green':
    bgOpacityClass = 'bg-green-100/70';
    borderColorClass = 'border-green-300';
    shadowColorClass = 'shadow-green-200/50';
    textColorClass = 'text-green-800';
    badgeBgClass = 'bg-green-600';
    break;
  case 'blue':
  default:
    bgOpacityClass = 'bg-white';
    borderColorClass = 'border-blue-300';
    shadowColorClass = 'shadow-blue-200/50';
    textColorClass = 'text-blue-800';
    badgeBgClass = 'bg-blue-600';
    break;
}

    navbar.classList.remove(
      'bg-white', 'bg-opacity-70', 'backdrop-blur-sm',
      'border-blue-300', 'border-red-300', 'border-green-300',
      'shadow-blue-200/50', 'shadow-red-200/50', 'shadow-green-200/50',
      'bg-blue-100/70', 'bg-red-100/70', 'bg-green-100/70'
    );
    title.classList.remove('text-blue-800', 'text-red-800', 'text-green-800');
    roleBadge.classList.remove('bg-blue-600', 'bg-red-600', 'bg-green-600');
    userName.classList.remove('text-blue-800', 'text-red-800', 'text-green-800');

    navbar.classList.add(bgOpacityClass, 'bg-white', 'bg-opacity-70', 'backdrop-blur-sm', borderColorClass, shadowColorClass);
    title.classList.add(textColorClass);
    roleBadge.classList.add(badgeBgClass);
    userName.classList.add(textColorClass);

    currentColor = color;
    localStorage.setItem('navbarColor', color);
  }

  const savedColor = localStorage.getItem('navbarColor');
  if (savedColor) {
    updateNavbarColor(savedColor);
  } else {
    updateNavbarColor(currentColor);
  }

  document.querySelectorAll('button[data-color]').forEach(btn => {
    btn.addEventListener('click', () => {
      updateNavbarColor(btn.dataset.color);
    });
  });
});
