document.querySelectorAll('.menu li').forEach(item => {
    item.addEventListener('click', () => {
      alert(`${item.textContent.trim()} clicked!`);
    });
  });