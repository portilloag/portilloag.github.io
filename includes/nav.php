
<nav class="nav-bar relative z-10 bg-white/90 backdrop-blur-md border border-slate-200 px-4 py-3 flex flex-wrap items-center justify-between transition-all">
    
    <h1 class="sr-only">Da Vinci x dia</h1>
   
    <a href="index.php?p=inicio" class="flex items-center gap-2 hover:opacity-90 transition-opacity">
        <img src="imagenes/logo-davinci-alquiler.webp" alt="Logo Davinci Alquiler" class="h-8 w-auto object-contain">
    </a>

    <!-- btn hamburgyesa-->
    <button id="menu-btn" class="md:hidden p-2 text-slate-600 hover:text-slate-900 focus:outline-none">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" w-6 h-6lucide lucide-menu preview-icon"><path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/></svg>
    </button>


    <ul id="menu" class="hidden w-full md:flex md:w-auto items-center gap-2 md:gap-3 font-medium  md:text-[16px] text-sm mt-0 md:mt-0 flex-col md:flex-row">
        <li class="w-full md:w-auto mt-3 text-center">
            <a href="index.php?p=inicio" class=" px-4 py-2  transition-all <?= ($seccion === 'inicio') ? 'text-pink-600 font-bold' : 'text-slate-600 hover:bg-slate-100' ?>">Inicio</a>
        </li>
        <li class="w-full md:w-auto  mt-3 text-center">
            <a href="index.php?p=productos" class=" px-4 py-2 transition-all <?= ($seccion === 'productos') ? ' text-indigo-600 font-bold' : 'text-slate-600 hover:bg-slate-100' ?>">Productos</a>
        </li>
        <li class="w-full md:w-auto  mt-3 text-center">
            <a href="index.php?p=contacto" class="px-4 py-2 transition-all <?= ($seccion === 'contacto') ? ' text-red-600 font-bold' : 'text-slate-600 hover:bg-slate-100' ?>">Contacto</a>
        </li>
        <li class="w-full md:w-auto  mt-3 text-center">
            <a href="index.php?p=alumnas" class=" px-4 py-2  transition-all <?= ($seccion === 'alumnas' || $seccion === 'alumno') ? ' text-green-600 font-bold' : 'text-slate-600 hover:bg-slate-100' ?>">Alumnas</a>
        </li>
    </ul>

</nav>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');
    btn?.addEventListener('click', () => menu.classList.toggle('hidden'));
</script>