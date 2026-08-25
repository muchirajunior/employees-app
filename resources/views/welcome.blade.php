<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZenithHR · Employee Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
    /* dark mode overrides via tailwind dark: classes are used, but we also add some custom bg/backdrop */
    .gradient-bg {
      background: radial-gradient(ellipse at 50% 0%, #f0f9ff 0%, #ffffff 70%);
    }
    .dark .gradient-bg {
      background: radial-gradient(ellipse at 50% 0%, #1e293b 0%, #0f172a 80%);
    }
    .card-hover {
      transition: all 0.2s ease;
    }
    .card-hover:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 30px -12px rgba(0,0,0,0.12);
    }
    .dark .card-hover:hover {
      box-shadow: 0 20px 30px -12px rgba(0,0,0,0.6);
    }
    .btn-primary {
      background: #1e293b;
      color: white;
      transition: 0.2s;
    }
    .btn-primary:hover {
      background: #0f172a;
      box-shadow: 0 8px 20px -8px rgba(30, 41, 59, 0.4);
    }
    .dark .btn-primary {
      background: #e2e8f0;
      color: #0f172a;
    }
    .dark .btn-primary:hover {
      background: #f1f5f9;
      box-shadow: 0 8px 20px -8px rgba(226, 232, 240, 0.3);
    }
    .btn-outline {
      border: 1px solid #e2e8f0;
      background: white;
      transition: 0.2s;
    }
    .btn-outline:hover {
      border-color: #94a3b8;
      background: #f8fafc;
    }
    .dark .btn-outline {
      border: 1px solid #334155;
      background: #1e293b;
      color: #e2e8f0;
    }
    .dark .btn-outline:hover {
      border-color: #64748b;
      background: #2d3a4f;
    }
    .badge-soft {
      background: #eef2ff;
      color: #4338ca;
      font-weight: 500;
    }
    .dark .badge-soft {
      background: #2d3a5f;
      color: #a5b4fc;
    }
    .footer-link {
      color: #475569;
      transition: 0.15s;
    }
    .footer-link:hover {
      color: #0f172a;
    }
    .dark .footer-link {
      color: #94a3b8;
    }
    .dark .footer-link:hover {
      color: #e2e8f0;
    }
    .glass-card {
      background: rgba(255,255,255,0.7);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.5);
    }
    .dark .glass-card {
      background: rgba(30, 41, 59, 0.6);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(71, 85, 105, 0.5);
    }
    .glass-header {
      background: rgba(255,255,255,0.6);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(226, 232, 240, 0.5);
    }
    .dark .glass-header {
      background: rgba(15, 23, 42, 0.7);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(71, 85, 105, 0.4);
    }
    .dark .card-mockup {
      background: rgba(30, 41, 59, 0.7);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(71, 85, 105, 0.5);
    }
    .card-mockup {
      background: rgba(255,255,255,0.8);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.6);
    }
    .dark .stat-card {
      background: rgba(51, 65, 85, 0.5);
      border-color: rgba(71, 85, 105, 0.5);
    }
    .stat-card {
      background: rgba(241, 245, 249, 0.8);
      border-color: rgba(226, 232, 240, 0.8);
    }
    .dark .feature-card {
      background: rgba(30, 41, 59, 0.6);
      border-color: rgba(71, 85, 105, 0.4);
    }
    .feature-card {
      background: rgba(255,255,255,0.6);
      border-color: rgba(226, 232, 240, 0.5);
    }
    .dark .footer-bg {
      background: rgba(15, 23, 42, 0.6);
      border-top: 1px solid rgba(71, 85, 105, 0.4);
    }
    .footer-bg {
      background: rgba(255,255,255,0.4);
      border-top: 1px solid rgba(226, 232, 240, 0.5);
    }
    /* floating badge dark */
    .dark .floating-badge {
      background: rgba(30, 41, 59, 0.8);
      border-color: rgba(71, 85, 105, 0.6);
      color: #e2e8f0;
    }
    .floating-badge {
      background: rgba(255,255,255,0.9);
      border-color: rgba(226, 232, 240, 0.8);
      color: #1e293b;
    }
    /* toggle switch */
    .theme-toggle {
      cursor: pointer;
      width: 36px;
      height: 36px;
      border-radius: 9999px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(226, 232, 240, 0.5);
      transition: 0.2s;
      border: 1px solid transparent;
    }
    .theme-toggle:hover {
      background: rgba(203, 213, 225, 0.7);
    }
    .dark .theme-toggle {
      background: rgba(51, 65, 85, 0.5);
    }
    .dark .theme-toggle:hover {
      background: rgba(71, 85, 105, 0.7);
    }
  </style>
