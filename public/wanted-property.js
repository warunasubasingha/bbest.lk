document.addEventListener('DOMContentLoaded', () => {
  const postBtn = document.getElementById('postWantedBtn');
  if (postBtn) {
    postBtn.addEventListener('click', () => {
      window.location.href = 'post-wanted-property.php';
    });
  }

  document.querySelectorAll('.icon-only[aria-label="Close"]').forEach((btn) => {
    btn.addEventListener('click', () => {
      const card = btn.closest('.response-card');
      if (!card) return;
      card.style.transition = 'opacity .25s ease, transform .25s ease';
      card.style.opacity = '0';
      card.style.transform = 'translateY(10px)';
      setTimeout(() => card.remove(), 250);
    });
  });
});
