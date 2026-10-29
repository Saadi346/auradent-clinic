/**
 * Aura Dental Atelier - Core UI & Mobile Interactivity Logic
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Island Nav Scroll Effect
  const islandNav = document.getElementById('islandNav');
  if (islandNav) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 25) {
        islandNav.classList.add('scrolled');
      } else {
        islandNav.classList.remove('scrolled');
      }
    });
  }

  // 2. Mobile Drawer Sheet Open & Close
  const drawer = document.getElementById('mobileDrawer');
  const drawerOverlay = document.getElementById('mobileDrawerOverlay');
  const openBtn = document.getElementById('mobileDrawerOpen');
  const closeBtn = document.getElementById('mobileDrawerClose');

  function openDrawer() {
    if (drawer && drawerOverlay) {
      drawer.classList.add('open');
      drawerOverlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeDrawer() {
    if (drawer && drawerOverlay) {
      drawer.classList.remove('open');
      drawerOverlay.classList.remove('open');
      document.body.style.overflow = '';
    }
  }

  if (openBtn) openBtn.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

  // 3. Interactive Smile Concierge Tabs (Home Page)
  const conciergeTabs = document.querySelectorAll('.concierge-tab-btn');
  const conciergePanels = document.querySelectorAll('.concierge-panel');

  conciergeTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const targetGoal = tab.getAttribute('data-goal');

      conciergeTabs.forEach(t => t.classList.remove('active'));
      conciergePanels.forEach(p => p.classList.remove('active'));

      tab.classList.add('active');
      const activePanel = document.querySelector(`.concierge-panel[data-goal="${targetGoal}"]`);
      if (activePanel) {
        activePanel.classList.add('active');
      }
    });
  });

  // 4. Stats Counter Animation
  const statNumbers = document.querySelectorAll('.stat-number');
  if (statNumbers.length > 0 && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const target = parseFloat(el.getAttribute('data-target') || '0');
          const prefix = el.getAttribute('data-prefix') || '';
          const suffix = el.getAttribute('data-suffix') || '';
          const isDecimal = target % 1 !== 0;
          let current = 0;
          const step = target / 35;

          const timer = setInterval(() => {
            current += step;
            if (current >= target) {
              current = target;
              clearInterval(timer);
            }
            el.textContent = prefix + (isDecimal ? current.toFixed(1) : Math.floor(current).toLocaleString()) + suffix;
          }, 30);

          obs.unobserve(el);
        }
      });
    }, { threshold: 0.2 });

    statNumbers.forEach(stat => observer.observe(stat));
  }

  // 5. FAQ Accordions
  const faqItems = document.querySelectorAll('.faq-accordion-item');
  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-question');
    if (trigger) {
      trigger.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        faqItems.forEach(i => i.classList.remove('active'));
        if (!isActive) item.classList.add('active');
      });
    }
  });
});