</head>
<body class="antialiased text-slate-800 dark:text-slate-200 gradient-bg min-h-screen flex flex-col transition-colors duration-300">

  <!-- header / navigation with dark mode toggle -->
  <header class="w-full px-6 py-4 md:px-10 lg:px-16 flex items-center justify-between glass-header">
    <div class="flex items-center gap-2">
      <span class="text-2xl font-semibold tracking-tight text-slate-800 dark:text-white">Employee<span class="text-indigo-600 dark:text-indigo-400 ms-2">Manager</span></span>
    </div>
    <nav class="flex items-center gap-3 md:gap-4">
    
      <!-- Dark mode toggle -->
      <button id="themeToggle" class="theme-toggle" aria-label="Toggle dark mode">
        <svg id="themeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-700 dark:text-slate-200">
          <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
      </button>

      <!-- Filament-style auth buttons -->

    </nav>
  </header>

  <!-- main hero section -->
  <main class="flex-grow flex items-center justify-center px-6 py-12 md:py-20">
    <div class="max-w-6xl w-full mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      
      <!-- left content -->
      <div>
        <div class="inline-flex items-center gap-2 bg-indigo-50/80 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 text-xs font-semibold px-4 py-1.5 rounded-full border border-indigo-100/40 dark:border-indigo-700/30 backdrop-blur-sm mb-5">
          <span class="w-2 h-2 rounded-full bg-indigo-500 dark:bg-indigo-400"></span>
          Employee management redefined
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-slate-800 dark:text-white leading-[1.15]">
          Manage your <br>
          <span class="bg-gradient-to-r from-indigo-600 to-violet-600 dark:from-indigo-400 dark:to-violet-400 bg-clip-text text-transparent">workforce</span> with ease.
        </h1>
        <p class="mt-5 text-lg text-slate-600 dark:text-slate-300 max-w-md leading-relaxed">
          A modern, Filament-powered admin panel to handle employees, roles, permissions, and daily HR tasks — all in one place.
        </p>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="/admin" class="inline-flex items-center gap-2 px-7 py-3.5 btn-primary rounded-xl text-sm font-medium shadow-lg shadow-slate-200/50 dark:shadow-slate-800/50">
            Go to dashboard
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
          <a href="#" class="inline-flex items-center gap-2 px-7 py-3.5 btn-outline rounded-xl text-sm font-medium">
            Watch demo
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
          </a>
        </div>
        <!-- trust / stats -->
        <div class="mt-10 flex items-center gap-6 text-sm text-slate-500 dark:text-slate-400 border-t border-slate-200/70 dark:border-slate-700/60 pt-6">
          <div class="flex items-center gap-1"><span class="text-slate-800 dark:text-white font-semibold">10k+</span> employees</div>
          <div class="flex items-center gap-1"><span class="text-slate-800 dark:text-white font-semibold">98%</span> satisfaction</div>
          <div class="flex items-center gap-1"><span class="text-slate-800 dark:text-white font-semibold">24/7</span> support</div>
        </div>
      </div>

      <!-- right illustration / card mockup -->
      <div class="relative flex justify-center lg:justify-end">
        <div class="w-full max-w-md card-mockup rounded-2xl shadow-2xl shadow-slate-200/60 dark:shadow-slate-800/60 p-6 card-hover">
          <div class="flex items-start justify-between mb-4">
            <div>
              <span class="text-xs font-semibold text-indigo-600 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/40 px-3 py-1 rounded-full">active</span>
              <h3 class="text-lg font-bold text-slate-800 dark:text-white mt-1">Employee overview</h3>
            </div>
            <span class="text-xs text-slate-400 dark:text-slate-500">▼ 12%</span>
          </div>
          <!-- mini stats grid -->
          <div class="grid grid-cols-2 gap-3">
            <div class="stat-card rounded-xl p-3 border">
              <div class="text-xs text-slate-500 dark:text-slate-400">Total</div>
              <div class="text-xl font-bold text-slate-800 dark:text-white">247</div>
            </div>
            <div class="stat-card rounded-xl p-3 border">
              <div class="text-xs text-slate-500 dark:text-slate-400">Active</div>
              <div class="text-xl font-bold text-emerald-600 dark:text-emerald-400">203</div>
            </div>
            <div class="stat-card rounded-xl p-3 border col-span-2">
              <div class="flex justify-between text-xs text-slate-500 dark:text-slate-400"><span>Departments</span><span>5</span></div>
              <div class="flex justify-between text-xs text-slate-500 dark:text-slate-400 mt-1"><span>Roles</span><span>12</span></div>
            </div>
          </div>
          <div class="mt-4 pt-3 border-t border-slate-200/60 dark:border-slate-700/50 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400">
            <span>⚡ last sync: 2 min ago</span>
            <a href="#" class="text-indigo-600 dark:text-indigo-400 font-medium hover:underline">view all</a>
          </div>
          <!-- filament hint -->
          <div class="mt-3 text-[10px] tracking-wider uppercase text-slate-400 dark:text-slate-500 font-semibold flex items-center gap-1">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> Filament admin
          </div>
        </div>
       
        
      </div>
    </div>
  </main>


  <!-- footer -->
  <footer class="footer-bg w-full px-6 py-6 md:px-10 lg:px-16 backdrop-blur-sm">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-500 dark:text-slate-400">
      <div class="flex items-center gap-4">
        <span class="font-semibold text-slate-700 dark:text-slate-200">Employees Manager</span>
        <span>© 2026 · Employee Management</span>
      </div>
      <div class="flex items-center gap-5">
        <a href="#" class="footer-link">Privacy</a>
        <a href="#" class="footer-link">Terms</a>
        <a href="#" class="footer-link">Support</a>
        <span class="inline-flex items-center gap-1.5 text-xs bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 px-2.5 py-1 rounded-full border border-indigo-100/40 dark:border-indigo-700/30">
          <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 dark:bg-indigo-400"></span> Filament v5
        </span>
      </div>
    </div>
  </footer>

  <script>
    (function() {
      const toggle = document.getElementById('themeToggle');
      const icon = document.getElementById('themeIcon');
      
      // Check for saved theme preference or system preference
      if (localStorage.getItem('theme') === 'dark' || 
          (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        icon.innerHTML = `<path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9z" fill="currentColor" stroke="none"/>`;
      } else {
        document.documentElement.classList.remove('dark');
        icon.innerHTML = `<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke="currentColor" fill="none"/>`;
      }

      toggle.addEventListener('click', function() {
        if (document.documentElement.classList.contains('dark')) {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('theme', 'light');
          icon.innerHTML = `<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke="currentColor" fill="none"/>`;
        } else {
          document.documentElement.classList.add('dark');
          localStorage.setItem('theme', 'dark');
          icon.innerHTML = `<path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9z" fill="currentColor" stroke="none"/>`;
        }
      });
    })();
  </script>
</body>
</html>