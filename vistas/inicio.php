<?php
require_once "clases/Producto.php";

$destacados = Producto::destacados();
?>
<div class="bg-formas-container py-10 container-pad">


    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>


    <div class="relative z-10 container mx-auto px-4 space-y-8 ">

        <div class=" text-black rounded-3xl text-center p-6 md:p-12 flex flex-col items-center gap-4">
            <h2 class="text-3xl md:text-5xl font-extrabold leading-tight">Alquiler de Equipos para estudiantes</h2>
            <p class="text-slate-600 text-base md:text-lg max-w-2xl">Accedé a herramientas, accesorios y más de las
                carreras disponibles en Da Vinci</p>

            <div class=" col-1 md:flex gap-6">
                <a href="index.php?p=productos"
                    class="mt-4 inline-block bg-pink-600 hover:bg-black-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Ver
                    catálogo</a>
                <a href="index.php?p=inicio#destacados"
                    class="mt-4 inline-block bg-indigo-600 hover:bg-black-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Ver
                    Destacados</a>
            </div>
        </div>
    </div>


    <div>
        <h2 class="text-2xl font-bold  text-center text-slate-800 mb-6 relative z-10"> Categorías por carrera</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6  md:mx-20">

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=cine-y-nf">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Cine y Nuevos Formatos</h3>
                        <img src="imagenes/cine-portada.webp" alt="Cine y Nuevos Formatos"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=diseno-grafico">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Diseño Gráfico</h3>
                        <img src="imagenes/diseno-portada.webp" alt="Diseño Gráfico"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=programacion">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Programación</h3>
                        <img src="imagenes/programacion-portada.webp" alt="Programación"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=videojuegos">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Videojuegos</h3>
                        <img src="imagenes/videojuegos-portada.webp" alt="Videojuegos"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>
        </div>
    </div>

</div>

<section class=" space-y-9  md:mx-20 container-pad" id=destacados>


    <div class=" relative z-10 text-center max-w-xl mx-auto">
        <h2 class=" text-3xl font-black text-slate-800"> Productos más alquilados</h2>
        <p class="text-slate-500 text-sm md:text-[20px] mt-4">
            Los insumos y equipos más elegidos por los estudiantes
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php if (!empty($destacados)): ?>

                <?php foreach ($destacados as $producto): ?>

                    <article
                        class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
                        <div>

                            <div
                                class="aspect-square w-full bg-white rounded-2xl overflow-hidden mb-4 flex items-center justify-center p-2">
                                <img src="imagenes/<?= $producto->getImagen(); ?>" alt="<?= $producto->getNombre(); ?>"
                                    class="w-full h-full object-contain">
                            </div>


                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full inline-block">
                                <?= $producto->getCategoria(); ?>
                            </span>


                            <h3 class="text-lg font-bold text-slate-800 mt-2">
                                <?= $producto->getNombre(); ?>
                            </h3>


                            <div
                                class="flex justify-between items-center text-[14px] text-slate-400 pt-2 border-t border-slate-100/80 mt-3">
                                <span>Stock: <?= $producto->getStock(); ?></span>
                                <span>Ingreso: <?= $producto->getFechaIngreso(); ?></span>
                            </div>
                        </div>


                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-black text-slate-900">
                                $<?= number_format($producto->getPrecio(), 0, ',', '.'); ?> <span
                                    class="text-sm font-normal text-slate-500">/día</span>
                            </span>
                            <a href="index.php?p=detalle&id=<?= $producto->getId(); ?>"
                                class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl md transition-colors shadow-sm">
                                Ver detalle ★
                            </a>
                        </div>
                    </article>

                <?php endforeach; ?>

            <?php else: ?>
                <p class="col-span-full text-center text-slate-400 py-8">
                    No hay productos destacados para mostrar en este momento.
                </p>
            <?php endif; ?>
        </div>

</section>