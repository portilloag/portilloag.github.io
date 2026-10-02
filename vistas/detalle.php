<?php
require_once "clases/Producto.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;
$producto = $id ? Producto::producto_id($id) : null;
?>

<div class="container mx-auto px-4 py-6 max-w-5xl">
       
    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>


    <a href="index.php?p=productos" 
       class="hidden sm:inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-indigo-600 bg-white/70 backdrop-blur-md px-4 py-2 rounded-xl border border-slate-200/80 shadow-sm transition-all mb-6">
        <span>←</span> Volver al catálogo
    </a>

    <?php if ($producto != null): ?>

        <article>
            <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-md grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative">
                
                <div class="sm:hidden w-12 h-1.5 bg-slate-200 rounded-full mx-auto -mt-2 mb-2"></div>
    
                <div class="w-full aspect-square  rounded-2xl overflow-hidden border border-slate-100 p-6 flex items-center justify-center">
                    <img src="imagenes/<?= $producto->getImagen(); ?>" 
                         alt="<?= $producto->getNombre(); ?>" 
                         class="w-full h-full object-contain hover:scale-105 transition-transform duration-300">
                </div>
    
                <div class="flex flex-col justify-between h-full space-y-6">
                    
                    <div>
                
                        <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full inline-block">
                            <?= $producto->getCategoria(); ?>
                        </span>
    
                      
                        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800 mt-3 leading-tight">
                            <?= $producto->getNombre(); ?>
                        </h2>
    
                     
                        <p class="text-slate-600 text-sm md:text-base leading-relaxed mt-4">
                            <?= $producto->getDescripcion(); ?>
                        </p>
                    </div>
    
                    <div class="pt-6 border-t border-slate-200/80 space-y-5">
                        
                        
                        <div class="flex items-baseline gap-2">
                            <span class="text-xs text-slate-500 font-medium">Precio por día:</span>
                            <span class="text-3xl font-black text-indigo-600">
                                $<?= number_format($producto->getPrecio(), 0, ',', '.'); ?>
                            </span>
                            <span class="text-xs font-normal text-slate-500">/día</span>
                        </div>
    
                        
                        <div class="flex flex-wrap gap-3 text-xs font-semibold">
    
                            <div class="bg-slate-100 px-3 py-1.5 rounded-xl text-slate-700 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full <?= $producto->getStock() > 0 ? 'bg-emerald-500' : 'bg-rose-500' ?>"></span>
                                <span>Stock: <strong><?= $producto->getStock(); ?> unidades</strong></span>
                            </div>
    
                        
                            <div class="bg-slate-100 px-3 py-1.5 rounded-xl text-slate-700">
                                <span>Ingreso: <strong><?= $producto->getFechaIngreso(); ?></strong></span>
                            </div>
                        </div>
    
                        
                        <div class="pt-2">
                            <a href="index.php?p=contacto&producto_id=<?= $producto->getId(); ?>" 
                               class="w-full inline-flex items-center justify-center gap-2 bg-pink-600 hover:bg-pink-700 active:scale-[0.98] text-white font-bold text-base px-6 py-4 rounded-2xl shadow-lg shadow-pink-200 hover:shadow-pink-300 transition-all text-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Consultar disponibilidad</span>
                            </a>
                        </div>
    
                    </div>
    
                </div>
    
            </div>
        </article>

    <?php else: ?>

       
        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 border border-slate-200/80 shadow-md text-center max-w-lg mx-auto py-12 space-y-4">
                <img src="imagenes/warning.webp" alt="Warning símbolo" class="object-contain w-full h-20">
            <h2 class="text-2xl font-extrabold text-slate-800">Producto no encontrado</h2>
            <p class="text-slate-600 text-sm">El equipo que estás buscando no existe o fue retirado del catálogo.</p>
            <a href="index.php?p=productos" 
               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold px-6 py-3 rounded-xl transition-colors shadow-sm">
                Ver todos los productos
            </a>
        </div>

    <?php endif; ?>

</div>

